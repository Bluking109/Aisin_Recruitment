<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>AIIA - @yield('title')</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="PT. Aisin Indonesia Automotive merupakan perusahaan yang bergerak di bidang manufaktur komponen otomotive">
		<meta name="keywords" content="Lowongan Kerja Karawang PT Aisin Indonesia Automotive {{ date('Y') }}">
		<meta name="author" content="PT. Aisin Indonesia Automotive">

		<link rel="shortcut icon" href="{{ asset('website/images/favicon.ico') }}" />

		<!-- Styles -->
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400,400i,600,600i,700,700i,800,800i|Quicksand:300,400,500,700">
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
					{{-- <a href="#" title="">Lupa Password?</a> --}}
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
		@else
		{{-- Validasi jika login --}}
		<div class="account-popup-area change-password-popup-box" id="modal-change-password">
			<div class="account-popup">
				<span class="close-popup"><i class="la la-close"></i></span>
				<h3>Ganti Password</h3>
				<form>
					<div class="cfield">
						<input type="password" placeholder="Password Lama" />
						<i class="fa fa-unlock-alt"></i>
					</div>
					<div class="cfield">
						<input type="password" placeholder="Password Baru" />
						<i class="fa fa-unlock-alt"></i>
					</div>
					<div class="cfield">
						<input type="password" placeholder="Konfirmasi Password Baru" />
						<i class="fa fa-unlock-alt"></i>
					</div>
					<button type="submit">Submit</button>
				</form>
			</div>
		</div><!-- CHANGE PASSWORD POPUP -->
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

				console.log('%c ITD Department is Hiring Now', 'font-weight: bold; font-size: 20px; color: #0066ff;');
				console.log('%c Daripada coba-coba inspect element mending gabung dengan kami :)', 'font-size: 20px; color: #1c1c1c;');
			});
		</script>

		@if(!auth()->guard('job_seekers')->check())
		<script src="{{ asset('website/js/dynamic_page/login-register.min.js') }}" type="text/javascript"></script>
		@endif
		@stack('additional_js')
	</body>
</html>

