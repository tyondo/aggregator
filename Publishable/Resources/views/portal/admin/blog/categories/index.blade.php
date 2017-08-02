@extends(config('aggregator.views.layouts.admin'))
@section('content')
<section class="right_col" role="main">

      <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
          <div class="page-title">
              <div class="pull-left">
                  <h1 class="title">Categories</h1>
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
                          <strong>All Categories</strong>
                      </li>
                  </ol>
              </div>
          </div>
      </div>
      <div class="clearfix"></div>

      <div class="row">
          <div class="col-sm-4">
              {!! Form::open(['route' => 'admin.categories.store', 'method' => 'post', 'files' => true ]) !!}
              <div class="">

                  <div class="form-group">
                      <label class="form-label" for="field-1">Term Title</label>
                      <span class="desc"></span>
                      <div class="controls">
                          {{ Form::text('title', null, ['class' => 'form-control', 'placeholder'=> 'Metadata']) }}
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="form-label" for="field-6">Description</label>
                      <span class="desc"></span>
                      <div class="controls">
                          {{ Form::text('meta_description', null, ['class' => 'form-control ']) }}
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="form-label" for="field-5">Term Type</label>
                      <span class="desc"></span>
                      <select name="term_type" class="form-control">
                          <option value="category">Category</option>
                          <option value="tag">Tag</option>
                      </select>
                  </div>

              </div>

              <div class="padding-bottom-30">
                  <div class="text-left">
                      <button type="submit" class="btn btn-primary">Save</button>
                      <button type="button" class="btn">Cancel</button>
                  </div>
              </div>
              {!! Form::close() !!}
          </div>
             <div class="col-sm-4">
                 <br />
                  <div class="panel panel-default">
                      <div class="panel-body">
                          <div class="row">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                  <h3 class="text-center">Categories</h3>
                                  <table id="example" class="display table table-hover table-condensed" cellspacing="0" width="100%">
                                      <thead>
                                      <tr>
                                          <th>Action</th>
                                          <th>Category</th>
                                          <th>Count</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      @if(isset($categories))
                                          @foreach($categories as $category)
                                              <tr>
                                                  <td>{{$category->id}}</td>
                                                  <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->title}}</a></td>
                                                  <td></td>
                                              </tr>
                                          @endforeach
                                      @endif
                                      </tbody>
                                  </table>
                                  <!-- ********************************************** -->
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          <div class="col-sm-4">
                 <br />
                  <div class="panel panel-default">
                      <div class="panel-body">
                          <div class="row">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                  <h3 class="text-center">Tags</h3>
                                  <table id="example" class="display table table-hover table-condensed" cellspacing="0" width="100%">
                                      <thead>
                                      <tr>
                                          <th>Action</th>
                                          <th>Tag</th>
                                          <th>Count</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      @if(isset($tags))
                                          @foreach($tags as $tag)
                                              <tr>
                                                  <td>{{$tag->id}}</td>
                                                  <td><a href="{{route('admin.categories.edit', $tag->id)}}">{{$tag->title}}</a></td>
                                                  <td></td>
                                              </tr>
                                          @endforeach
                                      @endif
                                      </tbody>
                                  </table>
                                  <!-- ********************************************** -->
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
      </div>
  </section>
@endsection
