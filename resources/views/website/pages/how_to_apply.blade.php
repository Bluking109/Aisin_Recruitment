@extends('website.layouts.master')
@section('title', 'Cara Melamar')
@push('additional_css')
<link rel="stylesheet" type="text/css" href="{{ asset('website/css/slick.css') }}">
@endpush
@section('pages')
@include('website.includes.sub_header', [
	'title' => $howToApply->title,
	'sub_title' => $howToApply->sub_title,
	'breadcrumbs' => [
		[
			'url' => route('home'),
			'title' => 'Home'
		],
		[
			'url' => '#',
			'title' => $howToApply->title
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
								<img src="{{ asset('storage/pages/' . $howToApply->image) }}">
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