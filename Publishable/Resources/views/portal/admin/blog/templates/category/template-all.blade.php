@extends('layouts.admin')
@section('otherCSS')
@endsection

@section('content')
<section class="wrapper main-wrapper" style=''>

    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class="page-title">

            <div class="pull-left">
                <h1 class="title">Blog Posts</h1>                            </div>

            <div class="pull-right hidden-xs">
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html"><i class="fa fa-home"></i>Home</a>
                    </li>
                    <li>
                        <a href="blo-blogs.html">Blogs</a>
                    </li>
                    <li class="active">
                        <strong>All Blogs</strong>
                    </li>
                </ol>
            </div>

        </div>
    </div>
    <div class="clearfix"></div>


    <div class="col-md-9 col-sm-12 col-xs-12">

        <div class="input-group primary">
            <span class="input-group-addon">
                <span class="arrow"></span>
                <i class="fa fa-search"></i>
            </span>
            <input type="text" class="form-control search-page-input" placeholder="Search" value="">
        </div><br>
    </div>
    <div class="col-md-3 col-sm-12 col-xs-12">
        <nav class='pull-right'>
            <!--                                  <ul class="pager" style="margin:0px;">
                                                                                <li><a href="#"><i class='fa fa-arrow-left icon-xs icon-orange icon-secondary'></i></a></li>
                                                                                <li><a href="#"><i class='fa fa-arrow-right icon-xs icon-orange icon-secondary'></i></a></li>
                                                                              </ul> -->

            <ul class="pagination pull-right" style="margin:0px;">
                <li><a href="#">«</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">»</a></li>
            </ul>

        </nav>
    </div>

    <div class="clearfix"></div><br>

    <div class="col-lg-12">
        <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left">Blog Posts</h2>
                <div class="actions panel_actions pull-right">
                    <i class="box_toggle fa fa-chevron-down"></i>
                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                    <i class="box_close fa fa-times"></i>
                </div>
            </header>
            <div class="content-body">    <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">


                        <!-- start -->

                        <div class="blog_post">
                            <h3><a href="blo-blog-view.html">Contrast and Similarity in Graphic Design</a></h3>
                            <h5>Written by <a href="#">Me</a> on May 11, 2013.</h5>
                            <p class="blog_info">
                                <i class="fa fa-comment"></i> <a href="#comments">3 comments</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <i class="fa fa-tags"></i> <a href="#">responsive</a> <a href="#">web</a> <a href="#">mobile</a>
                            </p>
                            <img class="" style="max-width: 800px;height: auto;width:100%;margin:30px 0;" src="data/blogs/blog-1.jpg" alt="">
                            <p class="blog-content">Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. <br />Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong.</p>
                            <a href="blo-blog-view.html" class="btn btn-primary"><span>Read more</span>  &nbsp; <i class="fa fa-angle-double-right"></i></a>
                        </div>

                        <div class="blog_post">
                            <h3><a href="blo-blog-view.html">Contrast and Similarity in Graphic Design</a></h3>
                            <h5>Written by <a href="#">Me</a> on May 11, 2013.</h5>
                            <p class="blog_info">
                                <i class="fa fa-comment"></i> <a href="#comments">3 comments</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <i class="fa fa-tags"></i> <a href="#">responsive</a> <a href="#">web</a> <a href="#">mobile</a>
                            </p>
                            <img class="" style="max-width: 800px;height: auto;width:100%;margin:30px 0;" src="data/blogs/blog-2.jpg" alt="">
                            <p class="blog-content">Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. <br />Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong.</p>
                            <a href="blo-blog-view.html" class="btn btn-primary"><span>Read more</span>  &nbsp; <i class="fa fa-angle-double-right"></i></a>
                        </div>


                        <div class="blog_post">
                            <h3><a href="blo-blog-view.html">Contrast and Similarity in Graphic Design</a></h3>
                            <h5>Written by <a href="#">Me</a> on May 11, 2013.</h5>
                            <p class="blog_info">
                                <i class="fa fa-comment"></i> <a href="#comments">3 comments</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <i class="fa fa-tags"></i> <a href="#">responsive</a> <a href="#">web</a> <a href="#">mobile</a>
                            </p>
                            <img class="" style="max-width: 800px;height: auto;width:100%;margin:30px 0;" src="data/blogs/blog-3.jpg" alt="">
                            <p class="blog-content">Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. <br />Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong.</p>
                            <a href="blo-blog-view.html" class="btn btn-primary"><span>Read more</span>  &nbsp; <i class="fa fa-angle-double-right"></i></a>
                        </div>

                        <div class="blog_post">
                            <h3><a href="blo-blog-view.html">Contrast and Similarity in Graphic Design</a></h3>
                            <h5>Written by <a href="#">Me</a> on May 11, 2013.</h5>
                            <p class="blog_info">
                                <i class="fa fa-comment"></i> <a href="#comments">3 comments</a>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <i class="fa fa-tags"></i> <a href="#">responsive</a> <a href="#">web</a> <a href="#">mobile</a>
                            </p>
                            <img class="" style="max-width: 800px;height: auto;width:100%;margin:30px 0;" src="data/blogs/blog-4.jpg" alt="">
                            <p class="blog-content">Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. <br />Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong.</p>
                            <a href="blo-blog-view.html" class="btn btn-primary"><span>Read more</span>  &nbsp; <i class="fa fa-angle-double-right"></i></a>
                        </div>
                        <!-- end -->
                    </div>
                </div>
            </div>
        </section></div>
</section>
@endsection

@section('otherScripts')

<!-- OTHER SCRIPTS
@endsection
