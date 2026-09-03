<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notice extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'subtitle',
        'notice_text',
        'link',
        'sort_code',
        'status',
        'image',
    ];

    protected $casts = [
        'status' => 'boolean',
        'sort_code' => 'integer',
    ];
}