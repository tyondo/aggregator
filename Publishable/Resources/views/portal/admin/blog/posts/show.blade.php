@extends(config('aggregator.views.layouts.admin'))
@section('content')
<section class="right_col" role="main">

    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class="page-title">
            <div class="pull-left">
                <h1 class="title">{{config('aggregator.purpose')}}</h1>
            </div>
            <div class="pull-right hidden-xs">
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ url('/home') }}"><i class="fa fa-home"></i>Home</a>
                    </li>
                    <li>
                        <a href="{{route('admin.posts.index')}}">{{config('aggregator.purpose')}}</a>
                    </li>
                    <li class="active">
                        <strong>View {{config('aggregator.purpose')}}</strong>
                    </li>
                </ol>
            </div>

        </div>
    </div>
    <div class="clearfix"></div>

    <div class="col-lg-12">
        <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left">{{config('aggregator.purpose')}}</h2>
                <div class="actions panel_actions pull-right">
                    <i class="box_toggle fa fa-chevron-down"></i>
                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                    <i class="box_close fa fa-times"></i>
                </div>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <!-- start -->

                        <div class="blog_post full_blog_post">
                            <h3><a href="{{route('admin.posts.show', $post->id)}}">{{$post->title}}</a></h3>
                            <h5>Written by <a href="#">{{$post->user->name}}</a> on {{$post->created_at->diffForHumans()}}.</h5>
                            <p class="blog_info">
                                <i class="fa fa-comment"></i> <a href="#comments">3 comments</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <i class="fa fa-tags"></i>
                                @foreach($post->tags->toArray() as $tag )
                                    <a href="#">{{$tag['title']}}</a>
                                @endforeach
                                <i class="fa fa-newspaper-o"></i> <a href="#">{{$post->category->category}}</a>
                            </p>
                            <img class="" style="max-width: 400px;height: auto;width:100%;margin:30px 0;" src="{!! $post->featured_image ? asset($post->featured_image)  : asset('assets/images/avatar2.png') !!}" alt="">

                            <div class="blog-content">
                                <?php print_r($post->body);?>
                            </div>

                        </div>
                        <!-- end -->
                    </div>
                </div>
            </div>
        </section></div>
</section>
@endsection

