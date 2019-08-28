@extends('website.layouts.master')
@section('title', 'Beranda')

@section('pages')
<section>
	<div class="block no-padding">
		<div class="container fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="main-featured-sec">
						<div class="new-slide-3 primary-bg-image">
							<div class="overlay-bg"></div>
							{{-- <img src="{{ asset('website/images/prabowo1.png') }}" alt="" style="width: 400px" /> --}}
						</div>
						<div class="job-search-sec">
							<div class="job-search">
								<h3>Mari Bergabung Bersama Kami</h3>
								<span>Kembangkan Kemampuan dan Tingkatkan Karirmu Disini</span>
								<form>
									<div class="row">
										<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
											<div class="job-field">
												<input type="text" placeholder="Cari" />
												<i class="la la-keyboard-o"></i>
											</div>
										</div>
										<div class="col-lg-1 col-md-2 col-sm-12 col-xs-12">
											<button type="submit"><i class="la la-search"></i></button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="scroll-to">
							<a href="#section-job-list" title=""><i class="la la-arrow-down"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="section-job-list">
	<div class="block">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading">
						<h2>Lowongan Tersedia</h2>
						<span>Cari posisi yang sesuai dengan kualifikasi anda.</span>
					</div><!-- Heading -->
					<div class="job-listings-sec">
						<div class="job-listing">
							<div class="job-title-sec">
								<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
								<h3><a href="#" title="">Web Designer / Developer</a></h3>
								<span>Massimo Artemisis</span>
							</div>
							<a href="#"><span class="job-is fl">APPLY</span></a>
						</div>
						<div class="job-listing">
							<div class="job-title-sec">
								<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
								<h3><a href="#" title="">Marketing Director</a></h3>
								<span>Tix Dog</span>
							</div>
							<a href="#"><span class="job-is fl">APPLY</span></a>
						</div>
						<div class="job-listing">
							<div class="job-title-sec">
								<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
								<h3><a href="#" title="">C Developer (Senior) C .Net</a></h3>
								<span>StarHealth</span>
							</div>
							<a href="#"><span class="job-is fl">APPLY</span></a>
						</div>
						<div class="job-listing">
							<div class="job-title-sec">
								<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
								<h3><a href="#" title="">Application Developer For Android</a></h3>
								<span>Altes Bank</span>
							</div>
							<a href="#"><span class="job-is fl">APPLY</span></a>
						</div>
						<div class="job-listing">
							<div class="job-title-sec">
								<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
								<h3><a href="#" title="">Regional Sales Manager South east Asia</a></h3>
								<span>Vincent</span>
							</div>
							<a href="#"><span class="job-is fl">APPLY</span></a>
						</div>
						<div class="job-listing">
							<div class="job-title-sec">
								<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
								<h3><a href="#" title="">Social Media and Public Relation Executive </a></h3>
								<span>MediaLab</span>
							</div>
							<a href="#"><span class="job-is fl">APPLY</span></a>
						</div>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="browse-all-cat">
						<a href="#" title="">Tampilkan Lebih Banyak</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="block no-padding">
		<div class="container fluid">
			<div class="row">
				<div class="col-lg-12">
					<a href="{{ route('contact.index') }}">
						<div class="simple-text">
							<h3>Ada Pertanyaan?</h3>
							<span>Kami sangat bahagia apabila bisa membantu Anda :)</span>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection