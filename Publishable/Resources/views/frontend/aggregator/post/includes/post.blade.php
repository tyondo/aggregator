<section class="section">
    <div class="container">
        <div class="outer-wrapper mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <!-- Post -->
                    <article class="post">
                        <header class="post-header">
                            <h1 class="title">{{ isset($post->title) ? $post->title : 'Title not set' }}</h1>
                            <ul class="meta-list">
                                <li><time class="meta" datetime="2017-31-01 20:00">{{ $post->created_at->format('M d,Y \a\t h:i a') }}</time></li>
                                <li><span class="meta" data-text="in"><a href="#">Design</a></span></li>
                            </ul>
                        </header>
                        <figure class="figure wide mb-5">
                            <img src="{{asset($post->photo->file)}}" alt="photo">
                        </figure>
                        <section class="post-content">
                            {!! $post->body !!}
                        </section>
                        {{--<section class="post-tags">
                            <button type="button" class="btn btn-secondary btn-sm">somenthing</button>
                            <button type="button" class="btn btn-secondary btn-sm">adventure</button>
                            <button type="button" class="btn btn-secondary btn-sm">tagged</button>
                            <button type="button" class="btn btn-secondary btn-sm">awesome</button>
                        </section>--}}
                    </article>
                    <!-- Comments -->
                    <!-- Pagination -->
                    <nav>
                        <ul class="pagination pagination-big justify-content-between">
                            @if(isset($prevPost))
                                <li class="page-item">
                                    <a class="page-link" href="{{route('blog.post.show', $prevPost->slug)}}">
                                        <span class="d-block mb-2">Previous</span>
                                        <h6>{{$prevPost->title}}</h6>
                                        <p>{{$prevPost->category->name}}</p>
                                    </a>
                                </li>
                            @endif
                            @if(isset($nextPost))
                                <li class="page-item text-right">
                                    <a class="page-link" href="{{route('blog.post.show', $nextPost->slug)}}">
                                        <span class="d-block mb-2">Next</span>
                                        <h6>{{$nextPost->title}}</h6>
                                        <p>{{$prevPost->category->name}}</p>
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </nav>
                </div>
            </div><!-- /.row -->
        </div><!-- /.outer-wrapper -->
    </div><!-- /.container -->
</section>