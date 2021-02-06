@extends('frontend_master')

@section('content')
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend') }}/img/breadcrumb.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="breadcrumb__text">
          <h2>My Profile</h2>
          <div class="breadcrumb__option">
            <a href="{{ url('/') }}">Home</a>
            <span>My Profile</span>
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
            <th>Date & Time</th>
            <th>Payment Type</th>
            <th>Sub Total</th>
            <th>Total</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Invoice No.</th>
            <th>Date & Time</th>
            <th>Payment Type</th>
            <th>Sub Total</th>
            <th>Total</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
          @foreach($orders as $item)
          <tr>
            <td>#{{ $item->invoice_no }}</td>
            <td>{{ $item->created_at }}</td>
            <td>{{ $item->payment_type }}</td>
            <td>{{ $item->subtotal }}$</td>            
            <td>{{ $item->total }}$</td>            
            <td><a href="{{ url('user/order-view/'.$item->id) }}" class="btn btn-primary btn-sm"> View</a></td>            
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
</div>
@endsection
