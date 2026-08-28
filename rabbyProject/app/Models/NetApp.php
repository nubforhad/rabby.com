<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NetApp extends Model
{
    protected $fillable = [
        'icon',
        'title',
        'sub_title',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}