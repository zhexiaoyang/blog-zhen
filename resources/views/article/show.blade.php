@extends('layouts.app')
@section('title', $article->title)
@section('styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/share.css') }}">
    <link href="https://cdn.bootcss.com/highlight.js/9.12.0/styles/monokai-sublime.min.css" rel="stylesheet">
@endsection

@section('content')

    <div class="content-wrap">
        <div class="content">
            <div class="breadcrumbs">
                <a title="返回首页" href="{{ route('home') }}">
                    <i class="fa fa-home"></i>
                </a>
                @if(isset($article->category->parent->title))
                <small>&gt;</small>
                <a href="">{{ $article->category->parent->title }}</a>
                @endif
                <small>&gt;</small>
                <a href="">{{ $article->category->title }}</a>
                <small>&gt;</small>
                <span class="muted">{{ $article->title }}</span>
            </div>
            <header class="article-header">
                <h1 class="article-title"><a href="{{ route('article.show', $article->id) }}">{{ $article->title }}</a></h1>
                <div class="meta">
                    <span id="mute-category" class="muted">
                        <i class="fa fa-list-alt"></i>
                        <a href="{{ route('category.show', $article->category->id) }}"> {{ $article->category->title }} </a>
                    </span>
                    <span class="muted"><i class="fa fa-user"></i> {{ $article->author }} </span>
                    <time class="muted"><i class="fa fa-clock-o"></i> {{ $article->created_at->toDateString() }} </time>
                    <span class="muted"><i class="fa fa-eye"></i> {{ $article->view_count }}℃ </span>
                    <span class="muted">
                        <i class="fa fa-comments-o"></i>
                        <a href="{{ route('article.show', [$article->id]) }}#comments"> {{ $article->comment_count }}评论 </a>
                    </span>
                </div>
            </header>
            {{--<div class="banner banner-post">--}}
                {{--此处有广告--}}
            {{--</div>--}}
            <article class="article-content">
                {!! $article->description !!}
                <div class="article-social" id="newdigg">
                    <a  id="Addlike" class="action"  href="javascript:" data-action="ding" data-id="{{ $article->id }}">
                        <i class="fa fa-heart-o"></i> 喜欢 (<span class="count">{{ $article->like_count }}</span>)</a>
                    <span class="or">or</span>
                    <span class="action action-share bdsharebuttonbox">
                        <i class="fa fa-share-alt"></i> 分享 (<span class="bds_count" data-cmd="count" title="累计分享0次">0</span>)
                        <div class="action-popover">
                          <div class="popover top in">
                            <div class="arrow"></div>
                            <div class="popover-content"><a href="#" class="sinaweibo fa fa-weibo" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_qzone fa fa-star" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="tencentweibo fa fa-tencent-weibo" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="qq fa fa-qq" data-cmd="sqq" title="分享到QQ好友"></a><a href="#" class="bds_renren fa fa-renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_more fa fa-ellipsis-h" data-cmd="more"></a></div>
                          </div>
                        </div>
                    </span>
                </div>
            </article>
            <footer class="article-footer">
                <div class="article-tags">
                    <i class="fa fa-tags"></i>
                    @foreach($article->tags as $tag)
                    <a href='{{ route('tag.show', $tag->id) }}' target=_blank><b>{{ $tag->title }}</b></a>
                    @endforeach
                </div>
            </footer>
            <!--上、下一篇-->
            <nav class="article-nav">
                @if($prev_article)
                <span class="article-nav-prev">
                    <i class="fa fa-angle-double-left"></i>
                    <a href='{{ route('article.show', [$prev_article->id]) }}'>{{ $prev_article->title }}</a>
                </span>
                @endif
                @if($next_article)
                <span class="article-nav-next">
                    <a href='{{ route('article.show', [$next_article->id]) }}'>{{ $next_article->title }}</a>
                    <i class="fa fa-angle-double-right"></i>
                </span>
                @endif
            </nav>
            <!--内容页底部相关文章-->
            <div class="related_top">
                <div class="related_posts">
                    @if(count($relevants))
                    <ul class="related_img">
                        @foreach($relevants as $k => $relevant)
                            @if($k < 4)
                            <li class="related_box">
                                <a href="{{ route('article.show', [$relevant->id]) }}" title="{{ $relevant->title }}" target="_blank">
                                    <img src="{{ $relevant->image_url }}-articlebottom" alt="{{ $relevant->title }}" />
                                    <br>
                                    <span class="r_title">{{ $relevant->title }}</span>
                                </a>
                            </li>
                            @endif
                        @endforeach
                    </ul>
                    <div class="relates">
                        <ul>
                            @foreach($relevants as $k => $relevant)
                                @if($k > 3)
                                <li><i class="fa fa-minus"></i><a href="{{ route('article.show', $relevant->id) }}">{{ $relevant->title }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
            <!--回复-->
            <div id="respond" class="no_webshot">
                @include('comment._comment_form')
            </div><div id="postcomments">
                <div id="comments">
                    <i class="fa fa-comments-o"></i><b> ({{ $article->comment_count }})</b>个小伙伴在吐槽
                </div>
                    @include('comment._comment_article', ['replies' => $article->replies()->display()->where('article_id', $article->id)->where('parent_id', 0)->orderBy('id','asc')->paginate(5)])
            </div>
            <!-- //评论内容区结束 -->
        </div>
    </div>
    <aside class="sidebar">
        @include('common._contract_me')

        {{--@include('common._subscribe_to')--}}

        @include('article._recommends')

        @include('tag._tags')

        @include('article._hots')

        @include('comment._comment_list')
    </aside>
@endsection

@section('scripts')
    {{--<script src="https://cdn.bootcss.com/highlight.js/9.12.0/highlight.min.js"></script>--}}
    {{--<script>hljs.initHighlightingOnLoad();</script>--}}
    <script>
        // $('div.pagination').show();
    </script>
    <script>
        window._deel = {
            name: '博客',
            url: '/',
            ajaxpager: false,
            commenton: 0,
            roll: [2, 5],
        }
        if (document.domain == "/") {
            window.location.href = '/';
        }
    </script>
@endsection