<?php

namespace App\Admin\Extensions\Tools;

use Encore\Admin\Admin;
use Encore\Admin\Grid\Tools\AbstractTool;
use Illuminate\Support\Facades\Request;

class ReplyDisplay extends AbstractTool
{
    protected function script()
    {
        $url = Request::fullUrlWithQuery(['display' => '_gender_']);

        return <<<EOT

$('input:radio.reply-display').change(function () {

    var url = "$url".replace('_gender_', $(this).val());

    $.pjax({container:'#pjax-container', url: url });

});

EOT;
    }

    public function render()
    {
        Admin::script($this->script());

        $options = [
            'all'   => '全部',
            '1'     => '显示',
            '0'     => '隐藏',
        ];

        return view('admin.tools.display_status', compact('options'));
    }
}