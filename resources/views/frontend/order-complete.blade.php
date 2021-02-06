@extends('frontend_master')


@section('content')

<section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend') }}/img/breadcrumb.jpg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<div class="breadcrumb__text">
					<h2>Order Done</h2>
					<div class="breadcrumb__option">
						<a href="{{ url('/') }}">Home</a>
						<span>Order Done</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="checkout spad">
	<div class="container">
		
		<h3>
			@if(session('orderComplete'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>
					{{session('orderComplete')}}
					<button type="button" class="close">
						<span aria-hidden="true">
							{{-- &times; --}}
						</span>
					</button>
				</strong>
			</div>
			@endif
		</h3>
		</div>
	</div>
</section>
@endsection