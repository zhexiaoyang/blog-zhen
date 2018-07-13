@extends('layouts.app')
@section('title', '首页')

@section('content')
    <div class="picshow">
        <ul>
            <li><a href="/"><i><img src="images/b01.jpg"></i>
                    <div class="font">
                        <h3>个人博客模板《早安》</h3>
                    </div>
                </a></li>
            <li><a href="/"><i><img src="images/b02.jpg"></i>
                    <div class="font">
                        <h3>不是一番寒澈骨，<br>怎得梅花扑鼻香。</h3>
                    </div>
                </a></li>
            <li><a href="/"><i><img src="images/b03.jpg"></i>
                    <div class="font">
                        <h3>个人博客模板《早安》</h3>
                    </div>
                </a></li>
            <li><a href="/"><i><img src="images/b04.jpg"></i>
                    <div class="font">
                        <h3>个人博客模板《早安》</h3>
                    </div>
                </a></li>
            <li><a href="/"><i><img src="images/b05.jpg"></i>
                    <div class="font">
                        <h3>个人博客模板《早安》</h3>
                    </div>
                </a></li>
        </ul>
    </div>
    <style>

    </style>
    <article>
        <div class="blogs">
            <style type="text/css">
                .excerpt{background-color:#fff;padding:20px 15px 30px 20px;margin-bottom:10px;position:relative;clear:both}
                .excerpt:after,.excerpt:before{display:table;content:"";line-height:0}
                .excerpt:after{clear:both}
                .excerpt-nothumbnail{padding-left:20px}
                .excerpt-nothumbnail:hover{padding-left:24px}
                .excerpt .header{margin:0 10px 15px 0}
                .excerpt .focus{float:left;margin:0 20px 0 0;text-align:center;position:relative;overflow:hidden;display:table}
                .excerpt .focus a{display:table-cell;vertical-align:middle}
                .excerpt .focus a img{margin:0 auto;display:block;-webkit-transition:-webkit-transform .3s linear;-moz-transition:-moz-transform .3s linear;-o-transition:-o-transform .3s linear;transition:transform .3s linear}
                .excerpt:hover .focus a img{-webkit-transform:scale(1.1);-moz-transform:scale(1.1);-ms-transform:scale(1.1);-o-transform:scale(1.1);transform:scale(1.1)}
                .excerpt p.auth-span{float:right;position:absolute;bottom:0;right:0}
                .excerpt .header .label{margin-right:5px;position:relative;top:-2px;padding:2px 6px 4px}
                .excerpt h2{display:inline;font-size:20px;margin:0;font-weight:400;position:relative;top:1px;line-height:25px;margin-left:10px}
                .excerpt .note{color:#777;line-height:24px;margin-bottom:0;font-style:normal}
                .excerpt .itag a{border-style:solid;border-width:1px;border-color:#e2e2e2 #ddd #ddd #e2e2e2;display:inline-block;margin-right:3px;border-radius:1px;padding:0 5px;line-height:18px}
                .article-header .cate,.article-header .muted,.excerpt .muted{margin-right:20px}
                .excerpt .muted .action,.hot-posts .muted .action{background-color:#fff!important;border:0;padding:0;color:#f78585!important;font-size:13px}
                .excerpt .muted .action i,.hot-posts .muted .action i{margin-right:1px!important}
                .hot-posts .muted{margin-left:20px}
                .excerpt .muted{font-size:13px}
            </style>
            @foreach($articles as $article)
                <div class="excerpt" style="">
                    <div class="header">
                        <a class="label label-important" href="">{{ $article->category->title }}<i class="label-arrow"></i></a>
                        <h2>
                            <a target="_blank" href="{{ route('article.show', [$article->id]) }}" title="{{ $article->title }}">{{ $article->title }}</a>
                        </h2>
                    </div>
                    <div class="blogpic">
                        <a target="_blank" href="{{ route('article.show', [$article->id]) }}l">
                            <img class="thumb" src="{{ $article->image_url }}" alt="{{ $article->title }}">
                        </a>
                    </div>
                    <span class="note">{{ $article->excerpt }}</span>
                    <p class="auth-span">
                        <span class="muted"><i class="fa fa-user"></i> <a href="https://cuiqingcai.com/author/cqcre">崔庆才</a></span>
                        <span class="lm">
                        <a href="#" title="CSS3|Html5" target="_blank" class="classname">{{ $article->category->title }}</a>
                    </span>
                        <span class="dtime">{{ $article->created_at->toDateString() }}</span>
                        <span class="viewnum">浏览（{{ $article->view_count }}）</span>
                        <span class="muted"><i class="fa fa-comments-o"></i> <a target="_blank" href="https://cuiqingcai.com/5094.html#comments">3评论</a></span>
                        <span class="muted"><a href="javascript:;" data-action="ding" data-id="5094" id="Addlike" class="action"><i class="fa fa-heart-o"></i><span class="count">86</span>喜欢</a></span>
                    </p>
                </div>
            <li>
                <span class="blogpic"><a href="{{ route('article.show', [$article->id]) }}" target="_blank"><img src="{{ $article->image_url }}"></a></span>
                <h3 class="blogtitle"><a href="{{ route('article.show', [$article->id]) }}" target="_blank">{{ $article->title }}</a></h3>
                <div class="bloginfo">
                    <p>{{ $article->excerpt }}</p>
                </div>
                <div class="autor">
                    <span class="lm">
                        <a href="#" title="CSS3|Html5" target="_blank" class="classname">{{ $article->category->title }}</a>
                    </span>
                    <span class="dtime">{{ $article->created_at->toDateString() }}</span>
                    <span class="viewnum">浏览（{{ $article->view_count }}）</span>
                    <span class="readmore"><a href="{{ route('article.show', [$article->id]) }}" target="_blank">阅读原文</a></span>
                </div>
            </li>
            @endforeach
        </div>
        <div class="sidebar">
            @include('common._about_me')
            @include('article._search')
            @include('tag._tags', ['tags' => $tags])
            @include('article._hots', ['hots' => $hots])
            @include('article._recommends', ['recommends' => $recommends])
            @include('common._friend_link')
            @include('common._wx')
        </div>
    </article>
@endsection