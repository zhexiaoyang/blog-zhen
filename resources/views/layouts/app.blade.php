<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', '滴答博客') - 成长学习的一点一滴</title>

    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/gong.css') }}">
    @yield('styles')

    <!--[if lt IE 9]>
        <script src="{{ asset('js/html5.js') }}"></script>
        <script src="{{ asset('js/selectivizr-min.js') }}"></script>
    <![endif]-->
</head>

<body class="home blog">
    @include('layouts._header')
    <section class="container">
        <div class="speedbar">
            <div class="toptip">
                <strong class="text-success"><i class="fa fa-volume-up"></i></strong>
                {{ config('web_notice') }}
                {{--请在Chrome、Firefox等现代浏览器浏览本站。另外提供付费解决DEDE主题修改定制等技术服务，如果需要请--}}
                {{--<code>--}}
                    {{--<a href="http://wpa.qq.com/msgrd?v=3&uin=81946698&site=qq&menu=yes" rel="external nofollow" target="_blank" title="联系QQ">--}}
                        {{--<i class="fa fa-qq"></i>点击</a>--}}
                {{--</code>--}}
                {{--加我 QQ 说你的需求。--}}
            </div>
        </div>
        @yield('content')
    </section>
    @include('layouts._footer')
    <div style="display: none;" class="rollto">
        <button class="btn btn-inverse" data-type="totop" title="回顶部"> <i class="fa fa-arrow-up"> </i> </button>
    </div>
</body>
<!-- Scripts -->
<script type='text/javascript' src='{{ asset('js/jquery.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('js/jquery.js') }}'></script>
<script type='text/javascript' src='{{ asset('js/dedeajax2.js') }}'></script>
<script>
    window._deel = {
        name: '博客',
        url: '/',
        ajaxpager: true,
        commenton: 0,
        roll: [2, 5],
    }
    if (document.domain == "/") {
        window.location.href = '/';
    }
</script>
@yield('scripts')
</html>