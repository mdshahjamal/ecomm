@extends('admin.admin_master')

  @section('category') active  @endsection

  @section('admin_content')
  <div class="container">
  <div class="row justify-content-center mt-5">
  	<div class="col-sm-8">
  		<div class="card">
  			<div class="card-header">
          <i class="fas fa-table mr-1"></i>
        All Categories
      </div>
  		</div>  
 
  			@if (session('msg'))
  			<div class="alert alert-success">
  				<p>{{ session('msg') }}</p>
          <button type="button" class="close" data-dismiss="alert" aria-label="close"><span>&times;</span></button>
  			</div>
  			@endif
        
        @if (session('dlt'))
                <div class="alert alert-danger">
                  <p>{{ session('dlt') }}</p>
                  <button type="button" class="close" data-dismiss="alert" aria-label="close"><span>&times;</span></button>
                </div>
                @endif

  		<table class="table table-striped table-bordered">
  			<thead>
  				<tr>
  					<th>ID</th>
  					<th>Category Name</th>
  					<th>Status</th>
  					<th colspan = 3>Actions</th>
  				</tr>
  			</thead>
        <tfoot>
              <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Status</th>
                <th colspan = 3>Actions</th>
              </tr>
            </tfoot>
  			<tbody>
  				@foreach($categories as $category)
  				<tr>
  					<td>{{$category->id}}</td>
  					<td>{{$category->category_name}}</td>
  					<td>
  						@if($category->status == 1)
  						<span class="badge badge-success">Active</span>
  						@else
  						<span class="badge badge-danger">Inactive</span>
  						@endif
  					</td>
  					<td>
  						<a href="{{ url('admin_categories/edit',$category->id)}}" class="btn btn-outline-primary"><i class="fas fa-pencil-alt"></i></a>
  					</td>
            <td>
              <form action="{{ url('admin_categories/delete', $category->id) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
              </form>
            </td>
            @if($category->status == 1)
            <td>
              <a href="{{ url('admin_categories/inactive',$category->id)}}" class="btn btn-danger"><i class="fa fa-arrow-down"></i></a>
            </td>
            @else
            <td>
              <a href="{{ url('admin_categories/active',$category->id)}}" class="btn btn-primary"><i class="fa fa-arrow-up"></i></a>
            </td>
            @endif
  					
  				</tr>
  				@endforeach
  			</tbody>
  		</table>
  		{{ $categories->links() }}
  		</div>

  		<div class="col-sm-4">
    <div class="card">
    	<div class="card-header">
        <i class="fas fa-plus-circle"></i>
      Add Category
    </div>
    </div>
  <div>
    
      <form method="POST" action="{{ route('category.store') }}">
          @csrf
          <div class="form-group">    
              <label for="category_name">Category Name</label>
              <input type="text" class="form-control" name="category_name"/>
          </div>
                                 
          <button type="submit" class="btn btn-primary">Save</button>
      </form>
  </div>
</div>
</div>
</div>
  		@endsection