@extends('auth.layouts.template')

@section('content')
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
					@csrf
					<span class="login100-form-title p-b-25">
						{{-- <i class="zmdi zmdi-font"></i> --}}
						<img src="{{ asset('frontend/logo/library.png') }}" alt="logo" width="120px">
					</span>
					<span class="login100-form-title p-b-15">
						Login
					</span>
					

					{{-- Flash Alert --}}
					@if ($message = Session::get('error'))
					<div class="alert alert-danger alert-block">
						{{-- <button type="button" class="close" data-dismiss="alert">×</button>	 --}}
						{{ $message }}
					</div>
					@endif

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit">
								{{ __('Login') }}
							</button>
						</div>
					</div>

					<div class="text-center p-t-40">
						<span class="txt1">
							Don’t have an account?
						</span>

						<a class="btn btn-link" href="{{ route('register') }}">
							Sign Up
						</a>
					</div>

					{{-- <div class="text-center p-t-15">
						<span class="txt1">
							@if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
						</span>

						{{-- <a class="txt2" href="#">
							Sign Up
						</a> --}}
					{{-- </div> --}}
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
@endsection