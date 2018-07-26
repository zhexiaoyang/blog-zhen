@extends('layouts.app')
@section('title', $tag->title)

@section('content')

    <div class="content-wrap">
        <div class="content">
            <header class="archive-header">
                <h1><i class="fa fa-folder-open"></i>&nbsp;标签：{{ $tag->title }}</h1>
                @if(isset($tag->description))
                <div class="archive-header-info">
                    <p>{{ $tag->description }}</p>
                </div>
                @endif
            </header>
            @foreach($articles as $article)
                <article class="excerpt">
                    <header>
                        <a class="label label-important" href="/zmryt/">{{ $tag->title }} <i class="label-arrow"></i></a>
                        <h2><a target="_blank" href="{{ route('article.show', [$article->id]) }}" title="{{ $article->title }}">{{ $article->title }}</a></h2>
                    </header>
                    <div class="focus">
                        <a target="_blank" href="{{ route('article.show', [$article->id]) }}">
                            <img class="thumb" src="{{ $article->image_url }}" alt="{{ $article->title }}" style="width: 220px;height: 125px;">
                        </a>
                    </div>
                    <span class="note">{{ $article->excerpt }}</span>
                    <p class="auth-span">
                        <span class="muted"><i class="fa fa-clock-o"></i> {{ $article->created_at->toDateString() }}</span>
                        <span class="muted"><i class="fa fa-eye"></i> {{ $article->view_count }}℃</span>
                        <span class="muted">
                            <i class="fa fa-comments-o"></i>
                            <a target="_blank" href="{{ route('article.show', [$article->id]) }}#comments">
                                {{ $article->comment_count }}评论
                            </a>
                        </span>
                        <span class="muted" id="diggNum105">
                            <a href="javascript:;" data-action="ding" data-id="{{ $article->id }}" id="Addlike" class="action">
                                <i class="fa fa-heart-o"></i>
                                <span class="count">{{ $article->like_count }}</span>喜欢
                            </a>
                        </span>
                    </p>
                </article>
            @endforeach
            {{-- 分页 --}}
            <div class="pagination">
                {!! $articles->appends(Request::except('page'))->render() !!}
            </div>
        </div>
    </div>

    <aside class="sidebar">
        @include('common._contract_me')

        @include('common._subscribe_to')

        @include('article._recommends')

        @include('tag._tags')

        @include('article._hots')

        @include('comment._comment_list')
    </aside>
@endsection

@section('scripts')
    <script src="https://cdn.bootcss.com/highlight.js/9.12.0/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    <script>
        $('ul.pagination').removeClass('pagination');
    </script>
@endsection