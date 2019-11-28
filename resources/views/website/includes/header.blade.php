@php
$url = url()->current();
@endphp
<header class="stick-top forsticky new-header">
	<div class="menu-sec">
		<div class="container">
			<div class="logo">
				<a href="index.html"><img class="showsticky primary-logo" src="{{ asset('website/images/logo/aiia-logo.png') }}" alt="" /></a>
			</div><!-- Logo -->
			{{-- Jika user login --}}
			@if(auth()->guard('job_seekers')->check())
			<div class="my-profiles-sec">
				<span><img src="{{ auth()->guard('job_seekers')->user()->photo ? route('profiles.personal-identity.getphoto') : asset('website/images/avatar/avatar.png') }}" class="profile-img" alt="" /> {{ auth()->guard('job_seekers')->user()->name }} <i class="la la-bars"></i></span>
			</div>
			@else
			<div class="btn-extars">
				<ul class="account-btns">
					<li class="signup-popup"><a href="#"><b><i class="fa fa-user"></i> Daftar</b></a></li>
					<li class="signin-popup"><a href="#"><b><i class="fa fa-sign-in"></i> Login</b></a></li>
				</ul>
			</div><!-- Btn Extras -->
			@endif
			<nav>
				<ul>
					<li class="menu-item @if($url == url('/') || $url == route('home')) active @endif">
						<a href="{{ route('home') }}" title="">Beranda</a>
					</li>
					<li class="menu-item @if($url == route('job-vacancies.index')) active @endif">
						<a href="{{ route('job-vacancies.index') }}" title="">Lowongan</a>
					</li>
					<li class="menu-item @if($url == route('contact.index')) active @endif">
						<a href="{{ route('contact.index') }}" title="">Kontak Kami</a>
					</li>
				</ul>
			</nav><!-- Menus -->
		</div>
	</div>
</header>