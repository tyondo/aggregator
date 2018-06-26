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
                            <a href="{{ url('/home') }}"><i class="fa fa-home"></i>Home</a>
                        </li>
                        <li>
                            <a href="{{route('admin.posts.index')}}">Blogs</a>
                        </li>
                        <li class="active">
                            <strong>All Blogs</strong>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <table id="example" class="display table table-hover table-condensed" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ft. Image</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Desc</th>
                        <th>Created</th>
                        <th>Updated</th>
                    </tr>
                    </thead>

                    <tbody>
                    @if(isset($posts))
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td><img height="50px" src="{!! $post->featured_image ? asset($post->featured_image)  : asset('assets/images/avatar2.png') !!}" alt=""></td>
                                <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
                                <td>{{$post->user->name}}</td>
                                <td>{{ $post->category ? $post->category->name  : 'Uncategorized' }}</td>
                                <td>

                                    {!! str_limit(strip_tags($post->body), 40) !!}
                                </td>
                                <td>{{$post->created_at->diffForHumans()}}</td>
                                <td>{{$post->updated_at->diffForHumans()}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</section>
@endsection

