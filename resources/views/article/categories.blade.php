@extends('layouts.app')
@section('title', $category->title)

@section('content')

    <div class="content-wrap">
        <div class="content">
            <header class="archive-header">
                <h1><i class="fa fa-folder-open"></i>&nbsp;分类：{{ $category->title }}</h1>
                @if(isset($category->description))
                <div class="archive-header-info">
                    <p>{{ $category->description }}</p>
                </div>
                @endif
            </header>
            @foreach($articles as $article)
                <article class="excerpt">
                    <header>
                        <a class="label label-important" href="/zmryt/">{{ $category->title }} <i class="label-arrow"></i></a>
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
    <script language="javascript" type="text/javascript">
        function postDigg(ftype,aid)
        {
            var taget_obj = document.getElementById('newdigg');
            var saveid = GetCookie('diggid');
            if(saveid != null)
            {
                var saveids = saveid.split(',');
                var hasid = false;
                saveid = '';
                j = 1;
                for(i=saveids.length-1;i>=0;i--)
                {
                    if(saveids[i]==aid && hasid) continue;
                    else {
                        if(saveids[i]==aid && !hasid) hasid = true;
                        saveid += (saveid=='' ? saveids[i] : ','+saveids[i]);
                        j++;
                        if(j==20 && hasid) break;
                        if(j==19 && !hasid) break;
                    }
                }
                if(hasid) { alert("您已经顶过该帖，请不要重复顶帖 ！"); return; }
                else saveid += ','+aid;
                SetCookie('diggid',saveid,1);
            }
            else
            {
                SetCookie('diggid',aid,1);
            }
            myajax = new DedeAjax(taget_obj,false,false,'','','');
            var url = "/plus/digg_ajax.php?action="+ftype+"&id="+aid;
            myajax.SendGet2(url);
        }
    </script>
    <script>
        $('ul.pagination').removeClass('pagination');
    </script>
@endsection