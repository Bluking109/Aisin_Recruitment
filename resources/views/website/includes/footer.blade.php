<footer>
	<div class="block">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 column">
					<div class="widget">
						<div class="about_widget">
							<div class="logo">
								<a href="#" title=""><img class="footer-logo" src="{{ asset('website/images/logo/aiia-logo-white.png') }}" alt="" /></a>
							</div>
							<span>Jl. Harapan VIII Lot. LL No.9-10</span>
							<span>Kawasan KIIC Karawang. Jawa Barat.</span>
							<span>(0267) 8643131</span>
							<span>recruitment@aiia.co.id</span>
						</div><!-- About Widget -->
					</div>
				</div>
				<div class="col-lg-5 column">
					<div class="widget">
						<h3 class="footer-title">Menu</h3>
						<div class="link_widgets">
							<div class="row">
								<div class="col-lg-6">
									<a href="{{ route('home') }}" title="">Beranda </a>
									<a href="{{ route('job-vacancies.index') }}" title="">Lowongan </a>
									<a href="{{ route('how-to-apply.index') }}" title="">Cara Melamar </a>
									<a href="{{ route('contact.index') }}" title="">Kontak Kami </a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3 column">
					<div class="widget">
						<div class="download_widget">
							@if(!auth()->guard('job_seekers')->check())
							<button class="btn btn-primary btn-footer btn-block signup-popup"><i class="fa fa-user"></i> Daftar</button>
							<button class="btn btn-danger btn-footer btn-block signin-popup"><i class="fa fa-sign-in"></i> Login</button>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="bottom-line">
		<span>© 2019 PT Aisin Indonesia Automotive</span>
		<a href="#scrollup" class="scrollup" title=""><i class="la la-arrow-up"></i></a>
	</div>
</footer>