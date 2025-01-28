@extends('website.layouts.master')
@section('title', 'Contact')

@section('pages')
@include('website.includes.sub_header', [
	'title' => 'Kontak Kami',
	'sub_title' => 'Kami akan memberi tanggapan secepatnya',
	'breadcrumbs' => [
		[
			'url' => route('home'),
			'title' => 'Home'
		],
		[
			'url' => '#',
			'title' => 'Kontak'
		],
	]
])
<section>
	<div class="block remove-bottom">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="contact-map">
						<iframe src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=aisin%20indonesia%20automotive+(PT%20Aisin%20Indonesia%20Automotive)&amp;ie=UTF8&amp;t=&amp;z=17&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/map-my-route/">Create route map</a></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="block">
		<div class="container">
			 <div class="row">
			 	<div class="col-lg-6 column">
			 		<div class="contact-form">
			 			<h4>Tinggalkan Pesan <br><br></h4>
			 			<form action="{{ route('contact.store') }}" method="post">
			 				@csrf
			 				<div class="row">
			 					<div class="col-lg-12 pt-3">
			 						<span class="pf-title">Nama Lengkap</span>
			 						<div class="pf-field">
			 							<input type="text" placeholder="Nama Lengkap" name="name" value="{{ auth()->guard('job_seekers')->user() ? auth()->guard('job_seekers')->user()->name : '' }}" />
			 							@error('name')
										    <span class="text-danger">{{ $message }}</span>
										@enderror
			 						</div>
			 					</div>
			 					<div class="col-lg-12 pt-3">
			 						<span class="pf-title">E-mail</span>
			 						<div class="pf-field">
			 							<input type="text" placeholder="E-mail" name="email" value="{{ auth()->guard('job_seekers')->user() ? auth()->guard('job_seekers')->user()->email : '' }}" />
			 							@error('email')
										    <span class="text-danger">{{ $message }}</span>
										@enderror
			 						</div>
			 					</div>
			 					<div class="col-lg-12 pt-3">
			 						<span class="pf-title">Subjek</span>
			 						<div class="pf-field">
			 							<input type="text" placeholder="Subjek" name="subject" />
			 							@error('subject')
										    <span class="text-danger">{{ $message }}</span>
										@enderror
			 						</div>
			 					</div>
			 					<div class="col-lg-12 pt-3">
			 						<span class="pf-title">Pesan</span>
			 						<div class="pf-field">
			 							<textarea placeholder="Pesan" name="message"></textarea>
			 							@error('message')
										    <span class="text-danger">{{ $message }}</span>
										@enderror
			 						</div>
			 					</div>
			 					<div class="col-lg-12">
			 						<p class="google-term">This site is protected by reCAPTCHA and the Google
									    <a href="https://policies.google.com/privacy">Privacy Policy</a> and
									    <a href="https://policies.google.com/terms">Terms of Service</a> apply.
									</p>
			 					</div>
			 					<input type="hidden" name="recaptcha_key" id="recaptcha-key">
			 					<div class="col-lg-12">
			 						<button type="submit">Kirim</button>
			 					</div>
			 				</div>
			 			</form>
			 		</div>
			 	</div>
			 	<div class="col-lg-6 column">
				 	<div class="contact-textinfo style2">
				 		<h3>PT AISIN INDONESIA AUTOMOTIVE</h3>
				 		<ul>
				 			<li><i class="fa fa-map-marker"></i><span>Jl. Harapan VIII Lot. LL No.9-10. Kawasan KIIC Karawang. Jawa Barat, Indonesia</span>
							</li>
				 			<li><i class="fa fa-phone"></i><span>(0267) 8643131</span></li>
				 			<li><i class="la la-envelope-o"></i><span>recruitment@aiia.co.id</span></li>
				 		</ul>
				 	</div>
				</div>
			 </div>
		</div>
	</div>
</section>
@endsection

@push('additional_js')
<script>
$(function() {
	grecaptcha.ready(function() {
        grecaptcha.execute(siteKey, {action : 'contact'}).then(function(token) {
            $('#recaptcha-key').val(token);
        });
    });

	@if (session('error'))
		Toast.fire({
		    type: 'error',
		    title: "{{ session('error') }}"
		});
	@endif

	@if (session('success'))
		Toast.fire({
		    type: 'success',
		    title: "{{ session('success') }}"
		});
	@endif
})
</script>
@endpush