<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;

class Category extends Model
{
    use ModelTree, AdminBuilder;

    protected $fillable = [
        'name', 'description', 'parent_id', 'is_display',
        'order', 'icon'
    ];

    protected $casts = [
        'is_display' => 'boolean', // on_sale 是一个布尔类型的字段
    ];
}
