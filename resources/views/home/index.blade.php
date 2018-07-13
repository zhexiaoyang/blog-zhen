<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta charset=utf-8>
    <meta http-equiv="X-UA-Compatible" content="IE=10,IE=9,IE=8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <title>HTML5绿色响应式博客文章类织梦整站源码</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="design by www.dede58.com" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/gong.css') }}">
    <script language="javascript" type="text/javascript" src="{{ asset('js/dedeajax2.js') }}"></script>
    <script type='text/javascript' src='{{ asset('js/jquery.min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('js/jquery.js') }}'></script>
    <script type='text/javascript'>
        function postDigg(ftype,aid)
        {
            var taget_obj = document.getElementById('diggNum'+aid);
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
            /*此处是调用dedeajax2.js文件里面的ajax类，实现无刷新数据的处理 */
            myajax = new DedeAjax(taget_obj,false,false,'','','');
            var url = "/plus/digg_ajax_list.php?action="+ftype+"&id="+aid;
            myajax.SendGet2(url);
        }

        function getDigg(aid)
        {
            var taget_obj = document.getElementById('diggNum'+aid);
            myajax = new DedeAjax(taget_obj,false,false,'','','');
            myajax.SendGet2("/plus/digg_ajax_list.php?id="+aid);
            DedeXHTTP = null;
        }
    </script>

    <!--[if lt IE 9]>
    <!--<script src="/gong/js/html5.js"></script>-->
    {{--<script src="/gong/js/selectivizr-min.js"></script>--}}
    <![endif]-->
    <!--[if lte IE 8]>
    <![endif]-->

</head>

<body class="home blog">
<header id="header" class="header">
    <div class="container-inner">
        <div class="yusi-logo"><a href="/">
                <h1><span class="yusi-mono">织梦58工具屋</span> <span class="yusi-bloger"> - 织梦模板 精品建站 拥有平衡式人生！ </span></h1>
            </a> </div>
    </div>
    <div id="nav-header" class="navbar">
        <ul class="nav">
            <li  class='current-menu-parent a' class="menu-item menu-item-type-custom menu-item-object-custom "><a href="/" title="HTML5绿色响应式博客文章类织梦整站源码">首页</a></li>
            <li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu  "><a  id="1"  href="/zmryt/" >每日一贴</a>
                <ul class="sub-menu">

                </ul>
            </li><li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu  "><a  id="2"  href="/zjpwk/" >教练文库</a>
                <ul class="sub-menu">

                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="/zjpwk/jljs/">教练技术</a> </li>

                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="/zjpwk/nlp/">NLP</a> </li>

                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="/zjpwk/cm/">催眠</a> </li>

                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="/zjpwk/xtpl/">系统排列</a> </li>

                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="/zjpwk/wxzl/">完型治疗</a> </li>

                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="/zjpwk/qzgx/">亲子关系</a> </li>

                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="/zjpwk/tdxl/">团队训练</a> </li>

                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="/zjpwk/ytxw/">源头学问</a> </li>

                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="/zjpwk/nlpsj/">nlp书籍</a> </li>

                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="/zjpwk/qt/">其它</a> </li>

                </ul>
            </li><li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu  "><a  id="3"  href="/zpxgj/" >培训工具</a>
                <ul class="sub-menu">

                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="/zpxgj/pxgs/">培训故事</a> </li>

                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="/zpxgj/pxyx/">培训游戏</a> </li>

                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="/zpxgj/pxdy/">培训电影</a> </li>

                    <li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="/zpxgj/pxqc/">培训器材</a> </li>

                </ul>
            </li>
            <li style="float:right;">
                <div class="toggle-search"><i class="fa fa-search"></i></div>
                <div class="search-expand" style="display: none;">
                    <div class="search-expand-inner">
                        <form class="searchform themeform" action="/plus/search.php">
                            <div>
                                <input type="ext" class="search" name="q"  autofocus="" x-webkit-speech="" value="search...">
                            </div>
                        </form>
                    </div>
                </div>
            </li>
        </ul>
        <div class="screen-mini">
            <button data-type="screen-nav" class="btn btn-inverse screen-nav"> <i class="fa fa-list"> </i> </button>
        </div>
    </div>
