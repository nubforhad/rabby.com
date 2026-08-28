<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveTv extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon',
        'title',
        'sub_title',
        'link',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
} 
