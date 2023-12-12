<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vactination extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id',
        'fnv',
        'fcv',
        'fpv',
        'rabies',
        'felv',
        'chlamydia'
    ];

    protected $casts = [
        'fnv' => 'boolean',
        'fcv' => 'boolean',
        'fpv' => 'boolean',
        'rabies' => 'boolean',
        'felv' => 'boolean',
        'chlamydia' => 'boolean'
    ];

    /**
     * @return BelongsTo
     */

    public function pet() : BelongsTo
    {
        return $this->belongsTo(Pet::class);
    }
}
