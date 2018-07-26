<div class="widget d_postlist">
    <div class="title">
        <h2> 点击排行 </h2>
    </div>
    <ul>
        @foreach($hots as $hot)
            <li>
                <a href="{{ route('article.show', [$hot->id]) }}" title="{{ $hot->title }}">
                        <span class="thumbnail">
                            <img src="{{ $hot->image_url }}-sidersmall" alt="{{ $hot->title }}">
                        </span>
                    <span class="text">{{ $hot->title }}</span>
                    <span class="muted"><i class="fa fa-clock-o"></i> {{ $hot->created_at->toDateString() }}</span>
                    <span class="muted"><i class="fa fa-eye"></i> {{ $hot->view_count }}℃</span>
                </a>
            </li>
        @endforeach
    </ul>
</div>