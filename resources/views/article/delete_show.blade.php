@extends('layouts.app')
@section('title', $article->title)
@section('styles')
    <link href="https://cdn.bootcss.com/highlight.js/9.12.0/styles/monokai-sublime.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{ asset('js/modernizr.js') }}"></script>
    <![endif]-->
    <script>
        window.onload = function ()
        {
            var oH2 = document.getElementsByTagName("h2")[0];
            var oUl = document.getElementsByTagName("ul")[0];
            oH2.onclick = function ()
            {
                var style = oUl.style;
                style.display = style.display == "block" ? "none" : "block";
                oH2.className = style.display == "block" ? "open" : ""
            }
        }
    </script>
@endsection

@section('content')
<article>
    <h1 class="t_nav"><span>您现在的位置是：首页 > 慢生活 > 程序人生</span><a href="/" class="n1">网站首页</a><a href="/" class="n2">慢生活</a></h1>
    <div class="infos">
        <div class="newsview">
            <h3 class="news_title">{{ $article->title }}</h3>
            <div class="news_author">
                <span class="au01">
                    <a href="mailto:dancesmiling@qq.com">小振</a>
                </span>
                <span class="au02">{{ $article->created_at->toDateString() }}</span>
                <span class="au03">共<b>{{ $article->view_count }}</b>人围观</span>
            </div>
            <div class="tags">
                <a href="/e/tags/?tagname=%B8%F6%C8%CB%B2%A9%BF%CD&amp;tempid=13" target="_blank">个人博客</a> &nbsp;
                <a href="/e/tags/?tagname=%D0%A1%CA%C0%BD%E7&amp;tempid=13" target="_blank">文章详情</a>
            </div>
            <div class="news_about">
                <strong>简介</strong>
                个人博客，用来做什么？我刚开始就把它当做一个我吐槽心情的地方，也就相当于一个网络记事本，写上一些关于自己生活工作中的小情小事，也会放上一些照片，音乐。每天工作回家后就能访问自己的网站，一边听着音乐，一边写写文章。
            </div>
            <div class="news_infos">
                {!! $article->description !!}
            </div>
        </div>
        <div class="share"> </div>
        <div class="nextinfo">
            @if($prev_article)
            <p>上一篇：<a href="{{ route('article.show', [$prev_article->id]) }}">{{ $prev_article->title }}</a></p>
            @endif
            @if($next_article)
            <p>下一篇：<a href="{{ route('article.show', [$next_article->id]) }}">{{ $next_article->title }}</a></p>
            @endif
        </div>
        <div class="otherlink">
            <h2>相关文章</h2>
            <ul>
                @foreach($relevants as $relevant)
                <li><a href="{{ route('article.show', [$relevant->id]) }}" title="html5个人博客模板《黑色格调》">{{ $relevant->title }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="news_pl">
            <h2>文章评论</h2>
            <ul>
                <div class="gbko"> </div>
            </ul>
        </div>
    </div>
    <div class="sidebar">
        @include('article._search')
        @include('common._info_me')
        @include('tag._tags', ['tags' => $tags])
        @include('article._hots', ['hots' => $hots])
        @include('article._recommends', ['recommends' => $recommends])
        @include('common._wx')
        <div class="ad" id="left_flow2"> <img src="/images/ad.jpg"> </div>
    </div>
</article>
@endsection

@section('scripts')
    <script src="https://cdn.bootcss.com/highlight.js/9.12.0/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    <script language="javascript" type="text/javascript">
        <!--
        function CheckLogin(){
            var taget_obj = document.getElementById('_ajax_feedback');
            myajax = new DedeAjax(taget_obj,false,false,'','','');
            myajax.SendGet2("/member/ajax_feedback.php");
            DedeXHTTP = null;
        }
        function postBadGood(ftype,fid)
        {
            var taget_obj = document.getElementById(ftype+fid);
            var saveid = GetCookie('badgoodid');
            if(saveid != null)
            {
                var saveids = saveid.split(',');
                var hasid = false;
                saveid = '';
                j = 1;
                for(i=saveids.length-1;i>=0;i--)
                {
                    if(saveids[i]==fid && hasid) continue;
                    else {
                        if(saveids[i]==fid && !hasid) hasid = true;
                        saveid += (saveid=='' ? saveids[i] : ','+saveids[i]);
                        j++;
                        if(j==10 && hasid) break;
                        if(j==9 && !hasid) break;
                    }
                }
                if(hasid) { alert('您刚才已表决过了喔！'); return false;}
                else saveid += ','+fid;
                SetCookie('badgoodid',saveid,1);
            }
            else
            {
                SetCookie('badgoodid',fid,1);
            }
            myajax = new DedeAjax(taget_obj,false,false,'','','');
            myajax.SendGet2("/plus/feedback.php?aid="+fid+"&action="+ftype+"&fid="+fid);
        }
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
        function getDigg(aid)
        {
            var taget_obj = document.getElementById('newdigg');
            myajax = new DedeAjax(taget_obj,false,false,'','','');
            myajax.SendGet2("/plus/digg_ajax.php?id="+aid);
            DedeXHTTP = null;
        }
        -->
    </script>

@endsection