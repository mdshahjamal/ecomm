@extends('admin.admin_master')

@section('admin_content')
<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-sm-8 justify-content-center">
      <div class="card">
        <div class="card-header">Edit Coupon</div>
      </div>  
    <form action="{{ route('coupon.update', $coupons->id)}}" method="post">
      @csrf
      <table class="table table-striped">
       <thead>
        <tr>

         <td>Coupon Name</td>
       </tr>
     </thead>
     <tbody>
      <tr>
       <input type="text" name="coupon_name" value="{{$coupons->coupon_name}}">

     </tr>
   </tbody>
   <button type="submit" class="btn btn-primary">Update</button>
 </table>
</form>
</div>

@endsection