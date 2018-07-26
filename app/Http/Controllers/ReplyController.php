<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function store(Request $request, Reply $reply)
    {
        if (!$request->comment)
        {
            return response('内容不能为空', 405);
        }
        if (!$request->email)
        {
            return response('邮箱不能为空', 405);
        }
        if (!$request->nickname)
        {
            return response('昵称不能为空', 405);
        }
        $reply->content = trim($request->comment);
        $reply->nickname = trim($request->nickname);
        $reply->email = trim($request->email);
        $reply->url = isset($request->url)?trim($request->url):'';
        $reply->article_id = intval($request->comment_post_ID);
        $reply->parent_id = intval($request->comment_parent);
        $reply->save();
        return response('创建成功', 200);
    }

    public function destroy(Reply $reply)
    {
        $this->authorize('destroy', $reply);
        $reply->delete();

        return redirect()->route('replies.index')->with('success', '删除成功！');
    }
}
