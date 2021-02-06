@extends('admin.admin_master')

  @section('product') active  @endsection
  @section('manage') active  @endsection

  @section('admin_content')
  <div class="container">
  <div class="row justify-content-center mt-5">
  	<div class="col-sm-12">
  		<div class="card">
  			<div class="card-header">
          <i class="fas fa-table mr-1"></i>
        Manage Products
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
  					<th>Image</th>
  					<th>Product Name</th>
            <th>Product Quantity</th>
            <th>Category</th>
  					<th>Status</th>
  					<th colspan = 3>Actions</th>
  				</tr>
  			</thead>
        <tfoot>
            <tr>
              <th>Image</th>
              <th>Product Name</th>
              <th>Product Quantity</th>
              <th>Category</th>
              <th>Status</th>
              <th colspan = 3>Actions</th>
            </tr>
            </tfoot>
  			<tbody>
  				@foreach($products as $product)
  				<tr>
  					<td><img src="{{ asset ($product->image_one)}}" width="50px;" height="50px;" alt=""></td>
            <td>{{$product->product_name}}</td>
  					<td>{{$product->product_quantity}}</td>
            <td>{{$product->category->category_name}}</td>
  					<td>
  						@if($product->status == 1)
  						<span class="badge badge-success">Active</span>
  						@else
  						<span class="badge badge-danger">Inactive</span>
  						@endif
  					</td>
  					<td>
  						<a href="{{ url('admin_product/edit',$product->id)}}" class="btn btn-outline-primary"><i class="fas fa-pencil-alt"></i></a>
  					</td>
            <td>
              <form action="{{ url('admin_product/delete', $product->id) }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are You Sure TO DELETE?')"><i class="fa fa-trash"></i></button>
              </form>
            </td>
            @if($product->status == 1)
            <td>
              <a href="{{ url('admin_product/inactive',$product->id)}}" class="btn btn-danger"><i class="fa fa-arrow-down"></i></i></a>
            </td>
            @else
            <td>
              <a href="{{ url('admin_product/active',$product->id)}}" class="btn btn-primary"><i class="fa fa-arrow-up"></i></i></a>
            </td>
            @endif
  					
  				</tr>
  				@endforeach
  			</tbody>
  		</table>
  		{{ $products->links() }}
  		</div>
  </div>
</div>
</div>
</div>
  		@endsection