@extends('website.layouts.master')
@section('title', 'Riwayat Pekerjaan')

@section('pages')
<section class="mt-126">
	<div class="block no-padding">
		<div class="container">
			 <div class="row no-gape">
			 	<aside class="col-md-3 column border-right">
			 		<div class="widget">
			 			<div class="tree_widget-sec">
			 				@include('website.includes.job_seeker_menu')
			 			</div>
			 		</div>
			 	</aside>
			 	<div class="col-md-9 column">
			 		<div class="padding-left">
				 		<div class="profile-title">
				 			<h3>Aktivitas Sosial</h3>
				 		</div>
				 		<div class="profile-form-edit">
				 			<form id="friend-form">
				 				@csrf
				 				@method('PUT')
				 				<input type="hidden" name="recaptcha_key" id="recaptcha-key">
				 				<div class="row">
				 					<div class="col-md-12">
				 						<p class="remember-label">
				 							<span class="pf-title">Apakah Anda memiliki kenalan di AIIA ?</span>
			 								<input type="radio" name="has_friend" id="has-friend-yes" class="foreign-lang-writing" value="1" @if($friends->count()) checked @endif><label for="has-friend-yes">Ada</label>
											<input type="radio" name="has_friend" id="has-friend-no" class="foreign-lang-writing" value="0" @if(!$friends->count()) checked @endif><label for="has-friend-no">Tidak Ada</label>
										</p>
				 					</div>
				 				</div>
				 				@if(!$friends->count())
				 				<div class="row no-margin-row friend-row" data-index="0">
				 					<div class="col-md-6">
				 						<span class="pf-title">Nama</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama" name="friends[0][name]" class="friend-name friend-element" disabled />
				 						</div>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Jabatan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Jabatan" name="friends[0][position]" class="friend-position friend-element" disabled />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">No. Telp.</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="No. Telp" name="friends[0][telephone_number]" class="friend-phone-number phone-number friend-element" disabled />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Hubungan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Hubungan" name="friends[0][relationship]" class="friend-relationship friend-element" disabled />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title"></span>
				 						<div class="pf-field pt-2">
				 							<button type="button" class="btn btn-primary remove-friend add-remove-btn mr-2 friend-element" disabled><i class="fa fa-trash"></i></button>
				 							<button type="button" class="btn btn-primary add-friend add-remove-btn mr-2 friend-element" data-toggle="tooltip" title="Maximal 3" disabled><i class="fa fa-plus"></i></button>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<hr>
				 					</div>
				 				</div>
				 				@else
								@foreach($friends as $key => $value)
								<div class="row no-margin-row friend-row" data-index="{{ $key }}">
				 					<div class="col-md-6">
				 						<span class="pf-title">Nama</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama" name="friends[{{ $key }}][name]" class="friend-name friend-element" value="{{ $value->name }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Jabatan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Jabatan" name="friends[{{ $key }}][position]" class="friend-position friend-element" value="{{ $value->position }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">No. Telp.</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="No. Telp" name="friends[{{ $key }}][telephone_number]" class="friend-phone-number phone-number friend-element" value="{{ $value->telephone_number }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Hubungan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Hubungan" name="friends[{{ $key }}][relationship]" class="friend-relationship friend-element" value="{{ $value->relationship }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title"></span>
				 						<div class="pf-field pt-2">
				 							<button type="button" class="btn btn-primary remove-friend add-remove-btn mr-2 friend-element"><i class="fa fa-trash"></i></button>
				 							<button type="button" class="btn btn-primary add-friend add-remove-btn mr-2 friend-element" data-toggle="tooltip" title="Maximal 3"><i class="fa fa-plus"></i></button>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<hr>
				 					</div>
				 				</div>
								@endforeach
				 				@endif
				 			</form>
				 		</div>
				 		<div class="profile-title">
				 			<h3>Pengalaman Organisasi</h3>
				 		</div>
				 		<div class="profile-form-edit">
				 			<form id="organization-form">
				 				@if(!$organizations->count())
				 				<div class="row no-margin-row organization-row" data-index="0">
				 					<div class="col-md-4">
				 						<span class="pf-title">Nama Organisasi</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Organisasi / Ekstrakulikuler" name="organizations[0][name]" class="organization-name" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tempat</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tempat" name="organizations[0][place]" class="organization-place" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Jabatan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Jabatan" name="organizations[0][position]" class="organization-position" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Mulai Menjabat</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Dari Tanggal" name="organizations[0][start_date]" class="tenure-from-date" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Akhir Jabatan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Sampai Tanggal" name="organizations[0][end_date]" class="tenure-end-date" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title"></span>
				 						<div class="pf-field">
				 							<button type="button" class="btn btn-primary remove-non-formal add-remove-btn mr-2"><i class="fa fa-trash"></i></button>
				 							<button type="button" class="btn btn-primary add-non-formal add-remove-btn mr-2" data-toggle="tooltip" title="Maximal 5"><i class="fa fa-plus"></i></button>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<hr>
				 					</div>
				 				</div>
				 				@else
								@foreach($organizations as $key => $value)
								<div class="row no-margin-row organization-row" data-index="{{ $key }}">
				 					<div class="col-md-4">
				 						<span class="pf-title">Nama Organisasi</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Organisasi / Ekstrakulikuler" name="organizations[{{ $key }}][name]" class="organization-name" value="{{ $value->name }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tempat</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tempat" name="organizations[{{ $key }}][place]" class="organization-place" value="{{ $value->place }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Jabatan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Jabatan" name="organizations[{{ $key }}][position]" class="organization-position" value="{{ $value->position }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Mulai Menjabat</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Dari Tanggal" name="organizations[{{ $key }}][start_date]" class="tenure-from-date" value="{{ date('d-m-Y', strtotime($value->start_date)) }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Akhir Jabatan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Sampai Tanggal" name="organizations[{{ $key }}][end_date]" class="tenure-end-date" value="{{ date('d-m-Y', strtotime($value->end_date)) }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title"></span>
				 						<div class="pf-field">
				 							<button type="button" class="btn btn-primary remove-non-formal add-remove-btn mr-2"><i class="fa fa-trash"></i></button>
				 							<button type="button" class="btn btn-primary add-non-formal add-remove-btn mr-2" data-toggle="tooltip" title="Maximal 5"><i class="fa fa-plus"></i></button>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<hr>
				 					</div>
				 				</div>
								@endforeach
				 				@endif
				 			</form>
				 			<form>
				 				<div class="row mb-5">
				 					<div class="col-md-12">
				 						<br>
				 						<p class="google-term d-none">This site is protected by reCAPTCHA and the Google
										    <a href="https://policies.google.com/privacy">Privacy Policy</a> and
										    <a href="https://policies.google.com/terms">Terms of Service</a> apply.
										</p>
				 						<button type="button" id="btn-update" disabled><span class="submit-text">Update</span> <span class="loading">Wait... <i class="fa fa-circle-o-notch fa-spin fa-fw loading"></i></span></button>
				 					</div>
				 				</div>
				 			</form>
				 		</div>
				 	</div>
				</div>
			 </div>
		</div>
	</div>
</section>
@endsection

@push('additional_js')
<script src="{{ asset('website/js/dynamic_page/social-activity.min.js') }}" type="text/javascript"></script>
@endpush