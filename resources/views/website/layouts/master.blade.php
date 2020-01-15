<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>AIIA - @yield('title')</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="PT. Aisin Indonesia Automotive merupakan perusahaan yang bergerak di bidang manufaktur komponen otomotive">
		<meta name="keywords" content="Lowongan Kerja Karawang PT Aisin Indonesia Automotive {{ date('Y') }}">
		<meta name="author" content="PT. Aisin Indonesia Automotive">
		{{-- Google Tag --}}
		<meta name="google-site-verification" content="1yUO5_rFMFclFBDAYtTLsAxfKPm-E64k1V7vaqyZa9o" />

		<link rel="shortcut icon" href="{{ asset('website/images/favicon.ico') }}" />

		<!-- Styles -->
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400|Quicksand:700">
		<link rel="stylesheet" type="text/css" href="{{ asset('website/css/all.css') }}" />
		@stack('additional_css')
	</head>
	<body class="primary-bg">
		<div class="page-loading">
			<img src="{{ asset('website/images/loader.gif') }}" alt="" />
		</div>

		<div class="theme-layout" id="scrollup">
			@include('website.includes.responsive_header')
			@include('website.includes.header')

			@yield('pages')

			@include('website.includes.footer')
		</div>
		@if(!auth()->guard('job_seekers')->check())
		<div class="account-popup-area signin-popup-box" id="modal-login">
			<div class="account-popup">
				<span class="close-popup"><i class="la la-close"></i></span>
				<h3 id="login-title">Login</h3>
				<form action="{{ route('auth.login.post') }}" method="POST" id="form-login">
					@csrf
					<input type="hidden" name="recaptcha_key" id="login-recaptcha-key">
					<div class="cfield">
						<input type="text" placeholder="Email" name="email" />
						<i class="fa fa-at"></i>
					</div>
					<div class="cfield">
						<input type="password" placeholder="Password" name="password" />
						<i class="fa fa-unlock-alt"></i>
					</div>
					<p class="remember-label">
						<input type="checkbox" name="remember" id="cb1"><label for="cb1">Remember me</label>
					</p>
					<a href="#" title="" id="forget-password">Lupa Password?</a>
					<button class="submit-button" type="submit"><span class="submit-text">Login</span><i class="fa fa-circle-o-notch fa-spin fa-fw loading"></i></button>
				</form>
				<div class="term-login">
					<p class="google-term">This site is protected by reCAPTCHA and the Google
				    <a href="https://policies.google.com/privacy">Privacy Policy</a> and
				    <a href="https://policies.google.com/terms">Terms of Service</a> apply.
					</p>
				</div>
			</div>
		</div><!-- LOGIN POPUP -->
		<div class="account-popup-area" id="modal-register">
			<div class="account-popup">
				<span class="close-popup"><i class="la la-close"></i></span>
				<h3 id="register-title">Daftar</h3>
				<form action="{{ route('auth.register.post') }}" method="POST" id="form-register">
					@csrf
					<input type="hidden" name="recaptcha_key" id="register-recaptcha-key">
					<div class="cfield">
						<input type="text" placeholder="Nama sesuai KTP" name="name" />
						<i class="fa fa-user"></i>
					</div>
					<div class="cfield">
						<input type="text" placeholder="Email" name="email" />
						<i class="fa fa-at"></i>
					</div>
					<div class="cfield">
						<input type="password" placeholder="Password" name="password" />
						<i class="fa fa-unlock-alt"></i>
					</div>
					<div class="cfield">
						<input type="password" placeholder="Konfirmasi Password" name="password_confirmation" />
						<i class="fa fa-unlock-alt"></i>
					</div>
					<div class="cfield">
						<input type="text" placeholder="Nomer HP" name="handphone_number" class="phone-number" />
						<i class="fa fa-mobile-phone"></i>
					</div>
					<div class="dropdown-field">
						<select class="chosen" id="education-select" name="education_level_id">

						</select>
					</div>
					<button type="submit" class="submit-button"><span class="submit-text">Daftar</span> <i class="fa fa-circle-o-notch fa-spin fa-fw loading"></i></button>
				</form>
				<div class="term-register">
					<p class="google-term">This site is protected by reCAPTCHA and the Google
				    <a href="https://policies.google.com/privacy">Privacy Policy</a> and
				    <a href="https://policies.google.com/terms">Terms of Service</a> apply.
					</p>
				</div>
			</div>
		</div><!-- SIGNUP POPUP -->
		<div class="account-popup-area reset-password-popup" id="modal-reset-password">
			<div class="account-popup">
				<span class="close-popup"><i class="la la-close"></i></span>
				<h3 id="reset-title">Reset Password</h3>
				<form action="{{ route('password.email') }}" method="post" id="form-reset-password">
					@csrf
					<div class="cfield">
						<input type="text" placeholder="Email" name="email" />
						<i class="fa fa-at"></i>
					</div>
					<button class="submit-button" type="submit"><span class="submit-text">Reset</span><i class="fa fa-circle-o-notch fa-spin fa-fw loading"></i></button>
				</form>
			</div>
		</div> {{-- Reset Password Pop up --}}
		@endif
		@if(auth()->guard('job_seekers')->check() || session()->has('reset_password'))
		{{-- Validasi jika login --}}
		{{-- Change Password Popup --}}
		<div class="account-popup-area change-password-popup-box" @if(session()->has('reset_password')) id="modal-change-password-reset" @else id="modal-change-password" @endif>
			<div class="account-popup">
				<span class="close-popup"><i class="la la-close"></i></span>
				<h3 id="change-password-title">Ganti Password</h3>
				<form  @if(session()->has('reset_password')) id="form-change-password-reset" action="{{ route('password.update') }}" method="post" @else action="{{ route('password.change') }}" method="post" id="form-change-password" @endif>
					@csrf
					@if(session()->has('reset_password'))
					<input type="hidden" name="token" value="{{ session()->get('token') }}">
					<input type="hidden" class="form-control form-control-lg border-left-0" id="email" value="{{ session()->get('email') }}" name="email">
					@else
					@method('put')
					<div class="cfield">
						<input type="password" placeholder="Password Lama" name="old_password" />
						<i class="fa fa-unlock-alt"></i>
					</div>
					@endif
					<div class="cfield">
						<input type="password" name="password" placeholder="Password Baru" />
						<i class="fa fa-unlock-alt"></i>
					</div>
					<div class="cfield">
						<input type="password" placeholder="Konfirmasi Password Baru" name="password_confirmation" />
						<i class="fa fa-unlock-alt"></i>
					</div>
					<button class="submit-button" type="submit"><span class="submit-text">Submit</span><i class="fa fa-circle-o-notch fa-spin fa-fw loading"></i></button>
				</form>
			</div>
		</div>
		@endif

		@if(auth()->guard('job_seekers')->check())
		@include('website.includes.profile_sidebar')
		@endif

		<script src="{{ asset('website/js/all.js') }}" type="text/javascript"></script>
		<script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>

		<script type="text/javascript">
			let siteKey = "{{ env('RECAPTCHA_SITE_KEY') }}";

			$(function() {
				cleaveJsInit();
				// console.log('%c ITD Department is Hiring Now', 'font-weight: bold; font-size: 20px; color: #0066ff;');
				// console.log('%c Daripada coba-coba inspect element mending gabung dengan kami :)', 'font-size: 20px; color: #1c1c1c;');
			});
		</script>

		@if(!auth()->guard('job_seekers')->check())
		<script src="{{ asset('website/js/dynamic_page/login-register.min.js') }}" type="text/javascript"></script>
		@else
		<script src="{{ asset('website/js/dynamic_page/change-password.min.js') }}" type="text/javascript"></script>
		@endif
		@stack('additional_js')
	</body>
</html>

