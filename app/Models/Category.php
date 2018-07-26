<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Traits\AdminBuilder;
use Encore\Admin\Traits\ModelTree;

class Category extends Model
{
    use ModelTree, AdminBuilder;

    protected $fillable = [
        'title', 'image', 'description', 'user_id','category_id', 'is_display', 'order', 'excerpt'
    ];

    protected $casts = [
        'is_display' => 'boolean',
    ];


    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function scopeDisplay($query)
    {
        return $query->where('is_display', true);
    }

    /**
     * 重写方法
     * User: zhangzhen
     * Date: 2018/7/9 13:59
     * @return array
     */
    public static function selectOptions()
    {
        $options = (new static())->buildSelectOptions(Category::display()->get()->toArray());

        return collect($options)->all();
    }

    public static function selectOptionsArticleList()
    {
//        dd((new static())->toTree());
        return array_pluck(Category::display()->get()->toArray(),'title','id');
    }

}
