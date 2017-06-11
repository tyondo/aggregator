@if(isset($posts))
    @foreach($posts as $post)
        <div class="item col-sm-6 col-md-4 col-lg-3 {{isset($post->category->slug)?$post->category->slug:null}}">
            <article class="card design">
                <figure class="overlay-figure">
                    @if ($post->photo->file)
                        <img src="{{asset($post->photo->file)}}" alt="img">
                    @endif
                    <figcaption class="overlay">
                        <div class="overlay-content">
                            <span>Read more</span><i class="mdi mdi-magnify"></i>
                        </div>
                        <a href="{{route('blog.post.show', $post->slug)}}" class="overlay-link">Read more</a>
                    </figcaption>
                </figure>
                <section class="card-block">
                    <h5 class="card-title title"><a href="{{route('blog.post.show', $post->slug)}}">{{ $post->title }}</a></h5>
                    <p class="card-text">
                        {!! str_limit(strip_tags($post->body), $limit = 150, $end = '.......') !!}
                    </p>
                </section>
            </article>
        </div>
    @endforeach
    <!-- END Single News -->
@endif
