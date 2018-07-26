<header id="header" class="header">
    <div class="container-inner">
        <div class="yusi-logo"><a href="/">
                <h1><span class="yusi-mono">滴答</span> <span class="yusi-bloger"> - 成长 学习 的 一点一滴！ </span></h1>
            </a> </div>
    </div>
    <div id="nav-header" class="navbar">
        <ul class="nav">
            @foreach($navs as $nav)
            <li id="menu-item-156" class="menu-item menu-item-type-taxonomy menu-item-object-category">
                <a href="{{ url($nav['url']) }}">
                    @if(!empty($nav['icon']))
                    <i class="fa {{$nav['icon']}} @if(!empty($nav['is_roate'])) fa-spin @endif"></i>
                    @endif
                    <span class="fontawesome-text">{{ $nav['title'] }}</span>
                </a>
                @if(!empty($nav['children']))
                <ul class="sub-menu">
                    @foreach($nav['children'] as $child)
                    <li id="menu-item-732" class="menu-item menu-item-type-taxonomy menu-item-object-category">
                        <a href="{{ url($child['url']) }}">{{ $child['title'] }}</a>
                    </li>
                    @endforeach
                </ul>
                @endif
            </li>
                <li style="float:right;">
                    <div class="toggle-search"><i class="fa fa-search"></i></div>
                    <div class="search-expand" style="display: none;">
                        <div class="search-expand-inner">
                            <form method="get" class="searchform themeform" onsubmit="location.href='https://cuiqingcai.com/?s=' + encodeURIComponent(this.s.value).replace(/%20/g, '+'); return false;" action="/">
                                <div>
                                    <input type="ext" class="search" name="s" onblur="if(this.value=='')this.value='search...';" onfocus="if(this.value=='search...')this.value='';" value="search...">
                                </div>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="screen-mini">
            <button data-type="screen-nav" class="btn btn-inverse screen-nav"> <i class="fa fa-list"> </i> </button>
        </div>
    </div>
</header>