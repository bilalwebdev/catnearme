<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FamilyPet extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id',
        'family_id'
    ];

    /**
     * @return BelongsTo
     */

    public function family() : BelongsTo
    {
        return $this->belongsTo(Family::class);
    }
}
