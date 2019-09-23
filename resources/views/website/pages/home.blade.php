@extends('website.layouts.master')
@section('title', 'Beranda')

@push('additional_css')
<link rel="stylesheet" type="text/css" href="{{ asset('website/css/slick.css') }}">
@endpush

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
								<h3>PT. Aisin Indonesia Automotive</h3>
								<span>Perusahaan Manufaktur</span>
							</div>
						</div>
						<div class="scroll-to">
							<a href="#section-about" title=""><i class="la la-arrow-down"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

{{-- <section id="section-job-list">
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
</section> --}}
<section id="section-about">
	<div class="block">
		<div class="container">
			 <div class="row">
			 	<div class="col-lg-12">
			 		<div class="about-us">
			 			<div class="row">
			 				<div class="col-lg-12">
			 					<h4>Tentang PT Aisin Indonesia Automotive <br><br></h4>
			 				</div>
			 				<div class="col-lg-7">
			 					<p>Far much that one rank beheld bluebird after outside ignobly allegedly more when oh arrogantly vehement irresistibly fussy penguin insect additionally wow absolutely crud meretriciously hastily dalmatian a glowered inset one echidna cassowary some parrot and much as goodness some froze the sullen much connected bat wonderfully on instantaneously eel valiantly petted this along across highhandedly much. </p>
			 					<p>Repeatedly dreamed alas opossum but dramatically despite expeditiously that jeepers loosely yikes that as or eel underneath kept and slept compactly far purred sure abidingly up above fitting to strident wiped set waywardly far the and pangolin horse approving paid chuckled cassowary oh above a much opposite far much hypnotically more therefore wasp less that hey apart well like while superbly orca and far hence one.Far much that one rank beheld bluebird after outside ignobly allegedly more when oh arrogantly vehement irresistibly fussy.</p>
			 				</div>
			 				<div class="col-lg-5">
			 					<div class="slick-img">
								  	<div><img src="{{ asset('website/images/aisin.jpg') }}" alt="" /></div>
								  	<div><img src="{{ asset('website/images/aisin-product.png') }}" alt="" /></div>
								</div>
			 				</div>
			 				<div class="col-lg-12">
			 					<p>Far much that one rank beheld bluebird after outside ignobly allegedly more when oh arrogantly vehement irresistibly fussy penguin insect additionally wow absolutely crud meretriciously hastily dalmatian a glowered inset one echidna cassowary some parrot and much as goodness some froze the sullen much connected bat wonderfully on instantaneously eel valiantly petted this along across highhandedly much. </p>
			 					<p>Repeatedly dreamed alas opossum but dramatically despite expeditiously that jeepers loosely yikes that as or eel underneath kept and slept compactly far purred sure abidingly up above fitting to strident wiped set waywardly far the and pangolin horse approving paid chuckled cassowary oh above a much opposite far much hypnotically more therefore wasp less that hey apart well like while superbly orca and far hence one.Far much that one rank beheld bluebird after outside ignobly allegedly more when oh arrogantly vehement irresistibly fussy.</p>
			 				</div>
			 			</div>
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
							<h3>Lowongan Kerja</h3>
							<span>Saat ini kami sedang membuka lowongan untuk beberapa posisi</span>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@push('additional_js')
<script type="text/javascript" src="{{ asset('website/js/slick.min.js') }}"></script>
<script type="text/javascript">
	$(function() {
		$('.slick-img').slick({
		  	dots: false,
		  	infinite: true,
		  	speed: 500,
		  	fade: true,
		  	cssEase: 'linear'
		});
	});
</script>
@endpush