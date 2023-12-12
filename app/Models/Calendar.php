<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'start',
        'end'
    ];

    protected $casts = [
        'start' => 'date',
        'end'   => 'date',
    ];
}
