<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Advert extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'position',
        'type',
        'iframe',
        'expired_at',
        'is_active'
    ];

    protected $casts = [
        'expired_at' => 'datetime',
        'is_active'  => 'boolean'
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(450)
            ->height(450);

        // $this->addMediaConversion('sm')->crop(Manipulations::CROP_CENTER, 310, 60);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photo')->singleFile()->useFallbackUrl(asset('images/bg/category_empty_img.png'));
        $this->addMediaCollection('files');
    }

    public function scopeActive($q)
    {
        return $q->where('is_active', 1);
    }

}
