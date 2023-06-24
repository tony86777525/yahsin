@inject('mainPresenter', 'App\Presenters\MainPresenter')
<!DOCTYPE html>
<html class="no-js" lang="zh-TW">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>YahSin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui" />
    <!-- Facebook share og meta /begin -->
    <meta property="og:title" content="YahSin">
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="{{ asset("images/user/og-image.jpg") }}" />
    <meta property="og:site_name" content="" />
    <meta property="og:locale" content="zh_TW" />
    <meta property="og:description" content="">
    <meta name="google-site-verification" content="KOzTjP7L2qL7CiwEbYHUnPyUxu09mtqU8xFrSfjY3eo" />
    <!-- Facebook share og meta /end -->
    <!-- This script prevents links from opening in Mobile Safari. https://gist.github.com/1042026 -->
    <!--
    <script>(function(a,b,c){if(c in b&&b[c]){var d,e=a.location,f=/^(a|html)$/i;a.addEventListener("click",function(a){d=a.target;while(!f.test(d.nodeName))d=d.parentNode;"href"in d&&(d.href.indexOf("http")||~d.href.indexOf(e.host))&&(a.preventDefault(),e.href=d.href)},!1)}})(document,window.navigator,"standalone")</script>
    -->
    <!-- Common CSS file /begin -->
    <link rel="shortcut icon" href="{{ asset("images/user/favicon.ico") }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset("js/user/swal2/sweetalert2.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("css/user/common.css") }}">
    <!-- Common CSS file /end -->
    <!-- Page CSS file /begin -->
    <!-- Page CSS file /end -->
    <script src="{{ asset("js/user/vendor/modernizr-2.7.1.min.js") }}"></script>
    <!-- Google Tag Manager -->
    <!--<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-ID');</script>-->
    <!-- End Google Tag Manager -->
    @yield('css')
</head>
<body>
<div class="container">
{{--    <header class="header header--pages">--}}
{{--        <div class="wrap">--}}
{{--            <div class="burger burger--pages" data-id="open-nav">--}}
{{--                <div class="burger__content">--}}
{{--                    <span></span>--}}
{{--                    <span></span>--}}
{{--                    <span></span>--}}
{{--                    <span></span>--}}
{{--                </div>--}}
{{--                <span class="burger__text">menu</span>--}}
{{--            </div>--}}
{{--            <a href="{{ route('user.top') }}" class="logo">--}}
{{--                <img class="image" src="{{ asset("images/user/logo-pages.png") }}" alt="THE YOGA SHALA-Mysore Taipei" />--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </header>--}}

    <nav class="nav">
        @include('user.basic.header.navbar')
    </nav>

    <section class="main">
        @yield('main')
        @yield('popup')
    </section>

    <footer class="footer">
        @include('user.basic.footer.common')
    </footer>

    @include('user.basic.footer.other')

    <div class="overlay" data-id="overlay"></div>
</div>

<script src="{{ asset("js/user/vendor/jquery-2.1.0.min.js") }}"></script>
<script src="{{ asset("js/user/helper.js") }}"></script>
<script src="{{ asset("js/user/plugins.js") }}"></script>
<script src="{{ asset("js/user/swal2/sweetalert2.min.js") }}"></script>
<script src="{{ asset("js/user/main.js") }}"></script>
@yield('js')
</body>
</html>
