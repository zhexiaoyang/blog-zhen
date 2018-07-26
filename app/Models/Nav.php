<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;

class Nav extends Model
{
    use ModelTree, AdminBuilder;

    protected $fillable = [
        'title', 'description', 'url', 'is_display', 'order'
    ];
    protected $casts = [
        'is_display' => 'boolean',
    ];

    public function scopeDisplay($query)
    {
        return $query->where('is_display', true);
    }
}
