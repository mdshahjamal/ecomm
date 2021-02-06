@extends('admin.admin_master')

  @section('coupon') active  @endsection

  @section('admin_content')
  <div class="container">
  <div class="row justify-content-center mt-5">
  	<div class="col-sm-8">
  		<div class="card">
  			<div class="card-header">
          <i class="fas fa-table mr-1"></i>
        Coupon Lists
      </div>
  		</div>  
 
  			@if (session('msg'))
  			<div class="alert alert-success">
  				<span>{{ session('msg') }}</span>
          <button type="button" class="close" data-dismiss="alert" aria-label="close"><span>&times;</span></button>
  			</div>
  			@endif
        
        @if (session('dlt'))
                <div class="alert alert-danger">
                  <span>{{ session('dlt') }}</span>
                  <button type="button" class="close" data-dismiss="alert" aria-label="close"><span>&times;</span></button>
                </div>
                @endif

  		<table class="table table-striped table-bordered">
  			<thead>
  				<tr>
  					<th>ID</th>
  					<th>Coupon Name</th>
            <th>Coupon Discount</th>
  					<th>Status</th>
  					<th colspan = 3>Actions</th>
  				</tr>
  			</thead>
        <tfoot>
              <tr>
                <th>ID</th>
                <th>Coupon Name</th>
                <th>Coupon Discount</th>
                <th>Status</th>
                <th colspan = 3>Actions</th>
              </tr>
            </tfoot>
  			<tbody>
  				@foreach($coupons as $coupon)
  				<tr>
  					<td>{{$coupon->id}}</td>
  					<td>{{$coupon->coupon_name}}</td>
            <td>{{$coupon->discount}}%</td>
  					<td>
  						@if($coupon->status == 1)
  						<span class="badge badge-success">Active</span>
  						@else
  						<span class="badge badge-danger">Inactive</span>
  						@endif
  					</td>
  					<td>
  						<a href="{{ url('admin_coupon/edit',$coupon->id)}}" class="btn btn-outline-primary"><i class="fas fa-pencil-alt"></i></a>
  					</td>
            <td>
              <form action="{{ url('admin_coupon/delete', $coupon->id) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-outline-danger" onclick=""><i class="fa fa-trash"></i></button>
              </form>
            </td>
            @if($coupon->status == 1)
            <td>
              <a href="{{ url('admin_coupon/inactive',$coupon->id)}}" class="btn btn-danger"><i class="fa fa-arrow-down"></i></i></a>
            </td>
            @else
            <td>
              <a href="{{ url('admin_coupon/active',$coupon->id)}}" class="btn btn-primary"><i class="fa fa-arrow-up"></i></i></a>
            </td>
            @endif
  					
  				</tr>
  				@endforeach
  			</tbody>
  		</table>
  	{{-- 	{{ $coupons->links() }} --}}
  		</div>

  		<div class="col-sm-4">
    <div class="card">
    	<div class="card-header">
        <i class="fas fa-plus-circle"></i>
      Add Coupon
    </div>
    </div>
  <div>
    
      <form method="POST" action="{{ route('coupon.store') }}">
          @csrf
          <div class="form-group">    
              <label for="coupon_name">Coupon Name</label>
              <input type="text" class="form-control" name="coupon_name"/>
          </div>
          <div class="form-group">    
              <label for="discount">Coupon Discount</label>
              <input type="text" class="form-control" name="discount"/>
          </div>
          
                                 
          <button type="submit" class="btn btn-primary">Save</button>
      </form>
  </div>
</div>
</div>
</div>
  		@endsection