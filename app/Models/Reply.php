<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;

class Reply extends Model
{
    use ModelTree, AdminBuilder;

    protected $fillable = ['article_id', 'parent_id', 'email', 'content', 'url'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function scopeDisplay($query)
    {
        return $query->where('is_display', true);
    }
}
