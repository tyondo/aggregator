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
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
        <section class="box ">
            <div class="content-body">
                <div class="row">
                  {!! Form::model($post, ['route' => ['admin.posts.update', $post->id], 'method' => 'PATCH', 'files' => true ]) !!}
                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12 padding-bottom-30">

                            <div class="form-group">
                                <label class="form-label" for="field-1">Title</label>
                                <span class="desc"></span>
                                <div class="controls">
                                    {{ Form::text('title', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="form-label" for="field-5">Content</label>
                                <span class="desc"></span>
                                {{ Form::textarea('body', null, ['class' => 'form-control', 'id' => 'postBody']) }}
                                <br>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12 padding-bottom-30">
                              <div class="form-group">
                                  <label class="form-label" for="field-6">Excerpt</label>
                                  <span class="desc"></span>
                                  <div class="controls">
                                    {{ Form::textarea('summary', null, ['class' => 'autogrow form-control']) }}
                                  </div>
                              </div>
                                <div class="form-group">
                                    <label class="form-label" for="field-5">Created On</label>
                                    <span class="desc">e.g. "04/03/2015"</span>
                                    <div class="controls">
                                      {{ Form::text('created_at', null, ['class' => 'form-control datepicker','data-format'=>'mm/dd/yyyy','disabled'=>'']) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="field-5">Last Edited</label>
                                    <span class="desc">e.g. "04/03/2015"</span>
                                    <div class="controls">
                                      {{ Form::text('updated_at', null, ['class' => 'form-control datepicker','data-format'=>'mm/dd/yyyy','disabled'=>'']) }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="field-1">Featured Image</label>
                                    <span class="desc"></span>
                                    <img class="img-responsive" src="{!! $post->photo ? asset($post->photo->file)  : asset('assets/images/avatar2.png') !!}" alt="" style="max-width:120px;">
                                    <div class="controls">
                                        {{ Form::file('photo_id', ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="field-5">{{config('aggregator.purpose')}} Tags</label>
                                    <span class="desc"></span>
                                    <select multiple class="form-control">
                                        <option >Graphic</option>
                                        <option >Web Design</option>
                                        <option >Branding</option>
                                        <option>Web</option>
                                        <option>SEO</option>
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
                                    {{Form::select('status', ['1' => 'Draft', '2' => 'Published'], null, ['placeholder' => 'Select Status', 'class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12 padding-bottom-30">
                                <div class="text-left">
                                    <button type="submit" class="btn btn-primary col-sm-4 col-xs-4">Save</button>
                                    <button type="button" class="btn col-sm-4 col-xs-4">Cancel</button>
                                </div>
                    {!! Form::close() !!}
                    {!! Form::open(['route' => ['admin.posts.destroy', $post->id ], 'method' => 'Delete' ]) !!}
        							<button type="submit" class="btn btn-danger col-sm-4 col-xs-4">Delete</button>
        						</div>
        			{!! Form::close() !!}
                </div>


            </div>
            </div>
        </section>
    </div>
</section>
@include('mceImageUpload::upload_form')
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
