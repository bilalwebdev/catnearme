<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shipping extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id',
        'shipping_fee',
        'shipping_price',
        'shipping_destination'
    ];

    protected $casts = [
        'shipping_price'       => 'decimal:0',
    ];

    /**
     * @return BelongsTo
     */

    public function pet() : BelongsTo
    {
        return $this->belongsTo(Pet::class);
    }
}
