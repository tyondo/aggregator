@extends(config('aggregator.views.layouts.admin'))
@section('css')
@endsection

@section('content')
<section class="right_col" role="main">
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class="page-title">
            <div class="pull-left">
                <h1 class="title">Edit {{config('aggregator.purpose')}}</h1>
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
                        <strong>Edit {{config('aggregator.purpose')}}</strong>
                    </li>
                </ol>
            </div>

        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
            <div class="col-sm-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        {!! Form::model($post, ['route' => ['admin.posts.update', $post->id], 'method' => 'PATCH', 'files' => true ]) !!}
                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12 padding-bottom-30">

                            <div class="form-group">
                                <label class="form-label" for="field-1">{{config('aggregator.purpose')}} Title</label>
                                <span class="desc"></span>
                                <div class="controls">
                                    {{ Form::text('title', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="form-label" for="field-5">{{config('aggregator.purpose')}} Content</label>
                                <span class="desc"></span>
                                {{ Form::textarea('body', null, ['class' => 'form-control', 'id' => 'postBody']) }}
                                <br>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12 padding-bottom-30">
                                <div class="form-group">
                                    <label class="form-label" for="field-6">{{config('aggregator.purpose')}} Excerpt</label>
                                    <span class="desc"></span>
                                    <div class="controls">
                                        {{ Form::text('summary', null, ['class' => 'autogrow form-control']) }}
                                    </div>
                                </div>
                            </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="form-label" for="field-5">{{config('aggregator.purpose')}} Type</label>
                            <span class="desc"></span>
                            {{Form::select('post_type', ['standard' => 'Standard', 'video' => 'Video','audio'=>'Audio'], null, ['placeholder' => 'Select Status', 'class' => 'form-control'])}}
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="field-5">{{config('aggregator.purpose')}} Status</label>
                            <span class="desc"></span>
                            {{Form::select('post_status', ['draft' => 'Draft', 'published' => 'Published', 'review'=>'Review', 'inactive'=>'Inactive'], null, ['placeholder' => 'Select Status', 'class' => 'form-control'])}}
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="field-5">{{config('aggregator.purpose')}} Tags</label>
                            <span class="desc"></span>
                            <select name="tags[]" multiple class="form-control">
                                @foreach ($tags as $tag)
                                    <option @if (in_array($tag, $tags)) selected @endif value="{!! $tag !!}">{!! $tag !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="field-5">{{config('aggregator.purpose')}} Categories</label>
                            <span class="desc"></span>
                            {{ Form::select('category_id', ['' => 'Select Category'] + $categories, null, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="field-5">Created On</label>
                            <span class="desc"></span>
                            <div class="controls">
                                {{ Form::text('created_at', null, ['class' => 'form-control datepicker','data-format'=>'mm/dd/yyyy','disabled'=>'']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="field-5">Last Edited</label>
                            <span class="desc"></span>
                            <div class="controls">
                                {{ Form::text('updated_at', null, ['class' => 'form-control datepicker','data-format'=>'mm/dd/yyyy','disabled'=>'']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="field-2">Featured Content</label>
                            <div class="input-group">
                                      <span class="input-group-btn">
                                        <a data-input="thumbnails" data-preview="holder" class="btn btn-primary">
                                          <i class="fa fa-file-video-o"></i> Choose
                                        </a>
                                      </span>
                                <input id="thumbnails" class="form-control" type="text" name="featured_content">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="field-1">Featured Image</label>
                            <div class="input-group">
                                          <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                              <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                          </span>
                                <input id="thumbnail" class="form-control" type="text" name="featured_image" value="{!! $post->featured_image ? $post->featured_image  : '' !!}">
                            </div>
                            <img id="holder" style="margin-top:15px;max-height:100px;" class="img-responsive" src="{!! $post->featured_image ? asset($post->featured_image)  : asset('assets/images/avatar2.png') !!}" alt="">
                        </div>

                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12 padding-bottom-30">
                            <div class="text-left">
                                <button type="submit" class="btn btn-primary col-sm-4 col-xs-4">Save</button>
                                {!! Form::close() !!}
                                {!! Form::open(['route' => ['admin.posts.destroy', $post->id ], 'method' => 'Delete' ]) !!}
                                <button type="submit" class="btn btn-danger col-sm-4 col-xs-4">Delete</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>
        </div>
    </div>

</div>
</section>
@endsection

@section('script')
    <script src="{{asset('vendor/tyondo/aggregator/blog/admin/vendor/tinymce/js/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('vendor/tyondo/aggregator/blog/admin/vendor/tinymce/js/tinymce/plugins/advlist/plugin.min.js')}}"></script>
    <script src="{{asset('vendor/tyondo/aggregator/blog/admin/vendor/tinymce/js/tinymce/plugins/image/plugin.min.js')}}"></script>
    <script src="{{asset('vendor/tyondo/aggregator/blog/admin/vendor/tinymce/js/tinymce/plugins/imagetools/plugin.min.js')}}"></script>
    <script src="{{asset('vendor/tyondo/aggregator/blog/admin/vendor/tinymce/js/tinymce/plugins/table/plugin.min.js')}}"></script>
    <script src="{{asset('vendor/tyondo/aggregator/blog/admin/vendor/tinymce/js/tinymce/plugins/fullscreen/plugin.min.js')}}"></script>

    <script>
        var route_prefix = "{{ url(config('lfm.prefix')) }}";
    </script>

    <script>
        var editor_config = {
            path_absolute : "",
            selector: '#postBody',
            theme: 'modern',
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
            ],
            relative_urls: false,
            height: 129,
            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons | codesample fullscreen',
            image_advtab: true,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + route_prefix + '?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };
        tinymce.init(editor_config);
    </script>
    <script src="{{asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
    <script>
        {{--{!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}--}}
    </script>
    <script>
        $('#lfm').filemanager('image', {prefix: route_prefix});
    </script>
@endsection
