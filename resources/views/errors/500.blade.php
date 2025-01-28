@extends('errors.layouts.master')
@section('title', 'Internal Server Error')
@section('pages')
<div class="primary-bg-image error-bg" id="scrollup">
	<div class="overlay-bg">
		<div class="row">
			<div class="col-sm-12 text-center error-wrapper">
				<div class="col-sm-12">
					<h2 class="error-title">Oops !!</h2>
					<p class="error-subtitle">Maaf saat ini server kami sedang mengalami gangguan :(</p>
					<p>Silahkan hubungi kami apabila anda menemukan kendala.</p>
					<a href="/" class="btn btn-primary btn-rounded">Kembali Ke Beranda</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection