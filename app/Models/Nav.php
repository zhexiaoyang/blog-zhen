<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{

    protected $fillable = [
        'title', 'description', 'url', 'is_display', 'order'
    ];
    protected $casts = [
        'is_display' => 'boolean',
    ];
}
