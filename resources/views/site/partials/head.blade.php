<meta charset="utf-8">
<!-- TITLE -->
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<meta name="apple-mobile-web-app-capable" content="yes">



<link rel="shortcut icon" href="{{@$config->favicon->path ?? ''}}" type="image/x-icon">
<link rel="apple-touch-icon" sizes="180x180" href="{{@$config->favicon->path ?? ''}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{@$config->favicon->path ?? ''}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{@$config->favicon->path ?? ''}}">
<meta name="application-name" content="{{ $config->web_title }}" />
<meta name="generator" content="@yield('title')" />

<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="@yield('title')">
<meta property="og:description" content="@yield('description')">
<meta property="og:image" content="@yield('image')">
<meta property="og:site_name" content="{{ url()->current() }}">
<meta property="og:image:alt" content="{{ $config->web_title }}">
<meta itemprop="description" content="@yield('description')">
<meta itemprop="image" content="@yield('image')">
<meta itemprop="url" content="{{ url()->current() }}">
<meta property="og:type" content="website" />
<meta property="og:locale" content="vi_VN" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="{{ url()->current() }}" />



<!-- GOOGLE FONT -->
<link href="https://fonts.googleapis.com/css?family=Hind:400,300,500,600%7cMontserrat:400,700" rel='stylesheet' type='text/css'>

<link
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
    rel="stylesheet"
/>
<!-- CSS LIBRARY -->
<link rel="stylesheet" type="text/css" href="/site/css/lib/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/site/css/lib/font-lotusicon.css">
<link rel="stylesheet" type="text/css" href="/site/css/lib/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/site/css/lib/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="/site/css/lib/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="/site/css/lib/magnific-popup.css">
<link rel="stylesheet" type="text/css" href="/site/css/lib/settings.css">
<link rel="stylesheet" type="text/css" href="/site/css/lib/bootstrap-select.min.css">


<link rel="stylesheet" type="text/css" href="/site/css/helper.css">
<link rel="stylesheet" type="text/css" href="/site/css/custom.css">
<link rel="stylesheet" type="text/css" href="/site/css/responsive.css">

<!-- MAIN STYLE -->
<link rel="stylesheet" type="text/css" href="/site/css/style.css">

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'vi',includedLanguages:'en,hi,vi,zh-CN' }, 'translate_select');
    }
</script>

<style>
    #goog-gt-tt {
        display: none !important;
    }
    .skiptranslate{
        display: none;
        top: 0;
    }
    .goog-te-banner-frame{display: none !important;}
    .goog-text-highlight { background: none !important; box-shadow: none !important;}
    .goog-te-banner-frame.skiptranslate {
        display: none !important;
    }
    body {
        position: revert!important;
        top: 0px !important;
    }
</style>
