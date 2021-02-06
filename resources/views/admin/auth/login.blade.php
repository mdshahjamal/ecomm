@extends('admin.admin_master')

@section('admin_content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">{{ __('Admin Login') }}</h3></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.login') }}">
                        @csrf
                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">{{ __('E-Mail Address') }}</label>
                                <input class="form-control py-4 @error('email') is-invalid @enderror" id="inputEmailAddress" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter email address" />

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="inputPassword">{{ __('Password') }}</label>
                                <input class="form-control py-4 @error('password') is-invalid @enderror" id="inputPassword" name="password" required autocomplete="current-password" type="password" placeholder="Enter password" />

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="rememberPasswordCheck">{{ __('Remember Me') }}</label>
                                </div>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                @if (Route::has('password.request'))
                                <a class="small" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                @endif
                                <button class="btn btn-primary" type="submit">{{ __('Login') }}</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <div class="small"><a href="{{ route('register') }}">Need an account? Sign up!</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection

