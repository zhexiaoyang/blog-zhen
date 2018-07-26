@extends('layouts.app')
{{--@section('title', '首页')--}}

@section('content')
    <div class="content-wrap">
        <div class="content">
            <div id="wowslider-container1">
                <div class="ws_images">
                    <ul>
                        @foreach($sliders as $slider)
                        <li><a target="_blank" href="{{ route('article.show', [$slider->id]) }}" title="{{ $slider->title }}"> <img src="{{ $slider->image_url }}-sider"title="{{ $slider->title }}" alt="{{ $slider->title }}-sider" /></a> </li>
                        @endforeach
                    </ul>
                </div>
                <div class="ws_thumbs">
                    <div>
                        @foreach($sliders as $slider)
                            <a target="_blank" href="{{ route('article.show', [$slider->id]) }}" title="{{ $slider->title }}"><img src="{{ $slider->image_url }}-sidersmall"/></a>
                        @endforeach
                    </div>
                </div>
                <div class="ws_shadow"> </div>
            </div>
            {{--<div class="banner banner-sticky"> 此处有广告 </div>--}}
            <div class="hot-posts">
                <h2 class="title">本周热门排行</h2>
                <ul>
                    @foreach($likes as $k => $like)
                    <li>
                        <p>
                            <span class="muted" id="diggNum190">
                                <a id="love" class="action" href="javascript:" onclick="javascript:postDigg('good',190)">
                                    <i class="fa fa-heart-o"></i>
                                    <span class="count">{{ $like->like_count }}</span> 喜欢
                                </a>
                            </span>
                        </p>
                        <span class="label label-{{ $k+1 }}">{{ $k+1 }}</span> <a target="_blank" href="{{ route('article.show', [$like->id]) }}" title="{{ $like->title }}">{{ $like->title }}</a> </li>
                    <li>
                    @endforeach
                </ul>
            </div>
            @foreach($articles as $article)
            <article class="excerpt">
                <header>
                    <a class="label label-important" href="{{ route('category.show',$article->category) }}">{{ $article->category->title }} <i class="label-arrow"></i></a>
                    <h2><a target="_blank" href="{{ route('article.show', [$article->id]) }}" title="{{ $article->title }}">{{ $article->title }}</a></h2>
                </header>
                <div class="focus">
                    <a target="_blank" href="{{ route('article.show', [$article->id]) }}">
                        <img class="thumb" src="{{ $article->image_url }}-article" alt="{{ $article->title }}">
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
        </div>
    </div>
    <aside class="sidebar">
        @include('common._contract_me')
        <div class="widget d_subscribe">
            <div class="about">
                <div class="avatar"><img src="/images/avatar.jpg" alt=""></div>
                <p class="abname">dancesmile | 杨青</p>
                <p class="abposition">Web前端设计师、网页设计</p>
                <div class="abtext"> 一个80后草根女站长！09年入行。一直潜心研究web前端技术，一边工作一边积累经验，分享一些个人博客模板，以及SEO优化等心得。 </div>
            </div>
        </div>
        {{--@include('common._subscribe_to')--}}
        @include('article._recommends')
        {{--<div class="widget d_banner">--}}
            {{--<div class="d_banner_inner">--}}
                {{--此处有广告--}}
            {{--</div>--}}
        {{--</div>--}}
        @include('tag._tags')
        {{--<div class="widget d_banner">--}}
            {{--<div class="d_banner_inner">--}}
                {{--此处有广告--}}
            {{--</div>--}}
        {{--</div>--}}
        @include('article._hots')
        @include('comment._comment_list')
        @include('common._friend_links')
    </aside>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/slider.js') }}"></script>
@endsection