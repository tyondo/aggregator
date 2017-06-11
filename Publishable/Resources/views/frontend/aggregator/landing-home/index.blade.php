@extends('aggregator::frontend.aggregator.layout.master')
@section('css')
    <link rel="stylesheet" href="{{asset('vendor/tyondo/aggregator/blog/front/css/landing.css')}}">
@endsection
@section('content')
@if(!Auth::check())
    <section class="heading hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-1">
                    <h1 class="title inverse">Musoni Kenya</h1>
                    <h5 class="monospace inverse">Next Generation Microfinance</h5>
                </div>
            </div>
            <div class="row">
                {{--<div class="col-md-offset-5 col-md-3">--}}
                <div class="col-md-3 offset-md-1">
                    <div class="front-end-login front-end-login-body">
                        {{ Form::open(['route' => 'login']) }}
                        <h4 class="front-end-login-h4">Welcome back.</h4>
                        {{ Form::input('email', 'email', null, ['class' => 'form-control input-sm chat-input','id'=> 'userName', 'placeholder' => 'Email']) }}
                        <br />
                        {{ Form::input('password', 'password', null, ['class' => 'form-control input-sm chat-input','id'=> 'userPassword', 'placeholder' => 'password' ])}}
                        <br />
                        <div class="front-end-login-wrapper">
                            <span class="group-btn">
                                {{ Form::submit('Login', ['class' => 'btn btn-primary btn-md']) }}
                            </span>
                        </div>
                        {{ Form::close() }}
                    </div>

                </div>
            </div>
        </div>
        <a href="#" class="scroll-down mdi mdi-chevron-down"></a>
    </section>
@endif
@if(Auth::check())
    <!-- Main -->
    <main class="main" role="main">
        <!-- Section -->
        <section class="section">
            <div class="container">
                <!-- Filter -->
                @include('aggregator::frontend.aggregator.landing-home.filter')
                <div class="row">
                    <!-- Section Masonry -->
                    <section class="masonry">
                        <div class="grid-sizer col-sm-6 col-md-4 col-lg-3"></div><!-- grid-sizer -->
                        <!-- Item -->
                    @include('aggregator::frontend.aggregator.landing-home.posts')
                    <!-- Item -->
                    </section><!-- / section.masonry -->
                </div>
                {{--
                Build Load More functionality
                <div class="row">
                    <div class="col">
                        <!-- Pagination -->
                        <nav class="page-nav" aria-label="...">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="cards-page2.html" id="load-more">Load More</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                --}}
            </div>
        </section>
    </main>
@endif

@endsection