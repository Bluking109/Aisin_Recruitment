@php
$url = url()->current();
@endphp
<header class="stick-top forsticky new-header">
	<div class="menu-sec">
		<div class="container">
			<div class="logo">
				<a href="index.html"><img class="showsticky primary-logo" src="{{ asset('website/images/logo/aiia-logo.png') }}" alt="" /></a>
			</div><!-- Logo -->
			<div class="my-profiles-sec">
				<span><img src="http://placehold.it/50x50" alt="" /> M Ali Usman <i class="la la-bars"></i></span>
			</div>
			<div class="btn-extars">
				<ul class="account-btns">
					<li class="signup-popup"><a href="#"><b><i class="fa fa-user"></i> Daftar</b></a></li>
					<li class="signin-popup"><a href="#"><b><i class="fa fa-sign-in"></i> Login</b></a></li>
				</ul>
			</div><!-- Btn Extras -->
			<nav>
				<ul>
					<li class="menu-item @if($url == url('/') || $url == route('home')) active @endif">
						<a href="{{ route('home') }}" title="">Beranda</a>
					</li>
					<li class="menu-item @if($url == route('about-us')) active @endif">
						<a href="{{ route('about-us') }}" title="">Tentang Kami</a>
					</li>
					<li class="menu-item @if($url == route('jobs.index')) active @endif">
						<a href="{{ route('jobs.index') }}" title="">Lowongan</a>
					</li>
					<li class="menu-item @if($url == route('contact.index')) active @endif">
						<a href="{{ route('contact.index') }}" title="">Contact Us</a>
					</li>
				</ul>
			</nav><!-- Menus -->
		</div>
	</div>
</header>