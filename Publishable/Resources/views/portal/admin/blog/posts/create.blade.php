@extends(config('aggregator.views.layouts.admin'))
@section('css')
@endsection

@section('content')
<div class="right_col" role="main">
<div class="row">
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class="page-title">
            <div class="pull-left">
                <h1 class="title">Add {{config('aggregator.purpose')}}</h1>
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
                        <strong>Add {{config('aggregator.purpose')}}</strong>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-body">
                {!! Form::open(['route' => 'admin.posts.store', 'method' => 'post', 'files' => true ]) !!}
                <div class="form-group">
                    <label class="form-label" for="field-1">{{config('aggregator.purpose')}} Title</label>
                    <span class="desc"></span>
                    <div class="controls">
                        {{ Form::text('title', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="field-5">{{config('aggregator.purpose')}} Content</label>
                    <span class="desc"></span>
                    {{ Form::textarea('body', null, ['class' => 'form-control', 'id' => 'postBody']) }}
                    <br>
                </div>
                <div class="form-group">
                    <label class="form-label" for="field-6">{{config('aggregator.purpose')}} Excerpt</label>
                    <span class="desc"></span>
                    <div class="controls">
                        {{ Form::textarea('summary', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="field-1">Featured Image</label>
                    <span class="desc"></span>
                    <div class="controls">
                        {{ Form::file('featured_image_id', ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="field-5">{{config('aggregator.purpose')}} Tags</label>
                    <span class="desc"></span>
                    <select name="tag_id" class="form-control">
                        <option value="1">Business</option>
                        <option value="2">Product Update</option>
                        <option value="3">News</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="field-5">{{config('aggregator.purpose')}} Categories</label>
                    <span class="desc"></span>
                    {{ Form::select('category_id', ['' => 'Select Category'] + $categories, null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    <label class="form-label" for="field-5">{{config('aggregator.purpose')}} Status</label>
                    <span class="desc"></span>
                    {{Form::select('post_status', ['1' => 'Draft', '2' => 'Published'], null, ['placeholder' => 'Select Status', 'class' => 'form-control'])}}
                </div>
                <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12 padding-bottom-30">
                    <div class="text-left">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn">Cancel</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('script')
    <script src="{{asset('vendor/tyondo/aggregator/blog/admin/vendor/tinymce/js/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('vendor/tyondo/aggregator/blog/admin/vendor/tinymce/js/tinymce/plugins/advlist/plugin.min.js')}}"></script>
    <script src="{{asset('vendor/tyondo/aggregator/blog/admin/vendor/tinymce/js/tinymce/plugins/image/plugin.min.js')}}"></script>
    <script src="{{asset('vendor/tyondo/aggregator/blog/admin/vendor/tinymce/js/tinymce/plugins/imagetools/plugin.min.js')}}"></script>
    <script src="{{asset('vendor/tyondo/aggregator/blog/admin/vendor/tinymce/js/tinymce/plugins/table/plugin.min.js')}}"></script>
    <script src="{{asset('vendor/tyondo/aggregator/blog/admin/vendor/tinymce/js/tinymce/plugins/fullscreen/plugin.min.js')}}"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: '#postBody',
            theme: 'modern',
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
            ],
            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons | codesample fullscreen',
            image_advtab: true,
            templates: [
                { title: 'Test template 1', content: 'Test 1' },
                { title: 'Test template 2', content: 'Test 2' }
            ],
            relative_urls: false,
            file_browser_callback: function(field_name, url, type, win) {
                // trigger file upload form
                if (type == 'image') $('#formUpload input').click();
            }
        });
    </script>
@endsection
