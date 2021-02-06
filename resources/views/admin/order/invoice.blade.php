@extends('admin.admin_master')

@section('admin_content')
<div class="container">
  <div class="row">
    <div class="col-12">

      <!-- Main content -->
      <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row">
          <div class="col-12">
            <h4>
              <i class="fa fa-globe"></i> Admin, Inc.
              <small class="float-right">Date: {{ $order->created_at }}</small>
            </h4>
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
            From
            <address>
              <strong>Admin, Inc.</strong><br>
              795 Folsom Ave, Suite 600<br>
              Chittagong, 4107<br>
              Phone: +8801921340146<br>
              Email: info@shahjamal.com
            </address>
          </div>
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">
            To
            <address>
              <strong>{{ $shipping->first_name }} </strong><br>
              {{ $shipping->address }}<br>
              {{ $shipping->state }}, {{ $shipping->post_code }}<br>
              Phone: {{ $shipping->phone }}<br>
              Email: {{ $shipping->email }}
            </address>
          </div>
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <b>Invoice #{{ $order->invoice_no }}</b><br>
            <br>
            <b>Order ID:</b> {{ $order->id }}<br>
            <b>Payment Due:</b> {{ $order->created_at }}
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
          <div class="col-12 table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Serial #</th>
                  <th>Product Image</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Subtotal</th>
                </tr>
              </thead>
              <tbody>
                @foreach($orderItems as $row)
                <tr>
                  <td></td>
                  <td><img src="{{ asset ($row->product->image_one)}}" width="75px;" height="75px;" alt=""></td>
                  <td>{{$row->product->product_name}}</td>
                  <td>{{$row->product_qty}}</td>
                  <td>${{$order->subtotal}}</td>

                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <!-- accepted payments column -->
          <div class="col-6">
            <p class="lead">Payment Methods:</p>
            <img src="https://adminlte.io/themes/dev/AdminLTE/dist/img/credit/visa.png" alt="Visa">
            <img src="https://adminlte.io/themes/dev/AdminLTE/dist/img/credit/mastercard.png" alt="Mastercard">
            <img src="https://adminlte.io/themes/dev/AdminLTE/dist/img/credit/american-express.png" alt="American Express">
            <img src="https://adminlte.io/themes/dev/AdminLTE/dist/img/credit/paypal2.png" alt="Paypal">
          </div>
          <!-- /.col -->
          <div class="col-6">
            <p class="lead">Amount Due {{$order->created_at}}</p>

            <div class="table-responsive">
              <table class="table">
                <tbody><tr>
                  <th style="width:50%">Subtotal:</th>
                  <td>${{$order->subtotal}}</td>
                </tr>
                <tr>
                  <th>Coupon ({{ $order->coupon_discount }}%)</th>
                  <td>- ${{ $order->subtotal * $order->coupon_discount / 100 }}</td>
                </tr>
                
                <tr>
                  <th>Total:</th>
                  <td>${{$order->total}}</td>
                </tr>
              </tbody></table>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
          <div class="col-12">

            <a href="" onclick="window.print()" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
            <button type="button" class="btn btn-success float-right">
              <i class="fa fa-credit-card"></i>
              Submit Payment
            </button>

            <button type="button" id="pdf" class="btn btn-primary float-right" style="margin-right: 5px;">
             <i class="fa fa-download"></i> Generate PDF
            </button>

          </div>
        </div>

      </div>
      <!-- /.invoice -->
    </div>


  </div>
</div>
<script>
  function printDocument(pdf) {
    var doc = document.getElementById(pdf);

    //Wait until PDF is ready to print    
    if (typeof doc.print === 'undefined') {    
        setTimeout(function(){printDocument(pdf);}, 1000);
    } else {
        doc.print();
    }
}
</script>

@endsection