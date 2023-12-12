<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Pet extends Model implements HasMedia
{
    use HasFactory, HasSlug, InteractsWithMedia, HasFactory, HasSEO;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'full_description',
        'breed_id',
        'age',
        'gender',
        'keywords',
        'pt',
        'price',
        'price_breeding',
        'cb',
        'pedigree',
        'ns',
        'birthday',
        'ready',
        'color',
        'expired_at',
        'renew',
        'views',
        'status'
    ];

    protected $casts = [
        'price'          => 'decimal:0',
        'price_breeding' => 'decimal:0',
        'expired_at'     => 'datetime'
    ];

    protected $appends = [
        'photo'
    ];

    public function getPhotoAttribute()
    {
        return $this->getFirstMediaUrl('photo' , 'thumb');
    }


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
            ->crop(Manipulations::CROP_CENTER, 270, 270);

        $this->addMediaConversion('gallery')
             ->crop(Manipulations::CROP_CENTER , 800 , 600);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photo')->singleFile()->useFallbackUrl(asset('images/img1.jpg'));
        $this->addMediaCollection('photos');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasOne
     */

    public function shipping() : HasOne
    {
        return $this->hasOne(Shipping::class);
    }

    /**
     * @return HasOne
     */

    public function vactinations() : HasOne
    {
        return $this->hasOne(Vactination::class);
    }

    /**
     * @return HasOne
     */

    public function certifications() : HasOne
    {
        return $this->hasOne(Certification::class);
    }

    public function breed() : BelongsTo
    {
        return $this->belongsTo(Breed::class);
    }

    /**
     * @return HasMany
     */

    public function parents() : HasMany
    {
        return $this->hasMany(FamilyPet::class);
    }

    /**
     * @param $q
     * @return mixed
     */

    public function scopeActive($q)
    {
        return $q->where('status' , 'active');
    }

    /**
     * @param $q
     * @return mixed
     */

    public function scopeNotActive($q)
    {
        return $q->where('status' , 'not_active');
    }

    public function getRouteKeyName() : string
    {
        return 'slug';
    }
}
