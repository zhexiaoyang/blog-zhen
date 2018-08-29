<div class="widget d_comment">
    <div class="title">
        <h2> 最新吐槽 </h2>
    </div>
    <ul>
        @foreach($replies as $reply)
        <li>
            <a href="{{ route('article.show', [$reply->article_id]) }}#div-comment-{{ $reply->id }}" title="{{ $reply->article->title }}" target="_blank">
                <img alt="" src="/images/default.png" class="avatar avatar-48 photo" height="48" width="48">
                <div class="muted">
                    <i>
                        @if(!empty($reply->url))
                            <a href="{{ $reply->url }}" rel="external nofollow" class="url" target="_blank">{{ $reply->nickname }}</a>
                        @else
                            <span>{{ $reply->nickname }}</span>
                        @endif
                    </i>
                    {{ $reply->content }}
                </div>
            </a>
        </li>
        @endforeach
    </ul>
</div>