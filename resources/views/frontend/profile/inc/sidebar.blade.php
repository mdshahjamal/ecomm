<div class="col-lg-4 col-md-6">
	<div class="checkout__order">
		<h4>My Orders</h4>
		<a href="{{ route('home') }}"><button type="submit" class="site-btn btn-primary">Home</button></a>
		<a href="{{ route('user.order') }}"><button type="submit" class="site-btn btn-secondary">My Orders</button></a>
		<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
			<button type="submit" class="site-btn btn-danger">{{ __('Logout') }}</button>
		</a>

		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			@csrf
		</form>
	</div>
</div>