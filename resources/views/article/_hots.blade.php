<div class="paihang">
    <h2 class="hometitle">点击排行</h2>
    <ul>
        @foreach($hots as $hot)
            <li>
                <b><a href="{{ route('article.show', [$hot->id]) }}" target="_blank">{{ $hot->title }}</a></b>
                <p>
                    <i><img src="{{ $hot->image_url }}"></i>
                    {{ $hot->excerpt }}
                </p>
            </li>
        @endforeach
    </ul>
</div>