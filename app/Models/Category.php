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

    /**
     * 重写方法
     * User: zhangzhen
     * Date: 2018/7/9 13:59
     * @return array
     */
    public static function selectOptions()
    {
        $options = (new static())->buildSelectOptions();

        return collect($options)->all();
    }

}
