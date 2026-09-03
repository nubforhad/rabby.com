<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'status',
        'link',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function services(): HasMany
{
    return $this->hasMany(Service::class)
        ->where('status', 1);
}


}