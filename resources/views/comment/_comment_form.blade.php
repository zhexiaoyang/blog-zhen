<form action="{{ route('reply.store') }}" method="POST" accept-charset="UTF-8" id="commentform">
    <div class="comt-title">
        <div class="comt-avatar pull-left">
            <img alt="" src="{{ asset('images/default.png') }}" class="avatar avatar-54 photo avatar-default" height="54" width="54">			</div>
        <div class="comt-author pull-left">发表我的评论</div>
        <a id="cancel-comment-reply-link" class="pull-right" href="javascript:;">取消评论</a>
    </div>
    <div class="comt">
        <div class="comt-box">
            <textarea placeholder="写点什么..." class="input-block-level comt-area" name="comment" id="comment" cols="100%" rows="3" tabindex="1" onkeydown="if(event.ctrlKey&amp;&amp;event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
            <div class="comt-ctrl">
                <button class="btn btn-primary pull-right" type="submit" name="submit" id="submit" tabindex="5"><i class="fa fa-check-square-o"></i> 提交评论</button>
                <div class="comt-tips pull-right">
                    {{csrf_field()}}
                    <input type="hidden" name="comment_post_ID" value="{{ $article->id }}" id="comment_post_ID">
                    <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                </div>
                <span data-type="comment-insert-smilie" class="muted comt-smilie"><i class="fa fa-smile-o"></i> 表情</span>
            </div>
        </div>
        <div class="comt-comterinfo" id="comment-author-info">
            <h4>Hi，您需要填写昵称和邮箱！</h4>
            <ul>
                <li class="form-inline">
                    <label class="hide" for="author">昵称</label>
                    <input class="ipt" type="text" name="nickname" id="author" value="" tabindex="2" placeholder="昵称">
                    <span class="help-inline">昵称 (必填)</span>
                </li>
                <li class="form-inline">
                    <label class="hide" for="email">邮箱</label>
                    <input class="ipt" type="text" name="email" id="email" value="" tabindex="3" placeholder="邮箱">
                    <span class="help-inline">邮箱 (必填)</span>
                </li>
                <li class="form-inline">
                    <label class="hide" for="url">网址</label>
                    <input class="ipt" type="text" name="url" id="url" value="" tabindex="4" placeholder="网址">
                    <span class="help-inline">网址</span>
                </li>
            </ul>
        </div>
    </div>


</form>