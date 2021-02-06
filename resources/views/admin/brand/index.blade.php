@extends('admin.admin_master')

  @section('brand') active  @endsection

  @section('admin_content')
  <div class="container">
  <div class="row justify-content-center mt-5">
  	<div class="col-sm-8">
  		<div class="card">
  			<div class="card-header">
          <i class="fas fa-table mr-1"></i>
        Brand Lists
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
  					<th>Brand Name</th>
  					<th>Status</th>
  					<th colspan = 3>Actions</th>
  				</tr>
  			</thead>
        <tfoot>
              <tr>
                <th>ID</th>
                <th>Brand Name</th>
                <th>Status</th>
                <th colspan = 3>Actions</th>
              </tr>
            </tfoot>
  			<tbody>
  				@foreach($brands as $brand)
  				<tr>
  					<td>{{$brand->id}}</td>
  					<td>{{$brand->brand_name}}</td>
  					<td>
  						@if($brand->status == 1)
  						<span class="badge badge-success">Active</span>
  						@else
  						<span class="badge badge-danger">Inactive</span>
  						@endif
  					</td>
  					<td>
  						<a href="{{ url('admin_brand/edit',$brand->id)}}" class="btn btn-outline-primary"><i class="fas fa-pencil-alt"></i></a>
  					</td>
            <td>
              <form action="{{ url('admin_brand/delete', $brand->id) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
              </form>
            </td>
            @if($brand->status == 1)
            <td>
              <a href="{{ url('admin_brand/inactive',$brand->id)}}" class="btn btn-danger"><i class="fa fa-arrow-down"></i></i></a>
            </td>
            @else
            <td>
              <a href="{{ url('admin_brand/active',$brand->id)}}" class="btn btn-primary"><i class="fa fa-arrow-up"></i></i></a>
            </td>
            @endif
  					
  				</tr>
  				@endforeach
  			</tbody>
  		</table>
  		{{ $brands->links() }}
  		</div>

  		<div class="col-sm-4">
    <div class="card">
    	<div class="card-header">
        <i class="fas fa-plus-circle"></i>
      Add brand
    </div>
    </div>
  <div>
    
      <form method="POST" action="{{ route('brand.store') }}">
          @csrf
          <div class="form-group">    
              <label for="brand_name">brand Name</label>
              <input type="text" class="form-control" name="brand_name"/>
          </div>
                                 
          <button type="submit" class="btn btn-primary">Save</button>
      </form>
  </div>
</div>
</div>
</div>
  		@endsection