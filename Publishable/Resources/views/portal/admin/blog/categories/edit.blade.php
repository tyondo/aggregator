@extends(config('aggregator.views.layouts.admin'))
@section('css')
<link href="{{asset('vendor/tyondo/aggregator/blog/admin/vendor/datepicker/css/datepicker.css')}}" rel="stylesheet" type="text/css" media="screen"/>
@endsection

@section('content')
<section class="right_col" role="main">
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class="page-title">
            <div class="pull-left">
                <h1 class="title">Add Blog Category</h1>
            </div>
            <div class="pull-right hidden-xs">
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ url('/home') }}"><i class="fa fa-home"></i>Home</a>
                    </li>
                    <li>
                        <a href="{{route('admin.categories.index')}}">Categories</a>
                    </li>
                    <li class="active">
                        <strong>Add Category</strong>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <section class="box ">
            <div class="content-body">
                <div class="row">
                  {!! Form::model($category, ['route' => ['admin.categories.update', $category->id], 'method' => 'PATCH', 'files' => true ]) !!}
                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12">
                            <div class="form-group">
                                <label class="form-label" for="field-1">Category Name</label>
                                <span class="desc"></span>
                                <div class="controls">
                                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder'=> 'Category']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="field-1">Category Slug</label>
                                <span class="desc"></span>
                                <div class="controls">
                                    {{ Form::text('slug', null, ['class' => 'form-control', 'placeholder'=> 'Slug']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="field-6">Description</label>
                                <span class="desc"></span>
                                <div class="controls">
                                  {{ Form::textarea('description', null, ['class' => 'form-control autogrow', 'cols' => '2']) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12 padding-bottom-30">
                            <div class="text-left">
                                <button type="submit" class="btn btn-primary col-sm-4 col-sm-4">Save</button>
                                <button type="submit" class="btn btn-default col-sm-4 col-sm-4">Cancel</button>
                            </div>
                {!! Form::close() !!}
                {!! Form::open(['route' => ['admin.categories.destroy', $category->id ], 'method' => 'Delete' ]) !!}
        						<button type="submit" class="btn btn-danger col-sm-4 col-sm-4">Delete</button>
                    </div>
        		{!! Form::close() !!}
                </div>
            </div>
        </section>
    </div>
</section>
@endsection

@section('script')
<script src="{{asset('vendor/tyondo/aggregator/blog/admin/vendor/datepicker/js/datepicker.js')}}" type="text/javascript"></script>
<script src="{{asset('vendor/tyondo/aggregator/blog/admin/vendor/autosize/autosize.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendor/tyondo/aggregator/blog/admin/vendor/inputmask/min/jquery.inputmask.bundle.min.js')}}" type="text/javascript"></script>
<script src="{{asset('vendor/tyondo/aggregator/blog/admin/vendor/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
<!-- OTHER SCRIPTS
@endsection
