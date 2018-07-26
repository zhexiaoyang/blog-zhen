<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function scopeDisplay($query)
    {
        return $query->where('is_display', true);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function getImageUrlAttribute()
    {
        // 如果 image 字段本身就已经是完整的 url 就直接返回
        if (Str::startsWith($this->attributes['image'], ['http://', 'https://'])) {
            return $this->attributes['image'];
        }
//        return \Storage::disk('public')->url($this->attributes['image']);
        return 'http://'.config('filesystems.disks.qiniu.domains.default').'/'.$this->attributes['image'];
    }

}
