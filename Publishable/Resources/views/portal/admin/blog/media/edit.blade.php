@extends('layouts.admin')

@section('css')
<link href="{{asset('assets/plugins/datatables/css/jquery.datatables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/plugins/datatables/css/jquery.datatables_themeroller.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
  @include('admin.partial.flash')
	<div class="col-md-3">
	    <div class="panel panel-white">
	        <div class="panel-heading clearfix">
						Create Category
	        </div>
	        <div class="panel-body">
						{!! Form::model($category, ['action' => ['AdminCategoriesController@update', $category->id], 'method' => 'PATCH', 'files' => true ]) !!}
								<div class="form-group">
                    {{ Form::text('name', null, ['class' => 'form-control']) }}
								</div>
								<button type="submit" class="btn btn-primary col-sm-6 col-xs-6">Edit Category</button>
						{!! Form::close() !!}
            {!! Form::open(['action' => ['AdminCategoriesController@destroy', $category->id ], 'method' => 'Delete' ]) !!}
						<div class="form-group">
							<button type="submit" class="btn btn-danger col-sm-6 col-xs-6">Delete</button>

						</div>
						{!! Form::close() !!}
	        </div>
	    </div>
	</div>
	<div class="col-md-9">

							<div class="table-responsive">
							    <table id="users" class="display table" style="width: 100%; cellspacing: 0;">
							        <thead>
							            <tr>
														<th>Id</th>
														<th>Name</th>
														<th>Created</th>
														<th>Updated</th>
							            </tr>
							        </thead>
							        <tfoot>
							            <tr>
							                <th>Id</th>
							                <th>Name</th>
															<th>Created</th>
															<th>Updated</th>
							            </tr>
							        </tfoot>
							        <tbody>
												@if(isset($categories))
													@foreach($categories as $category)
								            <tr>
								                <td>{{$category->id}}</td>
								                <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
								                <td>{{$category->created_at->diffForHumans()}}</td>
								                <td>{{$category->updated_at->diffForHumans()}}</td>
								            </tr>
													@endforeach
												@endif

							        </tbody>
							       </table>
							</div>
	</div>
@endsection

@section('script')
<script src="{{asset('assets/plugins/datatables/js/jquery.datatables.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {
      $('#users').DataTable({

      });
  } );
</script>
@endsection
