<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Certification extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id',
        'tica',
        'acfa',
        'ccc_nsw',
        'cfa',
        'gccf',
        'wcf'
    ];

    /**
     * @return BelongsTo
     */

    public function pet() : BelongsTo
    {
        return $this->belongsTo(Pet::class);
    }
}
