    <meta charset="utf-8">

    <title>{{ config('app.name') }}</title>

    <!-- SEO Tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="{{ \Tyondo\Aggregator\Models\Settings::blogSeo() }}">
    <meta name="author" content="{{ \Tyondo\Aggregator\Models\Settings::blogAuthor() }}">
    <meta name="description" content="{{ \Tyondo\Aggregator\Models\Settings::blogDescription() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('') }}">

    <!-- Facebook Open Graph Tags -->
    <meta property="og:title" content="@yield('og-title')">
    <meta property="og:image" content="@yield('og-image')">
    <meta property="og:image:width" content="800">
    <meta property="og:description" content="@yield('og-description')">
    <meta name="og:type" content="blog">
    <meta name="og:site_name" content="{{ \Tyondo\Aggregator\Models\Settings::blogTitle() }}">

    <!-- Twitter Cards -->
    <meta name="twitter:title" content="@yield('twitter-title')">
    <meta name="twitter:description" content="@yield('twitter-description')">
    <meta name="twitter:image" content="@yield('twitter-image')">
