<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- cdn -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css" rel="stylesheet">
	<!-- webfont -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/earlyaccess/notosansjp.css">
	<link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
	<!-- webfont -->
	<link rel="stylesheet" href="{{ asset("icomoon/style.css") }}">

	<!-- css -->
	<link rel="stylesheet" href="{{ asset("css/wp_common.css") }}">
	<!-- <link rel="stylesheet" href="css/header.css"> -->
	<link rel="stylesheet" href="{{ asset("css/footer.css") }}">
	<link rel="stylesheet" href="{{ asset("css/404.css") }}">
	<link rel="stylesheet" href="{{ asset("css/hack.css") }}">
	<link rel="stylesheet" href="{{ asset("css/ress.min.css") }}">
	<!-- プラグイン/js -->
	<link rel="stylesheet" href="{{ asset("css/js/lightbox.css") }}">
	<link rel="stylesheet" href="{{ asset("css/js/lightbox_custom.css") }}">
	<link rel="stylesheet" href="{{ asset("css/js/remodal-default-theme.css") }}">
	<link rel="stylesheet" href="{{ asset("css/js/remodal.css") }}">
	<link rel="stylesheet" href="{{ asset("css/js/animsition.min.css") }}">
	<link rel="stylesheet" href="{{ asset("css/js/inview.css") }}">
	<link rel="stylesheet" href="{{ asset("css/js/swiper_custom.css") }}">
	<!-- デザインテンプレート -->
	<link rel="stylesheet" href="{{ asset("css/style/layout.css") }}">
	<link rel="stylesheet" href="{{ asset("css/style/parts.css") }}">
	<link rel="stylesheet" href="{{ asset("css/style/decoration.css") }}">
	<link rel="stylesheet" href="{{ asset("css/style/font.css") }}">
	<link rel="stylesheet" href="{{ asset("css/style/margin_padding.css") }}">
	<link rel="stylesheet" href="{{ asset("css/style/hover.css") }}">
	<link rel="stylesheet" href="{{ asset("css/style/patternbolt.css") }}">
	<!-- デザインテンプレート section -->
	<link rel="stylesheet" href="{{ asset("css/section/section_ttl.css") }}">
	<link rel="stylesheet" href="{{ asset("css/section/contact_section.css") }}">
	<link rel="stylesheet" href="{{ asset("css/section/table_section.css") }}">
	<link rel="stylesheet" href="{{ asset("css/section/faq_section.css") }}">
	<link rel="stylesheet" href="{{ asset("css/section/advisor_card.css") }}">
	<!-- カスタマイズ -->
    <!-- <link rel="stylesheet" href="css/main.css") }}"> -->
    <link rel="stylesheet" href="{{ asset('css/main_lp_sub.css') }}">
    <link rel="stylesheet" href="{{ asset("css/service/service.css") }}">
    <link rel="stylesheet" href="{{ asset('css/footer_lp_sub.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<!-- js -->
	<script src="{{ asset("js/main.js") }}"></script>
	<script src="{{ asset("js/modernizr-custom.js") }}"></script>
	<script src="{{ asset("js/css_browser_selector.js") }}"></script>
	<script src="{{ asset("js/jquery.waypoints.min.js") }}"></script>
	<!-- プラグイン -->
	<script src="{{ asset("js/animsition.min.js") }}"></script>
	<script src="{{ asset("js/easing.js") }}"></script>
	<script src="{{ asset("js/inview.js") }}"></script>
	<!-- 残りはfooterで -->

	<!-- js -->
	<script>
	jQuery(document).ready(function($){
	    var ua = navigator.userAgent;
	    if((ua.indexOf('iPhone') > 0) || ua.indexOf('iPod') > 0 || (ua.indexOf('Android') > 0 && ua.indexOf('Mobile') > 0)){
	        $('head').prepend('<meta name="viewport" content="width=device-width,initial-scale=1">');
	    } else {
	        $('head').prepend('<meta name="viewport" content="width=1080">');
	    }
	});
	</script>
	<script>
		$(window).on('load',function(){
		  // URLの取得
		  var url = location.href;

		  if (url == "http://localhost:8888/career_advisor_test/login.php"){
		    $("header").remove();
		  }
		});
	</script>
</head>
<body>
    <div id="app">
        <header id="nav_scrolled">
            <div class="header_inner container_service center_flex_ver">
                <!-- service logo -->
                <h1 class="brand">
                    <a class="animsition-link" href="/">
                        <img src="{{ asset("img/logo_wh.svg") }}" alt="キャリアアドバイザー.com">
                    </a>
                </h1>
                <!-- menu -->
                <!-- <div class="nav_overlay" id="nav_overlay"> -->
                <nav>
                    <ul id="ul_current">
                        @auth('user')
                            <li class="nav_li nav_li_menu" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><a class="nav_li_a fs14 fs16sp" href="#about"><img src="{{ asset("img/service/default_usericon.jpg") }}" alt="マイページ" class="nav_user_icon"></a></li>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('user.mypage') }}">マイページ</a>
                                <a class="dropdown-item" href="{{ route('user.logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    ログアウト
                                </a>

                                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                            <li class="nav_li nav_li_menu"><a class="nav_li_a fs14 fs16sp" href="#advisor"><img src="{{ asset("img/service/chat.svg") }}" alt="チャット"></a></li>
                            <li class="nav_li nav_li_menu"><a class="nav_li_a fs14 fs16sp" href="#flow"><img src="{{ asset("img/service/info.svg") }}" alt="お知らせ"></a></li>
                        @endauth
                    </ul>
                </nav>

                <!-- </div> -->
            </div>
        </header>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ route("user.mypage") }}">
                    ユーザー画面
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <!-- Left Side Of Navbar -->
                        @auth('user')
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route("user.mypage") }}">アドバイザー一覧</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route("admin.users.index") }}">チャット</a>
                            </li>
                        </ul>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">ログイン</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">新規登録</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>


                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-error" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer>
        @auth('user')
            <div class="footer_inner container_service">
                <div class="row footer_upper_row space_between center_flex_ver">
                    <div class="footer_brand">
                        <a href="/">
                            <img src="{{ asset('img/logo_wh.svg') }}" alt="">
                        </a>
                    </div>
                    <!-- 横積み -->
                    <div class="footer_nav">
                        <ul class="flex flex_end">
                            <li class="footer_nav_li"><a href="" class="fs14 fs13sp">利用規約</a></li>
                            <li class="footer_nav_li"><a href="" class="fs14 fs13sp">プライバシーポリシー</a></li>
                            <li class="footer_nav_li"><a href="" class="fs14 fs13sp">運営会社</a></li>
                            <!-- <li class="footer_nav_li"><a href="" class="fs14 fs13sp">アドバイザー一覧</a></li> -->
                            <!-- <li class="footer_nav_li"><a href="" class="fs14 fs13sp">よくある質問</a></li> -->
                            <!-- <li class="footer_nav_li"><a href="" class="fs14 fs13sp">お問い合わせ</a></li> -->
                        </ul>
                    </div>
                    <!-- 横積み -->
                </div>
            </div>
            <!-- <p class="copyright">Copyright &copy; ownername All Rights Reserved.</p> -->
            <small class="copyright block fs12 fs11sp">&copy; 2019<!-- <span id="thisYear"></span> --> RASHISA Inc.</small>
        @endauth
        @guest
            <div class="footer_inner container">
                <div class="row footer_upper_row space_between center_flex_ver">
                    <!-- 横積み -->
                    <div class="footer_nav">
                        <ul class="flex flex_end">
                            <li class="footer_nav_li"><a href="terms.php" class="fs12">利用規約</a></li>
                            <li class="footer_nav_li"><a href="privacy.php" class="fs12">プライバシーポリシー</a></li>
                            <li class="footer_nav_li"><a href="{{ route('company') }}" class="fs12">運営会社</a></li>
                        </ul>
                    </div>
                    <small class="copyright_lp_sub block fs12 fs11sp">&copy; 2019<!-- <span id="thisYear"></span> --> RASHISA Inc.</small>
                </div>
            </div>
        @endguest
    </footer>

    <script src="{{ asset("js/remodal.js") }}"></script>
    <script src="{{ asset("js/accordion_wp.js") }}""></script>
    <script src="{{ asset("js/lightbox.js") }}""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>
    <script>
        $(window).on('load',function(){
        var mySwiper = new Swiper ('.swiper-container', {
            loop: false,
            slidesPerView: 3,
            spaceBetween: 15,
            centeredSlides : false,
            pagination: '.swiper-pagination',
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            breakpoints: {
                600: {
                    slidesPerView: 1
                },
                1080: {
                    slidesPerView: 2
                }
            }
        })
        });
    </script>
    <script>
    jQuery(function($) {
        var topBtn=$('#pageTop');
        topBtn.hide();
        //◇ボタンの表示設定
        $(window).scroll(function(){
        if($(this).scrollTop()>150){
            topBtn.fadeIn(800);
        }else{
            topBtn.fadeOut(800);
        }
        });
        topBtn.click(function(){
        $('body,html').animate({
        scrollTop: 0},600);
        return false;
        });
    });
    </script>
</body>
</html>
