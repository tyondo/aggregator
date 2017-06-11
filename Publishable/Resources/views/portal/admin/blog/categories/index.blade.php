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
          <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="panel panel-default">
                      <div class="panel-body">
                          <div class="row">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                  <h3 class="text-center">Categories</h3>
                                  <table id="example" class="display table table-hover table-condensed" cellspacing="0" width="100%">
                                      <thead>
                                      <tr>
                                          <th>ID</th>
                                          <th>Category Name</th>
                                          <th>Description</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      @if(isset($categories))
                                          @foreach($categories as $category)
                                              <tr>
                                                  <td>{{$category->id}}</td>
                                                  <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                                                  <td>{{$category->description}}</td>
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
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                  <div class="panel panel-default">
                      <div class="panel-body">
                          <div class="row">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                  <h3 class="text-center">Tags</h3>

                                  <table id="example" class="display table table-hover table-condensed" cellspacing="0" width="100%">
                                      <thead>
                                      <tr>
                                          <th>ID</th>
                                          <th>Tag Name</th>
                                          <th>Description</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      @if(isset($categories))
                                          @foreach($categories as $category)
                                              <tr>
                                                  <td>{{$category->id}}</td>
                                                  <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                                                  <td>{{$category->description}}</td>
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
      </div>
  </section>
@endsection
