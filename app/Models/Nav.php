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

    /**
     * 重写方法
     * User: zhangzhen
     * Date: 2018/7/9 13:59
     * @return array
     */
    public static function selectOptions()
    {
        $options = (new static())->buildSelectOptions(Nav::display()->get()->toArray());

        return collect($options)->prepend('顶级导航', 0)->all();
    }
}
