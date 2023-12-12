<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'name',
        'description',
        'price_stripe',
        'price',
        'period',
        'is_active'
    ];

    protected $casts = [
        'price' => 'decimal:0'
    ];

    public function getPriceAttribute($value)
    {
        return '$' . $value;
    }

    /**
     * @return HasOne
     */

    public function feature() : HasOne
    {
        return $this->hasOne(Feature::class);
    }
}
