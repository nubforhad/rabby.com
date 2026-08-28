<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'headline',
        'address',
        'mobile',
        'footer_text',
        'fb_link',
        'email',
        'website_link',
    ];
}