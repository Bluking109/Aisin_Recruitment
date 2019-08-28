@extends('website.layouts.master')
@section('title', 'Tentang Kami')
@push('additional_css')
<link rel="stylesheet" type="text/css" href="{{ asset('website/css/slick.css') }}">
@endpush
@section('pages')
@include('website.includes.sub_header', [
	'title' => 'Tentang Kami',
	'sub_title' => 'Tentang perusahaan',
	'breadcrumbs' => [
		[
			'url' => route('home'),
			'title' => 'Home'
		],
		[
			'url' => '#',
			'title' => 'Tentang Kami'
		],
	]
])
<section>
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