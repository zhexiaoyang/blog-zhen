<div class="paihang">
    <h2 class="hometitle">站长推荐</h2>
    <ul>
        @foreach($recommends as $recommend)
            <li>
                <b><a href="{{ route('article.show', [$recommend->id]) }}" target="_blank">{{ $recommend->title }}</a></b>
                <p>
                    <i><img src="{{ $recommend->image_url }}"></i>
                    {{ $recommend->excerpt }}
                </p>
            </li>
        @endforeach
    </ul>
</div>