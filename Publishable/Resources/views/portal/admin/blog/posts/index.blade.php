@extends(config('aggregator.views.layouts.admin'))

@section('content')
<section class="right_col" role="main">

<div class="row">
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class="page-title">

            <div class="pull-left">
                <h1 class="title">{{config('aggregator.purpose')}}</h1>
            </div>

            <div class="pull-right hidden-xs">
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ url('/') }}"><i class="fa fa-home"></i>Home</a>
                    </li>
                    <li>
                        <a href="{{route('admin.posts.index')}}">{{config('aggregator.purpose')}}</a>
                    </li>
                    <li class="active">
                        <strong>All {{config('aggregator.purpose')}}</strong>
                    </li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-8" style="margin-top: 20px">
            <div class="input-group primary">
            <span class="input-group-addon">
                <span class="arrow"></span>
                <i class="fa fa-search"></i>
            </span>
                <input type="text" class="form-control search-page-input" placeholder="Search" value="">
            </div>
        </div>
        <div class="col-md-4">
            <nav >
                {{-- $posts->links() --}}
            </nav>
        </div>
    </div>
</div>
    <div class="clearfix"></div><br>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                @if(isset($posts))
                    @foreach($posts as $post)
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h3><a href="{{route('admin.posts.show', $post->id)}}">{{$post->title}}</a></h3>
                                <h5>Written by <a href="#">{{$post->user->name}}</a> on {{$post->created_at->diffForHumans()}}.</h5>
                                <p class="blog_info">
                                    <i class="fa fa-comment"></i> <a href="#comments">3 comments</a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-tags"></i> <a href="#">responsive</a> <a href="#">web</a> <a href="#">mobile</a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-newspaper-o"></i>
                                    <a href="#">{{$post->category->name}}</a>
                                    <a href="#">web</a>
                                </p>
                                <img class="" style="max-width: 800px;height: auto;width:100%;margin:30px 0;" src="{{--asset($post->photo->file)--}}" alt="">
                                <p class="blog-content">
                                    {!! str_limit(strip_tags($post->body), 200) !!}
                                </p>
                                <a href="{{route('admin.posts.show', $post->id)}}" class="btn btn-primary"><span>Read more</span>  &nbsp; <i class="fa fa-angle-double-right"></i></a>

                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

</section>
@endsection
