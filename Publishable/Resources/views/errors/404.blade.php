@extends('frontend.v2.tyondo')
@section('content')
<!--  Page Content, class footer-fixed if footer is fixed  -->
<div id="page-content" class="header-static">
		<!--  Slider  -->
		<div id="flexslider" class="fullpage-wrap small">
				<ul class="slides">
						<li style="background-image:url({{asset('frontend/assets/img/404.jpg')}})">
								<div class="text text-center">
										<h1 class="white margin-bottom-small">404</h1>
										<p class="heading white margin-bottom">The page has been removed or the link you folowed probabably broken</p>
										<a href="{{ url('/') }}" class="btn-alt small active margin-null shadow">Return Home</a>
								</div>
								<div class="gradient dark"></div>
						</li>
				</ul>
		</div>
		<!--  END Slider  -->
</div>
<!--  Footer. Class fixed for fixed footer  -->

@endsection
