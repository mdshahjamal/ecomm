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
        <form class="form-horizontal">
            <div class="card-body">
             {{--  <h4 class="card-title">Personal Info</h4> --}}
              <div class="form-group row">
                <label for="first_name" class="col-sm-3 text-right control-label col-form-label">First Name</label>
                <div class="col-sm-9">
                  <input type="text" name="first_name" value="{{ Auth::user()->name }}" readonly class="form-control" id="first_name" placeholder="First Name Here">
              </div>
          </div>
         {{--  <div class="form-group row">
            <label for="last_name" class="col-sm-3 text-right control-label col-form-label">Last Name</label>
            <div class="col-sm-9">
              <input type="text" name="last_name" value="{{ $shipping->last_name }}" readonly class="form-control" id="last_name" placeholder="Last Name Here">
          </div>
      </div> --}}
      <div class="form-group row">
        <label for="email" class="col-sm-3 text-right control-label col-form-label">Email</label>
        <div class="col-sm-9">
          <input type="email" name="email" value="{{ Auth::user()->email }}" readonly class="form-control" id="email" placeholder="email Here">
      </div>
  </div>

  {{-- <div class="form-group row">
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
</div> --}}

</div>
</form>
</div>

</div>

</div>
</div>
@endsection
