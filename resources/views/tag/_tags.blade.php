<div class="cloud">
    <h2 class="hometitle">标签云</h2>
    <ul>
        @foreach($tags as $tag)
            <a href="/">{{ $tag->title }}({{ $tag->article_count }})</a>
        @endforeach
    </ul>
</div>