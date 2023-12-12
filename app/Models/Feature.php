<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_id',
        'title',
        'name',
        'days_long',
        'limit',
        'is_active'
    ];

    /**
     * @return BelongsTo
     */

    public function plan() : BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }

    protected $casts = [
        'options' => 'array'
    ];
}
