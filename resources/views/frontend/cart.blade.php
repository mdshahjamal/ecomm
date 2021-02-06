@extends('frontend_master')

@section('content')

<section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend') }}/img/breadcrumb.jpg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="breadcrumb__text">
					<h2>Shopping Cart</h2>
					<div class="breadcrumb__option">
						<a href="{{ url('/') }}">Home</a>
						<span>Shopping Cart</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="shoping-cart spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">

				@if (session('dlt'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <span>{{ session('dlt') }}</span>
                  <button type="button" class="close" data-dismiss="alert" aria-label="close"><span>&times;</span></button>
                </div>
                @endif

                @if (session('msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                	<p>{{ session('msg') }}</p>
                	<button type="button" class="close" data-dismiss="alert" aria-label="close"><span>&times;</span></button>
                </div>
                @endif



				<div class="shoping__cart__table">
					<table>
						<thead>
							<tr>
								<th class="shoping__product">Products</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($carts as $cart)
								
							<tr>
								<td class="shoping__cart__item">
									<img src="{{ asset($cart->product->image_one) }}" style="height: 100px; width: 100px" alt="">
									

									<a href="{{ url('product/details/'.$cart->id) }}"><h5>{{ $cart->product->product_name }}</h5></a>


								</td>
								<td class="shoping__cart__price">
									${{ $cart->price}}
								</td>
								<td class="shoping__cart__quantity">
									<div class="quantity">
										<form action="{{ url('cart/quantity/update',$cart->id) }}" method="post">
											@csrf

										<div class="pro-qty">
											<input type="text" name="quantity" value="{{ $cart->quantity}}" min="1">
										</div>
										<button type="submit" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
					Upadate Cart</button>
										</form>
									</div>
								</td>
								<td class="shoping__cart__total">
									${{ $cart->price *  $cart->quantity}}
								</td>
								<td class="shoping__cart__item__close">
									
										<a href="{{ url('cart/destroy',$cart->id) }}"><span class="icon_close"></span></a>
									
								</td>
							</tr>
							
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
			{{-- <div class="col-lg-12">
				<div class="shoping__cart__btns">
					<button href="{{ url('/') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</button>
					
				</div>
			</div>
 --}}


			<div class="col-lg-6">
				@if(Session::has('coupon'))
				@else
				<div class="shoping__continue">
					<div class="shoping__discount">
						<h5>Discount Codes</h5>
						<form action="{{ url('admin_coupon/apply') }}" method="post">
							@csrf
							<input type="text" name="coupon_name" placeholder="Enter your coupon code">

							<button type="submit" class="site-btn">APPLY COUPON</button>
						</form>
					</div>
				</div>
				@endif
			</div>
			<div class="col-lg-6">
				<div class="shoping__checkout">
					<h5>Cart Total</h5>
					<ul>

						@if(Session::has('coupon'))
						<li>Subtotal <span>${{ $subtotal }}</span></li>
						<li>Coupon ({{ session()->get('coupon')['coupon_name'] }} )<span><a href="{{ url('coupon/destroy') }}">X</a></span></li>
						<li>Discount <span>{{ session()->get('coupon')['discount'] }}% (-{{$discount = $subtotal *session()->get('coupon')['discount'] / 100}})</span></li>
						<li>Total <span>${{ $subtotal - $discount }}</span></li>
						@else
						<li>Total <span>${{ $subtotal }}</span></li>
						@endif
					</ul>
					<a href="{{ url('checkout') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection