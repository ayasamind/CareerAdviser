<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-T6FGFNB');</script>
    <!-- Scripts -->
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T6FGFNB"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
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
	<link rel="stylesheet" href="https://fonts.googleapis.com/earlyaccess/notosansjp.css">
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
    <link rel="stylesheet" href="{{ asset("css/user.css") }}">
	<!-- js -->
	<script src="{{ asset("js/main.js") }}"></script>
	<script src="{{ asset("js/modernizr-custom.js") }}"></script>
	<script src="{{ asset("js/css_browser_selector.js") }}"></script>
	<script src="{{ asset("js/jquery.waypoints.min.js") }}"></script>
	<!-- プラグイン -->
	<script src="{{ asset("js/animsition.min.js") }}"></script>
	<script src="{{ asset("js/easing.js") }}"></script>
    <script src="{{ asset("js/inview.js") }}"></script>
    <script src="{{ asset("js/remodal.min.js") }}"></script>
	<!-- 残りはfooterで -->

	<!-- js -->
	<script>
        $(document).ready(function($){
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
    <script>
        url = "{{ url('') }}"
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
                            <li href="{{ route('advisers.index') }}">
                                <a class="nav_li_a fs14 fs16sp font-white" href="{{ route('advisers.index') }}">アドバイザー一覧</a>
                            </li>
                            <li href="{{ route('user.mypage') }}">
                                <a class="nav_li_a fs14 fs16sp" href="{{ route('user.mypage') }}">
                                    @if (Auth::user()->UserProfile)
                                        <img src="{{ Auth::user()->UserProfile->photo_url ? Auth::user()->UserProfile->photo_url : asset("img/service/default_usericon.jpg") }}" alt="マイページ" class="nav_user_icon">
                                    @else
                                        <img src="{{ asset("img/service/default_usericon.jpg") }}" alt="マイページ" class="nav_user_icon">
                                    @endif
                                </a>
                            </li>
                        @endauth
                        @guest
                            <li href="{{ route('register') }}">
                                <a class="nav_li_a fs14 fs16sp font-white" href="{{ route('register') }}">会員登録</a>
                            </li>
                            <li href="{{ route('login') }}">
                                <a class="nav_li_a fs14 fs16sp font-white" href="{{ route('login') }}">ログイン</a>
                            </li>
                        @endguest
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
            <div id="server-success" class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div id="server-error" class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <main class="py-4">
            @yield('content')
            <div id="fade" class="hide">
                <div class="typing_loader"></div>
            </div>
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
                            <li class="footer_nav_li"><a href="{{ route('terms') }}" class="fs14 fs13sp">利用規約</a></li>
                            <li class="footer_nav_li"><a href="{{ route('policy') }}" class="fs14 fs13sp">プライバシーポリシー</a></li>
                            <li class="footer_nav_li"><a href="{{ route('company') }}" class="fs14 fs13sp">運営会社</a></li>
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
                            <li class="footer_nav_li"><a href="{{ route('terms') }}" class="fs12">利用規約</a></li>
                            <li class="footer_nav_li"><a href="{{ route('policy') }}" class="fs12">プライバシーポリシー</a></li>
                            <li class="footer_nav_li"><a href="{{ route('company') }}" class="fs12">運営会社</a></li>
                        </ul>
                    </div>
                    <small class="copyright_lp_sub block fs12 fs11sp">&copy; 2019<!-- <span id="thisYear"></span> --> RASHISA Inc.</small>
                </div>
            </div>
        @endguest
    </footer>
    @yield('script')
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
        $(function($) {
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
