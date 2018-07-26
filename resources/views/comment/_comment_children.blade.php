<ul class="children">
    @foreach($children as $reply)
        <li class="comment even thread-even depth-1" id="comment-1051">
            <div class="c-avatar">
                <img class="avatar avatar-54 photo" height="54" width="54" src="{{ asset('images/default.png') }}" style="display: block;">
                <div class="c-main" id="div-comment-{{ $reply->id }}">
                    {{ $reply->content }}
                    <div class="c-meta">
                        <span class="c-author">
                            <a href="{{ $reply->url }}" rel="external nofollow" class="url" target="_blank">{{ $reply->nickname }}</a>
                        </span>
                        {{ $reply->created_at->diffForHumans() }}
                        <a rel="nofollow" class="comment-reply-link" href="{{ route('article.show',[$article->id]) }}?replytocom={{ $reply->id }}#respond" onclick="return addComment.moveForm( 'div-comment-{{ $reply->id }}', '{{ $reply->id }}', 'respond', '{{ $article->id }}' )" aria-label="回复给{{ $reply->nickname }}">回复</a>
                    </div>
                </div>
            </div>
            @if(!empty($reply->children))
                @include('comment._comment_children', ['children' => $reply->children])
            @endif
        </li>
@endforeach
<!-- #comment-## -->
</ul>