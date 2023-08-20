@inject('mainPresenter', 'App\Presenters\MainPresenter')
<!DOCTYPE html>
<html class="no-js" lang="{{ session()->get('webLanguage') }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Yahsin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui" />
    <!-- Facebook share og meta /begin -->
    <meta property="og:title" content="Yahsin">
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
    @include('user.basic.common_css')
    <!-- Common CSS file /end -->
    <!-- Page CSS file /begin -->
    @stack('page_css')
    <!-- Page CSS file /end -->
    <!-- Google Tag Manager -->
    <!--<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-ID');</script>-->
    <!-- End Google Tag Manager -->
    @stack('csrf_token')
</head>
<body>
<div class="container">
    @include('user.basic.header')

    <section class="main">
        @yield('main')
    </section>

    @include('user.basic.footer')

</div>

@include('user.basic.common_js')

@stack('page_script')
</body>
</html>
