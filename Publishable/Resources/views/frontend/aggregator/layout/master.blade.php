
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    @include('aggregator::frontend.aggregator.partials.shared.meta')
    <title>{{ config('app.name') }}</title>
    @include('aggregator::frontend.aggregator.partials.shared.style')
    @yield('css')
</head>
<body class="search-closed light-gray">
<!-- Preloader -->
<div class="preloader">
    <div class="loader"></div>
</div>
<!-- Search -->
{{--@include('aggregator::frontend.aggregator.partials.shared.search')--}}
<!-- Page-cover -->
<span class="page-cover nav-cover"></span>
<!-- Site Wrapper -->
<div class="site-wrapper">
    <!-- Header -->
    @if(Auth::check())
        @include('aggregator::frontend.aggregator.partials.shared.navigation')
    @endif
<!-- content -->
    @yield('content')
<!-- content -->
@include('aggregator::frontend.aggregator.partials.shared.footer')
</div>
@include('aggregator::frontend.aggregator.partials.shared.scripts')
@include('aggregator::shared.GoogleAnalytics')
</body>
</html>