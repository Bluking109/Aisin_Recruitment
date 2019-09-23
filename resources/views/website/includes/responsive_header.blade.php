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
		<div class="btn-extars">
			<ul class="account-btns">
				<li class="signup-popup"><a href="#"><b><i class="la la-key"></i> Sign Up</b></a></li>
				<li class="signin-popup"><a href="#"><b><i class="la la-external-link-square"></i> Login</b></a></li>
			</ul>
		</div><!-- Btn Extras -->
		<div class="responsivemenu">
			<ul>
				<li class="menu-item">
					<a href="{{ route('home') }}" title="">Beranda</a>
				</li>
				{{-- <li class="menu-item">
					<a href="{{ route('about-us') }}" title="">Tentang Kami</a>
				</li> --}}
				<li class="menu-item">
					<a href="{{ route('jobs.index') }}" title="">Lowongan</a>
				</li>
				<li class="menu-item">
					<a href="{{ route('contact.index') }}" title="">Contact Us</a>
				</li>
			</ul>
		</div>
	</div>
</div>