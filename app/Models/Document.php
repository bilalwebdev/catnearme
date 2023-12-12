<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Document extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'user_id',
        'status'
    ];


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('utility_bill')->singleFile()->useFallbackUrl(asset('images/no-image.jpg'));
        $this->addMediaCollection('cat_association')->singleFile()->useFallbackUrl(asset('images/no-image.jpg'));
    }

    /**
     * @return BelongsTo
     */

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
