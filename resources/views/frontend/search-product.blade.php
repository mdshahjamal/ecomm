@extends('frontend_master')

@section('content')

<section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend') }}/img/breadcrumb.jpg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="breadcrumb__text">
					<h2>Searched Products</h2>
					<div class="breadcrumb__option">
						<a href="{{ url('/') }}">Home</a>
						<span>Searched Products</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Product Section Begin -->
<section class="product spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
						
						<h4 class="active">You Are Search for <strong>'{{$search}}'</strong>&nbsp;&nbsp;<i class=" badge badge-info">{{count($searchProducts)}}&nbsp;result found!! </i></h4>

			</div>

@foreach ($searchProducts as $pg)
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="product__item">
					<div class="product__item__pic set-bg" data-setbg="{{ asset($pg->image_one) }}">
						<ul class="product__item__pic__hover">
							<li><a href="{{ url('add/to-wishlist/'.$pg->id) }}"><i class="fa fa-heart"></i></a></li>
							<li><a href="#"><i class="fa fa-retweet"></i></a></li>
							<form action="{{ url('add/to-cart/'.$pg->id) }}" method="post">
								@csrf
								<input type="hidden" name="price" value="{{ $pg->price }}">
								<li><button type="submit"><i class="fa fa-shopping-cart"></i></button></li> 
							</form>
						</ul>
					</div>
					<div class="product__item__text">
						<h6><a href="#">{{ $pg->product_name }}</a></h6>
						<h5>${{ $pg->price }}</h5>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		{{ $searchProducts->links() }}

</div>
</div>
</section>
<!-- Product Section End -->
@endsection