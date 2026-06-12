<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Analysis extends Model
{
    protected $fillable = [
        'input_text',
        'status',
        'risk_score',
        'reasons',
        'summary',
    ];

    protected $casts = [
        'reasons' => 'array',
    ];
}