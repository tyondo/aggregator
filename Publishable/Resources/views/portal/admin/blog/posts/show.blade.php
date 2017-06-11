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
                                <i class="fa fa-tags"></i> <a href="#">responsive</a> <a href="#">web</a> <a href="#">mobile</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <i class="fa fa-newspaper-o"></i> <a href="#">{{$post->category->name}}</a> <a href="#">web</a>
                            </p>
                            <img class="" style="max-width: 800px;height: auto;width:100%;margin:30px 0;" src="{{asset($post->photo->file)}}" alt="">

                            <div class="blog-content">
                                <?php print_r($post->body);?>
                            </div>

                            <div id="comments">

                                <h3>Comments</h3>

                                <div class="well comment-block level-1" style="display:inline-block;">
                                    <div class="col-md-1 col-sm-2 col-xs-3 img-area">
                                        <img src="data/profile/avatar-1.png">
                                    </div>
                                    <div class="col-md-11 col-sm-10 col-xs-9">
                                        <h5><i class="icon-user"></i>&nbsp;By <a href="#">Jason</a> on May 12, 2013.</h5>
                                        <div>
                                            <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong in labore pig pork biltong.</p>
                                        </div>
                                        <a href="#" class="pull-left">Reply &nbsp;<i class="fa fa-angle-double-right"></i></a>
                                    </div>
                                </div>


                                <div class="well comment-block level-2" style="display:inline-block;">
                                    <div class="col-md-1 col-sm-2 col-xs-3 img-area">
                                        <img src="data/profile/avatar-2.png">
                                    </div>
                                    <div class="col-md-11 col-sm-10 col-xs-9">
                                        <h5><i class="icon-user"></i>&nbsp;By <a href="#">Jason</a> on May 12, 2013.</h5>
                                        <div>
                                            <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong in labore pig pork biltong.</p>
                                        </div>
                                        <a href="#" class="pull-left">Reply &nbsp;<i class="fa fa-angle-double-right"></i></a>
                                    </div>
                                </div>

                                <div class="well comment-block level-3" style="display:inline-block;">
                                    <div class="col-md-1 col-sm-2 col-xs-3 img-area">
                                        <img src="data/profile/avatar-3.png">
                                    </div>
                                    <div class="col-md-11 col-sm-10 col-xs-9">
                                        <h5><i class="icon-user"></i>&nbsp;By <a href="#">Jason</a> on May 12, 2013.</h5>
                                        <div>
                                            <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong in labore pig pork biltong.</p>
                                        </div>
                                        <a href="#" class="pull-left">Reply &nbsp;<i class="fa fa-angle-double-right"></i></a>
                                    </div>
                                </div>

                                <div class="well comment-block level-1" style="display:inline-block;">
                                    <div class="col-md-1 col-sm-2 col-xs-3 img-area">
                                        <img src="data/profile/avatar-4.png">
                                    </div>
                                    <div class="col-md-11 col-sm-10 col-xs-9">
                                        <h5><i class="icon-user"></i>&nbsp;By <a href="#">Jason</a> on May 12, 2013.</h5>
                                        <div>
                                            <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong in labore pig pork biltong.</p>
                                        </div>
                                        <a href="#" class="pull-left">Reply &nbsp;<i class="fa fa-angle-double-right"></i></a>
                                    </div>
                                </div>

                            </div>

                            <div class="clearfix"></div><br>
                            <h3>Leave a Comment</h3>
                            <form class="form row">
                                <div class="form-group col-xs-9">
                                    <label class="form-label" for="inputName">Name</label>
                                    <div class="controls">
                                        <input type="text" class=" form-control col-md-12" id="inputName">
                                    </div>
                                </div>
                                <div class="form-group col-xs-9">
                                    <label class="form-label" for="inputEmail">Email</label>
                                    <div class="controls">
                                        <input type="text" class=" form-control col-md-12" id="inputEmail">
                                    </div>
                                </div>

                                <div class="form-group col-xs-9">
                                    <label class="form-label" for="inputComment">Comment</label>
                                    <div class="controls">
                                        <textarea class=" form-control col-md-12" id="inputComment" rows="6"></textarea>
                                    </div>
                                </div>

                                <div class="form-group col-xs-9">
                                    <div class="controls action">
                                        <button type="submit" class="btn btn-primary">Post Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end -->
                    </div>
                </div>
            </div>
        </section></div>
</section>
@endsection

