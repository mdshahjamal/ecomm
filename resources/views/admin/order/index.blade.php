@extends('admin.admin_master')

  @section('orders') active  @endsection

  @section('admin_content')
  <div class="container">
  <div class="row justify-content-center mt-5">
  	<div class="col-sm-12">
  		<div class="card">
  			<div class="card-header">
          <i class="fas fa-table mr-1"></i>
        Order Lists
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
  					<th>Invoice No</th>
            <th>Payment Type</th>
            <th>Sub Total</th>
            <th>Total</th>
  					<th>Status</th>
  					<th colspan = 3>Actions</th>
  				</tr>
  			</thead>
        <tfoot>
              <tr>
                <th>ID</th>
                <th>Invoice No</th>
                <th>Payment Type</th>
                <th>Sub Total</th>
                <th>Total</th>
                <th>Status</th>
                <th colspan = 3>Actions</th>
              </tr>
            </tfoot>
  			<tbody>
  				@foreach($orders as $order)
  				<tr>
  					<td>{{$order->id}}</td>
  					<td>#{{$order->invoice_no}}</td>
            <td>{{$order->payment_type}}</td>
            <td>${{$order->subtotal}}</td>
            <td>${{$order->total}}</td>
  					<td>
  						@if($order->coupon_discount !== NULL)
  						<span class="badge badge-success">Yes</span>
  						@else
  						<span class="badge badge-danger">No</span>
  						@endif
  					</td>
  					<td>
  						<a href="{{ url('admin_orders/view',$order->id)}}" class="btn btn-outline-primary"><i class="fas fa-eye"></i></a>
  					</td>
            <td>
              <a href="{{ url('admin_orders/invoice',$order->id)}}" class="btn btn-outline-primary"><i class="fas fa-print"></i></a>
            </td>
            
  					
  				</tr>
  				@endforeach
  			</tbody>
  		</table>
  	{{-- 	{{ $orders->links() }} --}}
  		</div>

    </div>
  </div>
</div>
  		@endsection