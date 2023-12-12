<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Kalnoy\Nestedset\NodeTrait;
use Novius\LaravelNovaOrderNestedsetField\Traits\Orderable;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model implements HasMedia
{
    use HasFactory, NodeTrait, Orderable, InteractsWithMedia, HasSlug;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'is_popular',
        'status'
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(310)
            ->height(60);

       // $this->addMediaConversion('sm')->crop(Manipulations::CROP_CENTER, 310, 60);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photo')->singleFile()->useFallbackUrl(asset('images/bg/category_empty_img.png'));
        $this->addMediaCollection('files');
    }

    public function getLftName()
    {
        return '_lft';
    }

    public function getRgtName()
    {
        return '_rgt';
    }

    public function getParentIdName()
    {
        return 'parent_id';
    }

    /**
     * @return HasMany
     */

    public function blogs() : HasMany
    {
        return $this->hasMany(Blog::class);
    }
}
