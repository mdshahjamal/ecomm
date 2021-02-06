@extends('frontend_master')


@section('content')

<section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend') }}/img/breadcrumb.jpg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="breadcrumb__text">
					<h2>Checkout</h2>
					<div class="breadcrumb__option">
						<a href="{{ url('/') }}">Home</a>
						<span>Checkout</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="checkout spad">
	<div class="container">
		<div class="checkout__form">
			<h4>Billing Details</h4>
			<form action="{{ route('place_order') }}" method="post">
				@csrf
				<div class="row">
					<div class="col-lg-8 col-md-6">
						<div class="row">
							<div class="col-lg-6">
								<div class="checkout__input">
									<p>Fist Name<span>*</span></p>
									<input type="text" name="first_name" value="{{ Auth::user()->name }}">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="checkout__input">
									<p>Last Name<span>*</span></p>
									<input type="text" name="last_name">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="checkout__input">
									<p>Phone<span>*</span></p>
									<input type="text" name="phone">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="checkout__input">
									<p>Email<span>*</span></p>
									<input type="text" name="email" value="{{ Auth::user()->email }}">
								</div>
							</div>
						</div>
						<div class="checkout__input">
							<p>Address<span>*</span></p>
							<input type="text" placeholder="Street Address" class="checkout__input__add" name="address">
						</div>
						
						<div class="checkout__input">
							<p>Country/State<span>*</span></p>
							<input type="text" name="state">
						</div>
						<div class="checkout__input">
							<p>Postcode / ZIP<span>*</span></p>
							<input type="text" name="post_code">
						</div>
						
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="checkout__order">
							<h4>Your Order</h4>
							<div class="checkout__order__products">Products <span>Total</span></div>
							<ul>
								@foreach ($carts as $cart)
								<li>{{ $cart->product->product_name}} ({{ $cart->quantity }})<span>{{ $cart->price *  $cart->quantity }}</span></li>
								@endforeach
							</ul>
							

							<div class="checkout__order__subtotal">Subtotal <span>${{ $subtotal }}</span></div>
														

							@if(Session::has('coupon'))
							<div class="checkout__order__total">Total <span>${{ $subtotal - ($subtotal *session()->get('coupon')['discount'] / 100) }}</span></div>

							<input type="hidden" name="coupon_discount" value="{{ session()->get('coupon')['discount'] }}">
							<input type="hidden" name="subtotal" value="{{ $subtotal }}">
							<input type="hidden" name="total" value="{{ $subtotal - $subtotal *session()->get('coupon')['discount'] / 100 }}">

							@else
							<input type="hidden" name="total" value="{{ $subtotal }}">
							<div class="checkout__order__subtotal">Total <span>${{ $subtotal }}</span></div>
							@endif

							<div class="checkout__input__checkbox">
								<label for="payment">
									Cash On Delivery
									<input type="checkbox" id="payment" value="Handcash" name="payment_type">
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="checkout__input__checkbox">
								<label for="paypal">
									Paypal
									<input type="checkbox" id="paypal" value="paypal" name="payment_type">
									<span class="checkmark"></span>
								</label>
							</div>
							<button type="submit" class="site-btn">PLACE ORDER</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection