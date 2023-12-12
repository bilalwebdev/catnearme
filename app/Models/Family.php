<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Family extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'description',
        'breed_id',
        'user_id',
        'gender',
        'age',
        'color',
        'size',
        'sire',
        'dam',
        'awards',
        'type',
        'who',
        'health',
        'achievements_certificates'
    ];


    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->crop(Manipulations::CROP_CENTER, 270, 270);

        $this->addMediaConversion('gallery')
            ->crop(Manipulations::CROP_CENTER , 800 , 600);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photo')->singleFile()->useFallbackUrl(asset('images/no-image.jpg'));
        $this->addMediaCollection('photos')->useFallbackUrl(asset('images/no-image.jpg'));
    }

    /**
     * @return BelongsTo
     */

    public function breed() : BelongsTo
    {
        return $this->belongsTo(Breed::class);
    }

    /**
     * @return BelongsTo
     */

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */

    public function breeder() : BelongsTo
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function childrens()
    {
        return $this->hasMany(Pet::class);
    }
}
