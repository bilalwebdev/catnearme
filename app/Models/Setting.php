<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'timezone',
        'currency',
        'analytics',
        'phone',
        'email'
    ];

    protected $casts = [
        'analytics' => 'json'
    ];
}
