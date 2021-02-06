@extends('frontend_master')

@section('content')
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend') }}/img/breadcrumb.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="breadcrumb__text">
          <h2>My Order Details</h2>
          <div class="breadcrumb__option">
            <a href="{{ url('/') }}">Home</a>
            <span>My Order Details</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="container">
  <div class="row justify-content-center mt-5">

      @include('frontend.profile.inc.sidebar')


    <div class="col-sm-8">
      <div class="card">
        <div class="card-header">
          <i class="fas fa-table mr-1"></i>
          Order Items
        </div>
      </div>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Invoice No.</th>
            <th>Payment Type</th>
            <th>Sub Total</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>#{{ $order->invoice_no }}</td>
            <td>{{ $order->payment_type }}</td>
            <td>{{ $order->subtotal }}$</td>
            <td>{{ $order->total }}$</td>
        </tbody>
      </table>

      <div class="card">
        <div class="card-header">
          <i class="fas fa-table mr-1"></i>
          Shipping Details
        </div>
      </div>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>State</th>
            <th>Post Code</th>         
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $shipping->first_name }}</td>
            <td>{{ $shipping->last_name }}</td>
            <td>{{ $shipping->email }}</td>
            <td>{{ $shipping->phone }}</td>
            <td>{{ $shipping->address }}</td>
            <td>{{ $shipping->state }}</td>
            <td>{{ $shipping->post_code }}</td>
        </tbody>
      </table>

      <div class="card">
        <div class="card-header">
          <i class="fas fa-table mr-1"></i>
          Order Item Details
        </div>
      </div>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Product Code</th>         
            <th>Product Quantity</th>         
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Product Code</th>         
            <th>Product Quantity</th>       
          </tr>
        </tfoot>
        <tbody>
          @foreach ($orderItems as $item)
          <tr>
            <td><img src="{{ asset($item->product->image_one) }}" alt="" height="75px" width="75px"></td>
            <td>{{ $item->product->product_name }}</td>
            <td>{{ $item->product->product_code }}</td>
            <td>{{ $item->product->product_quantity }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>  
</div>
@endsection
