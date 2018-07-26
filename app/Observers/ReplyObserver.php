<?php

namespace App\Observers;

use App\Models\Reply;


class ReplyObserver
{
    /**
     * User: zhangzhen
     * Date: 2018/7/12 11:08
     * @param Reply $reply
     */
    public function deleted(Reply $reply)
    {
        if ($reply->is_display)
        {
            $reply->article()->decrement('comment_count');
        }
    }

    /** 什么鬼 */
    public function updated(Reply $reply)
    {
        if ($reply->getOriginal()['is_display'] - $reply->is_display === 1)
        {
            $reply->article()->decrement('comment_count');
        }
        if ($reply->getOriginal()['is_display'] - $reply->is_display === -1)
        {
            $reply->article()->increment('comment_count');
        }
    }
}