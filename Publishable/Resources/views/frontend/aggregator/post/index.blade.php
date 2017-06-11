@extends('aggregator::frontend.aggregator.layout.master')

@section('content')
    @include('aggregator::frontend.aggregator.post.includes.post')
    <!-- Aside -->
    <aside class="aside">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4 class="section-title">You May Also Like</h4>
                </div>
            </div>
            <div class="row">
                @if(isset($posts))
                    @foreach($posts as $post)
                        <div class="col-sm-6 col-lg-3">
                            <article class="card recent">
                                <figure class="card-image overlay-figure" style="background-image: url({{asset($post->photo->file)}})">
                                    <figcaption class="overlay">
                                        <div class="overlay-content">
                                            <span>Read more</span>
                                        </div>
                                        <a href="{{route('blog.post.show', $post->slug)}}" class="overlay-link">Read more</a>
                                    </figcaption>
                                </figure>
                                <section class="card-block">
                                    <h5 class="card-title title"><a href="{{route('blog.post.show', $post->slug)}}">{{ $post->title }}</a></h5>
                                    <p class="card-text">
                                        {!! str_limit(strip_tags($post->body), $limit = 150, $end = '....... <a href='.route("blog.post.show", $post->slug).'>Read More</a>') !!}
                                    </p>
                                </section>
                            </article>
                        </div>
                    @endforeach
                <!-- END Single News -->
                @endif
            </div>
        </div>
    </aside>

@endsection