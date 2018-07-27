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
                <div class="avatar"><img src="{{ asset('/images/avatar.jpg') }}" alt=""></div>
                <p class="abname">网名 ：这小样谁对象</p>
                <p class="abname">Q Q ：358282005&nbsp</p>
                <p class="abname">邮箱 ：zhangzhen@yeah.net</p>
                <div class="abtext"> 一个擦边90后！2012年07毕业于大连工业大学，而后当了一名电工。2013年转行做了一名程序员。 </div>
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