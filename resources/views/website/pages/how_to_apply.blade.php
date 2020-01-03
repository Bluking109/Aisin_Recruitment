@extends('website.layouts.master')
@section('title', 'Cara Melamar')
@push('additional_css')
<link rel="stylesheet" type="text/css" href="{{ asset('website/css/slick.css') }}">
@endpush
@section('pages')
@include('website.includes.sub_header', [
	'title' => $howToApply->title ?? 'Cara Melamar Kerja',
	'sub_title' => $howToApply->sub_title ?? 'Cara Melamar Kerja PT. Aisin Indonesia Automotive',
	'breadcrumbs' => [
		[
			'url' => route('home'),
			'title' => 'Home'
		],
		[
			'url' => '#',
			'title' => $howToApply->title ?? 'Cara Melamar Kerja'
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
			 				<div class="col-sm-12">
								<img src="@if($howToApply) {{ asset('storage/pages/' . $howToApply->image) }} @endif">
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