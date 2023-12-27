<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\User\PasswordResetNotification;
use Digikraaft\ReviewRating\Traits\HasReviewRating;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;
use Musonza\Chat\Traits\Messageable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class User extends Authenticatable implements HasMedia
{
    use HasApiTokens,
        HasFactory,
        Notifiable,
        InteractsWithMedia,
        Billable,
        Messageable,
        HasReviewRating;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'slug',
        'name',
        'first_name',
        'last_name',
        'country_id',
        'plan_id',
        'program_name',
        'phone_number',
        'address',
        'about_me',
        'email',
        'password',
        'type',
        'status',
        'lat',
        'lng',
        'views',
        'is_verify',
        'is_admin'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
        'is_admin'          => 'boolean'
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(270)
            ->height(270);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')->useFallbackUrl(asset('images/avatar.png'))->singleFile();
    }

    public function pets() : HasMany
    {
        return $this->hasMany(Pet::class);
    }

    /**
     * @return HasMany
     */

    public function family() : HasMany
    {
        return $this->hasMany(Family::class);
    }

    /**
     * @return BelongsTo
     */

    public function country() : BelongsTo
    {
        return $this->belongsTo(Country::class , 'country_id');
    }

    /**
     * @return BelongsTo
     */

    public function plan() : BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }


    /**
     * @return HasMany
     */

    public function faqs() : HasMany
    {
        return $this->hasMany(Faq::class);
    }

    public function document()
    {
        return $this->hasOne(Document::class);
    }

    /**
     * @return HasMany
     */

    public function calendar() : HasMany
    {
        return $this->hasMany(Calendar::class);
    }

    /**
     * @param $planName
     * @return bool
     */

    public function checkPlan($planName = '3_listing') : bool
    {
       return $this->subscribed($planName);
    }

    /**
     * @return HasMany
     */

    public function vieweds() : HasMany
    {
        return $this->hasMany(Viewed::class);
    }

    /**
     * @return HasMany
     */

    public function favorites() : HasMany
    {
        return $this->hasMany(Favorite::class);
    }

    public function sendPasswordResetNotification($token): void
    {
        $url = url("/?reset-password&email={$this->email}&token={$token}");

        $this->notify(new PasswordResetNotification($url));
    }
}
