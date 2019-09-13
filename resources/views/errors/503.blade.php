@extends('errors.layouts.master')
@section('title', 'Internal Server Error')
@section('pages')
<div class="primary-bg-image error-bg" id="scrollup">
	<div class="overlay-bg">
		<div class="row">
			<div class="col-sm-12 text-center error-wrapper">
				<div class="col-sm-12">
					<h2 class="error-title">Under maintenance !!</h2>
					<p class="error-subtitle">Maaf saat ini kami sedang menjalankan beberapa perbaikan :)</p>
					<p>Silahkan coba lagi dalam beberapa saat. Terimakasih.</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection