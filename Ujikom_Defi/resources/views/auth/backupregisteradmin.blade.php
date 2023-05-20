@extends('auth.layouts.template')

@section('content')
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
					@csrf
					<span class="login100-form-title p-b-25">
						<img src="{{ asset('frontend/logo/library.png') }}" alt="logo" width="120px">
					</span>
					<span class="login100-form-title p-b-15">
						Register
					</span>
					<br>
					

					{{-- Flash Alert --}}
					@if ($message = Session::get('error'))
					<div class="alert alert-danger alert-block">
						{{-- <button type="button" class="close" data-dismiss="alert">×</button>	 --}}
						{{ $message }}
					</div>
					@endif

					{{-- Name --}}
					<div class="wrap-input100 validate-input" data-validate="Enter name">
						<input id="name" type="text" class="input100 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
						
						@error('name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror

						<span class="focus-input100" data-placeholder="Nama Lengkap"></span>
					</div>

					{{-- Email --}}
					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

						@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror

						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					{{-- Password --}}
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						
						<input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

						@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror

						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					{{-- Konfirm Password --}}
					<div class="wrap-input100 validate-input" data-validate="Enter confirm password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						
						<input id="password-confirm" type="password" class="input100" name="password_confirmation" required autocomplete="new-password">

						<span class="focus-input100" data-placeholder="Confirm Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit">
								{{ __('Register') }}
							</button>
						</div>
					</div>

					<div class="text-center p-t-40">
						<span class="txt1">
							Already have an account?
						</span>

						<a class="btn btn-link" href="{{ route('login') }}">
							Sign In
						</a>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
@endsection