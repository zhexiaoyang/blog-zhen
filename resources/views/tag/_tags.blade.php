<div class="widget d_tag">
    <div class="title">
        <h2> 标签云 </h2>
    </div>
    <div class="d_tags">
        @foreach($tags as $tag)
            <a data-original-title="{{ $tag->title }}" title="" href="{{ route('tag.show', $tag->id) }}"> {{ $tag->title }} ({{ $tag->article_count }}) </a>
        @endforeach
    </div>
</div>