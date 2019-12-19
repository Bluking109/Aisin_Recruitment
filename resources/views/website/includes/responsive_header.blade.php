<div class="responsive-header">
	<div class="responsive-menubar">
		<div class="res-logo"><a href="index.html" title=""><img class="mini-logo" src="{{ asset('website/images/logo/aiia-logo.png') }}" alt="" /></a></div>
		<div class="menu-resaction">
			<div class="res-openmenu">
				<img src="{{ asset('website/images/icon.png') }}" alt="" /> Menu
			</div>
			<div class="res-closemenu">
				<img src="{{ asset('website/images/icon6.png') }}" alt="" /> Close
			</div>
		</div>
	</div>
	<div class="responsive-opensec">
		@if(!auth()->guard('job_seekers')->check())
		<div class="btn-extars">
			<ul class="account-btns">
				<li class="signup-popup"><a href="#"><b><i class="la la-key"></i> Sign Up</b></a></li>
				<li class="signin-popup"><a href="#"><b><i class="la la-external-link-square"></i> Login</b></a></li>
			</ul>
		</div><!-- Btn Extras -->
		@endif
		<div class="responsivemenu">
			<ul>
				<li class="menu-item">
					<a href="{{ route('home') }}" title=""><i class="fa fa-home"></i> Beranda</a>
				</li>
				{{-- <li class="menu-item">
					<a href="{{ route('about-us') }}" title="">Tentang Kami</a>
				</li> --}}
				<li class="menu-item">
					<a href="{{ route('job-vacancies.index') }}" title=""><i class="fa fa-hashtag"></i> Lowongan</a>
				</li>
				<li class="menu-item">
					<a href="{{ route('how-to-apply.index') }}" title=""><i class="fa fa-sitemap"></i> Cara Melamar</a>
				</li>
				<li class="menu-item">
					<a href="{{ route('contact.index') }}" title=""><i class="fa fa-phone"></i> Kontak Kami</a>
				</li>
				@if(auth()->guard('job_seekers')->check())
				<li class="menu-item">
					<a href="{{ route('profiles.personal-identity.index') }}" title=""><i class="fa fa-user-secret"></i> Profile</a>
				</li>
				<li class="menu-item">
					<a href="{{ route('profiles.personal-identity.index') }}" title="" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>
				</li>
				@endif
			</ul>
		</div>
	</div>
</div>