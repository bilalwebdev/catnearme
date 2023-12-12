<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Page extends Model implements HasMedia
{
    use HasFactory, HasSlug, HasSEO, InteractsWithMedia;

    protected $fillable = [
        'title',
        'name',
        'route',
        'description',
        'content',
        'views'
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
        $this->addMediaConversion('full-hd')
            ->width(1920)
            ->height(1080);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('background')->singleFile()->useFallbackUrl(asset('images/bg/category_empty_img.png'));
    }

    /**
     * @return BelongsTo
     */

    public function modifyPage() : BelongsTo
    {
        return $this->belongsTo(ModifyPage::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