</header>
<section class="container">
    <div class="speedbar">
        <div class="toptip"> <strong class="text-success"> <i class="fa fa-volume-up"> </i> </strong> 请在Chrome、Firefox等现代浏览器浏览本站。另外提供付费解决DEDE主题修改定制等技术服务，如果需要请 <code> <a href="http://wpa.qq.com/msgrd?v=3&uin=81946698&site=qq&menu=yes" rel="external nofollow" target="_blank"
                                                                                                                                                                         title="联系QQ"> <i class="fa fa-qq"> </i> 点击 </a> </code> 加我 QQ 说你的需求。 </div>
    </div>

    <div class="content-wrap">
        <div class="content">
            <div id="wowslider-container1">
                <div class="ws_images">
                    <ul>
                        @foreach($articles as $article)
                        <li><a target="_blank" href="{{ route('article.show', [$article->id]) }}" title="{{ $article->title }}"> <img src="{{ $article->image_url }}"title="{{ $article->title }}" alt="{{ $article->title }}" /></a> </li>
                        @endforeach
                    </ul>
                </div>
                <div class="ws_thumbs">
                    <div>
                        @foreach($articles as $article)
                            <a target="_blank" href="{{ route('article.show', [$article->id]) }}" title="{{ $article->title }}"><img src="{{ $article->image_url }}"/></a>
                        @endforeach
                    </div>
                </div>
                <div class="ws_shadow"> </div>
            </div>
            {{--<div class="banner banner-sticky"> 此处有广告 </div>--}}
            <div class="hot-posts">
                <h2 class="title">本周热门排行</h2>
                <ul>
                    @foreach($articles as $article)
                    <li>
                        <p>
                            <span class="post-comments">评论 ({{ $article->view_count }})</span>
                            <span class="muted" id="diggNum190">
                                <a id="love" class="action" href="javascript:" onclick="javascript:postDigg('good',190)">
                                    <i class="fa fa-heart-o"></i>
                                    <span class="count"> 5 </span> 喜欢
                                </a>
                            </span>
                        </p>
                        <span class="label label-1">1</span> <a target="_blank" href="{{ route('article.show', [$article->id]) }}" title="{{ $article->title }}">{{ $article->title }}</a> </li>
                    <li>
                    @endforeach
                </ul>
            </div>
            @foreach($articles as $article)
            <article class="excerpt">
                <header>
                    <a class="label label-important" href="/zmryt/">每日一贴 <i class="label-arrow"></i></a>
                    <h2><a target="_blank" href="{{ route('article.show', [$article->id]) }}" title="{{ $article->title }}">{{ $article->title }}</a></h2>
                </header>
                <div class="focus">
                    <a target="_blank" href="{{ route('article.show', [$article->id]) }}">
                        <img class="thumb" src="{{ $article->image_url }}" alt="{{ $article->title }}" style="width: 220px;height: 125px;">
                    </a>
                </div>
                <span class="note">{{ $article->excerpt }}</span>
                <p class="auth-span">
                    <span class="muted"><i class="fa fa-clock-o"></i>{{ $article->created_at->toDateString() }}</span>
                    <span class="muted"><i class="fa fa-eye"></i>{{ $article->view_count }}℃</span>
                    <span class="muted">
                        <i class="fa fa-comments-o"></i>
                        <a target="_blank" href="/zmryt/105.html#comments">
                            {{ $article->view_count }}评论
                        </a>
                    </span>
                    <span class="muted" id="diggNum105">
                        <a id="love" class="action" href="javascript:" onclick="javascript:postDigg('good',105)">
                            <i class="fa fa-heart-o"></i>
                            <span class="count"> 7 </span> 喜欢
                        </a>
                    </span>
                </p>
            </article>
            @endforeach
        </div>
    </div>
    <aside class="sidebar">
        <div class="widget widget_text">
            <div class="textwidget">
                <div class="social"> <a data-original-title="新浪微博" href="http://weibo.com/" rel="external nofollow"
                                        title="" target="_blank"> <i class="sinaweibo fa fa-weibo"> </i> </a> <a data-original-title="腾讯微博" href="http://t.qq.com/" rel="external nofollow"
                                                                                                                 title="" target="_blank"> <i class="tencentweibo fa fa-tencent-weibo"> </i> </a> <a title="" data-original-title="" class="weixin"> <i class="weixins fa fa-weixin"> </i>
                        <div class="weixin-popover">
                            <div class="popover bottom in">
                                <div class="arrow"> </div>
                                <div class="popover-title"> 订阅号"培训师工具屋" </div>
                                <div class="popover-content"> <img src="/images/weixin.gif"> </div>
                            </div>
                        </div>
                    </a> <a data-original-title="Email" href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=Zl5XX1JQVFFXJhcXSAUJCw" rel="external nofollow"
                            title="" target="_blank"> <i class="email fa fa-envelope-o"> </i> </a> <a data-original-title="联系QQ" href="http://wpa.qq.com/msgrd?v=3&uin=81946698&site=qq&menu=yes" rel="external nofollow"
                                                                                                      title="" target="_blank"> <i class="qq fa fa-qq"> </i> </a> <a data-original-title="订阅本站" href="/rss.php" rel="external nofollow"
                                                                                                                                                                     target="_blank" title=""> <i class="rss fa fa-rss"> </i> </a> </div>
            </div>
        </div>
        <div class="widget d_subscribe">
            <div class="title">
                <h2> 邮件订阅 </h2>
            </div>
            <form action="http://list.qq.com/cgi-bin/qf_compose_send" target="_blank"
                  method="post">
                <p> 填写您的邮件地址，订阅更多的精彩内容： </p>
                <input name="t" value="qf_booked_feedback" type="hidden">
                <input name="id" value="d424e09a19a79d14ee16b72b7fe86673a74b547ae602c157"
                       type="hidden">
                <input name="to" class="rsstxt" placeholder="your@email.com" required=""
                       type="email">
                <input class="rssbutton" value="订阅" type="submit">
            </form>
        </div>
        <div class="widget d_postlist">
            <div class="title">
                <h2> 推荐文章 </h2>
            </div>
            <ul>
                @foreach($articles as $article)
                <li>
                    <a href="{{ route('article.show', [$article->id]) }}" title="{{ $article->title }}">
                        <span class="thumbnail">
                            <img src="{{ $article->image_url }}" alt="{{ $article->title }}">
                        </span>
                        <span class="text">{{ $article->title }}</span>
                        <span class="muted">{{ $article->created_at->toDateString() }}</span>
                        <span class="muted">
                            {{ $article->view_count }}评论
                        </span>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        {{--<div class="widget d_banner">--}}
            {{--<div class="d_banner_inner">--}}
                {{--此处有广告--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="widget d_tag">
            <div class="title">
                <h2> 标签云 </h2>
            </div>
            <div class="d_tags">
                @foreach($tags as $tag)
                    <a data-original-title="{{ $tag->title }}" title="" href=""> {{ $tag->title }} ({{ $tag->article_count }}) </a>
                @endforeach
            </div>
        </div>
        <div class="widget d_postlist">
            <div class="title">
                <h2> 猜你喜欢 </h2>
            </div>
            <ul>
                @foreach($articles as $article)
                    <li>
                        <a href="{{ route('article.show', [$article->id]) }}" title="{{ $article->title }}">
                        <span class="thumbnail">
                            <img src="{{ $article->image_url }}" alt="{{ $article->title }}">
                        </span>
                            <span class="text">{{ $article->title }}</span>
                            <span class="muted">{{ $article->created_at->toDateString() }}</span>
                            <span class="muted">
                                {{ $article->view_count }}评论
                        </span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        {{--<div class="widget d_banner">--}}
            {{--<div class="d_banner_inner">--}}
                {{--此处有广告--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="widget d_comment">
            <div class="title">
                <h2> 最新吐槽 </h2>
            </div>
            <ul>
                <li> <a href="/plus/view.php?aid=95" title="企业管理故事之-小猴种瓜上的评论"> <img alt="" src="/images/default.png" class="avatar avatar-48 photo"
                                                                                    height="48" width="48">
                        <div class="muted"> <i> 游客： </i> dfdsfdsfdsfdsfdsfdsfds </div>
                    </a> </li><li> <a href="/plus/view.php?aid=87" title="值得记住的团队激励故事上的评论"> <img alt="" src="/images/default.png" class="avatar avatar-48 photo"
                                                                                                 height="48" width="48">
                        <div class="muted"> <i> 游客： </i> 正好乙方它能丐帮，矿乡爷爷奶奶 </div>
                    </a> </li><li> <a href="/plus/view.php?aid=87" title="值得记住的团队激励故事上的评论"> <img alt="" src="/images/default.png" class="avatar avatar-48 photo"
                                                                                                 height="48" width="48">
                        <div class="muted"> <i> 游客： </i> 正好乙方它能丐帮，矿乡爷爷奶奶 </div>
                    </a> </li><li> <a href="/plus/view.php?aid=109" title="教练过程中被教练者常见的上的评论"> <img alt="" src="/images/default.png" class="avatar avatar-48 photo"
                                                                                                   height="48" width="48">
                        <div class="muted"> <i> 游客： </i> 654654654654 </div>
                    </a> </li><li> <a href="/plus/view.php?aid=165" title="《大地惊雷》-关于创业的上的评论"> <img alt="" src="/images/default.png" class="avatar avatar-48 photo"
                                                                                                   height="48" width="48">
                        <div class="muted"> <i> 游客： </i> 不熟的啊 你谁啊的 的反 </div>
                    </a> </li><li> <a href="/plus/view.php?aid=57" title="晚会高潮游戏-支援前线上的评论"> <img alt="" src="/images/default.png" class="avatar avatar-48 photo"
                                                                                                 height="48" width="48">
                        <div class="muted"> <i> 游客： </i> 学业悦。发表我的评论。 </div>
                    </a> </li>
            </ul>
        </div>
        <div class="widget widget_links">
            <div class="title">
                <h2> 友情链接 </h2>
            </div>
            <ul class="xoxo blogroll">
                <li><a href='http://www.dede58.com' target='_blank'>织梦模板</a> </li><li><a href='http://www.dede58.com' target='_blank'>织梦源码</a> </li><li><a href='http://www.dede58.com' target='_blank'>技术支持</a> </li>
            </ul>
        </div>
    </aside>

</section>

<footer class="footer">
    <div class="footer-inner">
        <div class="copyright pull-left"> Copyright &copy; 2002-2011 DEDE58.COM 织梦模板 版权所有 </div>
        <div class="trackcode pull-right"> <script language="javascript" type="text/javascript" src="http://js.users.51.la/17336586.js"></script>
            <noscript><a href="http://www.51.la/?17336586" target="_blank"><img alt="&#x6211;&#x8981;&#x5566;&#x514D;&#x8D39;&#x7EDF;&#x8BA1;" src="http://img.users.51.la/17336586.asp" style="border:none" /></a></noscript> </div>
    </div>
</footer>
<div style="display: none;" class="rollto">
    <button class="btn btn-inverse" data-type="totop" title="回顶部"> <i class="fa fa-arrow-up"> </i> </button>
</div>
<script type="text/javascript" src="{{ asset('js/slider.js') }}"></script>
<script src="{{ asset('js/h.js') }}" type="text/javascript"></script>
<script>
    window._deel = {
        name: '织梦58',
        url: '/',
        ajaxpager: 'on',
        commenton: 0,
        roll: [2, 5],
        appkey: {
            tqq: '801497376',
            tsina: '3036462609'
        }
    }
    if (document.domain == "/") {
        window.location.href = '/';
    }
</script>

</body>
</html>
