@extends('website.layouts.master')
@section('title', 'Riwayat Pekerjaan')

@push('additional_css')
<link rel="stylesheet" type="text/css" href="{{ asset('website/css/bootstrap-datepicker.css') }}" />
@endpush

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
				 			<h3>Pengalaman Kerja <br><small class="text-warning">(Urutkan dari yang terbaru)</small></h3>
				 		</div>
				 		<div class="profile-form-edit">
				 			<form id="work-experience-form">
				 				@csrf
				 				<input type="hidden" name="recaptcha_key" id="recaptcha-key">
				 				@if($workExperiences->count())
				 				@foreach($workExperiences as $key => $workExperience)
								<div class="row no-margin-row work-experience-row" data-index="{{ $key }}">
				 					<div class="col-md-4">
				 						<span class="pf-title">Nama Perusahaan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Perusahaan" name="work_experiences[{{ $key }}][company]" class="work-experience-company" value="{{ $workExperience->company }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Jabatan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Jabatan" name="work_experiences[{{ $key }}][position]" class="work-experience-position" value="{{ $workExperience->position }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Gaji (IDR)</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Gaji" name="work_experiences[{{ $key }}][salary]" class="work-experience-salary thousand" value="{{ $workExperience->salary }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Tanggal Masuk</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tanggal Masuk" name="work_experiences[{{ $key }}][join_date]" class="work-experience-join-date datepicker" value="{{ date('d-m-Y', strtotime($workExperience->join_date)) }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Tanggal Keluar</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tanggal Keluar" name="work_experiences[{{ $key }}][end_date]" class="work-experience-end-date datepicker" value="{{ date('d-m-Y', strtotime($workExperience->end_date)) }}" />
				 						</div>
				 					</div>
				 					@if($jobSeeker->educationLevel->isAssociateForm())
				 					<div class="col-md-4">
				 						<span class="pf-title">Nama Atasan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Atasan" name="work_experiences[{{ $key }}][boss_name]" class="work-experience-boss-name" value="{{ $workExperience->boss_name }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Jabatan Atasan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Jabatan Atasan" name="work_experiences[{{ $key }}][boss_position]" class="work-experience-boss-position" value="{{ $workExperience->boss_position }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Jumlah Bawahan Anda</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Jumlah Bawahan Anda" name="work_experiences[{{ $key }}][number_of_subordinates]" class="number work-experience-subordinate-total" value="{{ $workExperience->number_of_subordinates }}" />
				 						</div>
				 					</div>
				 					@endif
				 					<div class="col-md-8">
				 						<span class="pf-title">Alasan Pindah</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Alasan Pindah" name="work_experiences[{{ $key }}][reason_to_move]" class="work-experience-reason-out">{{ $workExperience->reason_to_move }}</textarea>
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title"></span>
				 						<div class="pf-field">
				 							<button type="button" class="btn btn-primary remove-work-experience add-remove-btn mr-2"><i class="fa fa-trash"></i></button>
				 							<button type="button" class="btn btn-primary add-work-experience add-remove-btn mr-2" data-toggle="tooltip" title="Maximal 5"><i class="fa fa-plus"></i></button>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<hr>
				 					</div>
				 				</div>
				 				@endforeach
				 				@else
				 				<div class="row no-margin-row work-experience-row" data-index="0">
				 					<div class="col-md-4">
				 						<span class="pf-title">Nama Perusahaan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Perusahaan" name="work_experiences[0][company]" class="work-experience-company" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Jabatan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Jabatan" name="work_experiences[0][position]" class="work-experience-position" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Gaji (IDR)</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Gaji" name="work_experiences[0][salary]" class="work-experience-salary thousand" />
				 						</div>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Tanggal Masuk</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tanggal Masuk" name="work_experiences[0][join_date]" class="work-experience-join-date datepicker" />
				 						</div>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Tanggal Keluar</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tanggal Keluar" name="work_experiences[0][end_date]" class="work-experience-end-date datepicker" />
				 						</div>
				 					</div>
				 					@if($jobSeeker->educationLevel->isAssociateForm())
				 					<div class="col-md-4">
				 						<span class="pf-title">Nama Atasan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Atasan" name="work_experiences[0][boss_name]" class="work-experience-boss-name" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Jabatan Atasan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Jabatan Atasan" name="work_experiences[0][boss_position]" class="work-experience-boss-position" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Jumlah Bawahan Anda</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Jumlah Bawahan Anda" name="work_experiences[0][number_of_subordinates]" class="number work-experience-subordinate-total" />
				 						</div>
				 					</div>
				 					@endif
				 					<div class="col-md-8">
				 						<span class="pf-title">Alasan Pindah</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Alasan Pindah" name="work_experiences[0][reason_to_move]" class="work-experience-reason-out"></textarea>
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title"></span>
				 						<div class="pf-field">
				 							<button type="button" class="btn btn-primary remove-work-experience add-remove-btn mr-2"><i class="fa fa-trash"></i></button>
				 							<button type="button" class="btn btn-primary add-work-experience add-remove-btn mr-2" data-toggle="tooltip" title="Maximal 5"><i class="fa fa-plus"></i></button>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<hr>
				 					</div>
				 				</div>
				 				@endif
				 			</form>
				 		</div>
				 		@if($jobSeeker->educationLevel->isAssociateForm())
			 			<div class="profile-title">
				 			<h3></h3>
				 		</div>
				 		<div class="profile-form-edit">
				 			<form id="work-experience-detail-form">
				 				<div class="row">
				 					<div class="col-md-12">
				 						<span class="pf-title">Berikan gambaran singkat mengenai jabatan-jabatan di atas !</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Gambaran singkat mengenai jabatan" name="position_description">{{ $workExperienceDetail->position_description ?? old('position_description') }}</textarea>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Masalah penting apa saja yang pernah anda hadapi, dan bagaimana mengatasinya ?</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Msalah dan cara mengatasinya" name="problems_and_solutions">{{ $workExperienceDetail->problems_and_solutions ?? old('problems_and_solutions') }}</textarea>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Ceritakan pandangan / kesan anda terhadap perusahaan tersebut !</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Pandangan dan kesan terhadap perusahaan" name="impression_on_company">{{ $workExperienceDetail->impression_on_company ?? old('impression_on_company') }}</textarea>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Pernahkan anda melakukan pembaharuan atau perubahan di perusahaan tersebut ?</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Pembaharuan dan perubahan pada perusahaan" name="improvement_on_company">{{ $workExperienceDetail->improvement_on_company ?? old('improvement_on_company') }}</textarea>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Siapakah yang mendorong Anda hingga sampai pada taraf kemajuan seperti sekarang ?</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Siapa yang mendorong Anda" name="who_pushed">{{ $workExperienceDetail->who_pushed ?? old('who_pushed') }}</textarea>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Bagaimana bila Anda menghadapi persoalan dalam pekerjaan dan harus mengambil keputusan ?</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Cara menghadapi persoalan dan mengambil keputusan" name="how_make_decisions">{{ $workExperienceDetail->how_make_decisions ?? old('how_make_decisions') }}</textarea>
				 						</div>
				 					</div>
				 				</div>
				 			</form>
				 		</div>
				 		@endif
				 		<div class="profile-form-edit mb-5">
				 			<form>
				 				<div class="row">
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
<script src="{{ asset('website/js/dynamic_page/work-experience.min.js') }}" type="text/javascript"></script>
@endpush