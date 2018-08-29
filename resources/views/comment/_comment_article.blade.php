<ol class="commentlist">
    @if (count($replies))
        @foreach($replies as $reply)
        <li class="comment odd alt thread-odd thread-alt depth-1" id="comment-{{ $reply->id }}">
            <div class="c-avatar">
                <img class="avatar avatar-54 photo" height="54" width="54" src="{{ asset('images/default.png') }}" style="display: block;margin: 0;">
                <div class="c-main" id="div-comment-{{ $reply->id }}">
                    {{ $reply->content }}
                    <div class="c-meta">
                        <span class="c-author">
                            @if(!empty($reply->url))
                            <a href="{{ $reply->url }}" rel="external nofollow" class="url" target="_blank">{{ $reply->nickname }}</a>
                            @else
                            <span>{{ $reply->nickname }}</span>
                            @endif
                        </span>
                        {{ $reply->created_at->diffForHumans() }}
                        <a rel="nofollow" class="comment-reply-link" href="{{ route('article.show',[$article->id]) }}?replytocom={{ $reply->id }}#respond" onclick="return addComment.moveForm( 'div-comment-{{ $reply->id }}', '{{ $reply->id }}', 'respond', '{{ $article->id }}' )" aria-label="回复给{{ $reply->nickname }}">回复</a>
                    </div>
                </div>
            </div>
            @if(!empty($reply->children))
                @include('comment._comment_children', ['children' => $reply->children])
            @endif
            <!-- .children -->
        </li>
        @endforeach
    @endif
    <!-- #comment-## -->
    <div class="pagination" show="1">
        {{-- 分页 --}}
        {!! $replies->appends(Request::except('page'))->render() !!}
    </div>
</ol>