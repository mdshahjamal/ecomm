@extends('frontend_master')

@section('content')

<section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend') }}/img/breadcrumb.jpg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="breadcrumb__text">
					<h2>My WishList</h2>
					<div class="breadcrumb__option">
						<a href="{{ url('/') }}">Home</a>
						<span>My WishList</span>
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
								<th>Cart</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($wishlists as $wishlist)
								
							<tr>
								<td class="shoping__wishlist__item">
									<img src="{{ asset($wishlist->product->image_one) }}" style="height: 100px; width: 100px" alt="">
									<h5>Vegetable’s Package</h5>
								</td>
								<td class="shoping__wishlist__price">
									${{ $wishlist->product->price}}
								</td>
								<td class="shoping__wishlist__price">
									<form action="{{ url('add/to-cart/'.$wishlist->product_id) }}" method="post">
								@csrf
								<input type="hidden" name="price" value="{{ $wishlist->product->price }}">
									<button class="btn btn-sm btn-danger">Add To Cart</button>
								</form>
								</td>
								
								<td class="shoping__wishlist__item__close">
									
										<a href="{{ url('wishlist/destroy',$wishlist->id) }}"><span class="icon_close"></span></a>
									
								</td>
							</tr>
							
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection