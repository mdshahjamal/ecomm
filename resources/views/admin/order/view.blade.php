@extends('admin.admin_master')

@section('orders') active  @endsection

@section('admin_content')

<div class="cointainer">
  <div class="row">
    <div class="col-md-12">
    <div class="card">
      <form class="form-horizontal">
        <div class="card-body">
          <h4 class="card-title">Shipping Info</h4>
          <div class="form-group row">
            <label for="first_name" class="col-sm-3 text-right control-label col-form-label">First Name</label>
            <div class="col-sm-9">
              <input type="text" name="first_name" value="{{ $shipping->first_name }}" readonly class="form-control" id="first_name" placeholder="First Name Here">
            </div>
          </div>
          <div class="form-group row">
            <label for="last_name" class="col-sm-3 text-right control-label col-form-label">Last Name</label>
            <div class="col-sm-9">
              <input type="text" name="last_name" value="{{ $shipping->last_name }}" readonly class="form-control" id="last_name" placeholder="Last Name Here">
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-3 text-right control-label col-form-label">Email</label>
            <div class="col-sm-9">
              <input type="email" name="email" value="{{ $shipping->email }}" readonly class="form-control" id="email" placeholder="email Here">
            </div>
          </div>

          <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Contact No</label>
            <div class="col-sm-9">
              <input type="text" name="phone" value="{{ $shipping->phone }}" readonly class="form-control" id="cono1" placeholder="Contact No Here">
            </div>
          </div>
          <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Address</label>
            <div class="col-sm-9">
              <input type="text" name="address" value="{{ $shipping->address }}" readonly class="form-control" id="cono1" placeholder="Contact No Here">
            </div>
          </div>
          <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">State</label>
            <div class="col-sm-9">
              <input type="text" name="state" value="{{ $shipping->state }}" readonly class="form-control" id="cono1" placeholder="Contact No Here">
            </div>
          </div>
          <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Post Code</label>
            <div class="col-sm-9">
              <input type="text" name="post_code" value="{{ $shipping->post_code }}" readonly class="form-control" id="cono1" placeholder="Contact No Here">
            </div>
          </div>
          
        </div>
      </form>
    </div>

  </div>
  <div class="col-md-6">
    <div class="card">
      <form class="form-horizontal">
        <div class="card-body">
          <h4 class="card-title">Orders</h4>
          <div class="form-group row">
            <label for="invoice_no" class="col-sm-3 text-right control-label col-form-label">Invoice NO:</label>
            <div class="col-sm-9">
              <input type="text" name="invoice_no" value="#{{ $order->invoice_no }}" readonly class="form-control" id="invoice_no" placeholder="First Name Here">
            </div>
          </div>
          <div class="form-group row">
            <label for="payment_type" class="col-sm-3 text-right control-label col-form-label">Payment Type:</label>
            <div class="col-sm-9">
              <input type="text" name="payment_type" value="{{ $order->payment_type }}" readonly class="form-control" id="payment_type" placeholder="Last Name Here">
            </div>
          </div>
          <div class="form-group row">
            <label for="sub_total" class="col-sm-3 text-right control-label col-form-label">Sub Total</label>
            <div class="col-sm-9">
              <input type="text" name="subtotal" value="{{ $order->subtotal }}$" readonly class="form-control" id="subtotal" placeholder="email Here">
            </div>
          </div>
          <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Coupon Discount</label>
            <div class="col-sm-9">
              @if($order->coupon_discount !== NULL)
              <span class="badge badge-success">{{ $order->coupon_discount }}%</span>
              @else
              <span class="badge badge-danger">No</span>
              @endif
        </div>
      </div>
          <div class="form-group row">
            <label for="cono1" class="col-sm-3 text-right control-label col-form-label">Total</label>
            <div class="col-sm-9">
              <input type="text" name="phone" value="{{ $order->total }}$" readonly class="form-control" id="cono1" >
            </div>
          </div>
        </div>
      </form>
    </div>

  </div>
  


  {{-- <div class="container">
  <div class="row justify-content-center mt-5"> --}}
    <div class="col-sm-6">
      <div class="card">
        <div class="card-header">
          <i class="fas fa-table mr-1"></i>
        Order Items
      </div>
      </div>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Image</th>
            <th>Product Name</th>
            <th>Product Quantity</th>
          </tr>
        </thead>
        <tfoot>
            <tr>
              <th>Image</th>
              <th>Product Name</th>
              <th>Product Quantity</th>
            </tr>
            </tfoot>
        <tbody>
          @foreach($orderItems as $row)
          <tr>
            <td><img src="{{ asset ($row->product->image_one)}}" width="75px;" height="75px;" alt=""></td>
            <td>{{$row->product->product_name}}</td>
            <td>{{$row->product_qty}}</td>            
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
  </div>
</div>
  </div>
  </div>
</div>
@endsection