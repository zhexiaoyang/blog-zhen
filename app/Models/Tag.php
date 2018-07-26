<?php

namespace App\Models;

use Encore\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable = [
        'title', 'description', 'is_display', 'order'
    ];
    protected $casts = [
        'is_display' => 'boolean',
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public function scopeDisplay($query)
    {
        return $query->where('is_display', true);
    }
}
