<div class="widget d_postlist">
    <div class="title">
        <h2> 推荐文章 </h2>
    </div>
    <ul>
        @foreach($recommends as $recommend)
            <li>
                <a href="{{ route('article.show', [$recommend->id]) }}" title="{{ $recommend->title }}">
                        <span class="thumbnail">
                            <img src="{{ $recommend->image_url }}-sidersmall" alt="{{ $recommend->title }}">
                        </span>
                    <span class="text">{{ $recommend->title }}</span>
                    <span class="muted"><i class="fa fa-clock-o"></i> {{ $recommend->created_at->toDateString() }}</span>
                    <span class="muted"><i class="fa fa-eye"></i> {{ $recommend->view_count }}℃</span>
                </a>
            </li>
        @endforeach
    </ul>
</div>