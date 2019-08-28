@extends('website.layouts.master')
@section('title', 'Lingkungan Keluarga')

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
				 			<h3>Status Pernikahan</h3>
				 		</div>
				 		<div class="profile-form-edit">
				 			<form>
				 				<div class="row no-margin-row">
				 					<div class="col-md-12">
				 						<span class="pf-title education-title"><b>Data Sesuai KTP</b></span>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Status</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
				 								<input type="Radio" name="ktp_marital_status" id="ktp-marital-status-single"><label for="ktp-marital-status-single">Single</label>
												<input type="Radio" name="ktp_marital_status" id="ktp-marital-status-engagement" checked><label for="ktp-marital-status-engagement">Tunangan</label>
												<input type="Radio" name="ktp_marital_status" id="ktp-marital-status-married" checked><label for="ktp-marital-status-married">Menikah</label>
												<input type="Radio" name="ktp_marital_status" id="ktp-marital-status-divorced" checked><label for="ktp-marital-status-divorced">Bercerai</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Sejak Tanggal</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Sejak Tanggal" name="ktp-status-date" class="datepicker" />
				 						</div>
				 					</div>
				 				</div>
				 				<div class="row no-margin-row">
				 					<div class="col-md-12">
				 						<span class="pf-title education-title"><b>Data Aktual</b></span>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Status</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
				 								<input type="Radio" name="actual_marital_status" id="actual-marital-status-single"><label for="actual-marital-status-single">Single</label>
												<input type="Radio" name="actual_marital_status" id="actual-marital-status-engagement" checked><label for="actual-marital-status-engagement">Tunangan</label>
												<input type="Radio" name="actual_marital_status" id="actual-marital-status-married" checked><label for="actual-marital-status-married">Menikah</label>
												<input type="Radio" name="actual_marital_status" id="actual-marital-status-divorced" checked><label for="actual-marital-status-divorced">Bercerai</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Sejak Tanggal</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Sejak Tanggal" name="actual-status-date" class="datepicker" />
				 						</div>
				 					</div>
				 				</div>
				 			</form>
				 		</div>
				 		<div class="profile-title">
				 			<h3>Susunan Keluarga (Istri / Suami)</h3>
				 		</div>
				 		<div class="profile-form-edit">
				 			<form id="partner-form">
				 				<div class="row no-margin-row partner-row">
				 					<div class="col-md-12">
				 						<span class="pf-title">Nama Istri / Suami</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Istri / Suami" name="partner_name" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tempat Lahir</span>
				 						<div class="pf-field">
											<input type="text" placeholder="Tempat Lahir" name="place_of_birth" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tanggal Lahir</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tanggal Lahir" name="date_of_birth" class="datepicker" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Jenis Kelamin</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
				 								<input type="Radio" name="partner_gender" id="partner-gender-man"><label for="partner-gender-man">Laki-Laki</label>
												<input type="Radio" name="partner_gender" id="partner-gender-women" checked><label for="partner-gender-women">Perempuan</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Pendidikan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Pendidikan" name="partner_education" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Pekerjaan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Pekerjaan" name="partner_work" />
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<hr>
				 					</div>
				 				</div>
				 			</form>
				 			<form id="childs-form">
				 				<div class="row no-margin-row child-row" data-index="0">
				 					<div class="col-md-12">
				 						<span class="pf-title child-label">Nama Anak Ke-1</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Anak Ke-1" name="childs[0][name]" class="child-name" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tempat Lahir</span>
				 						<div class="pf-field">
											<input type="text" placeholder="Tempat Lahir" name="childs[0][place_of_birth]" class="child-place-of-birth" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tanggal Lahir</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tanggal Lahir" name="childs[0][date_of_birth]" class="datepicker child-date-of-birth" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Jenis Kelamin</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
				 								<input type="Radio" name="childs[0][gender]" id="child-gender-man-0" class="child-gender"><label for="child-gender-man-0">Laki-Laki</label>
												<input type="Radio" name="childs[0][gender]" id="child-gender-women-0" class="child-gender" checked><label for="child-gender-women-0">Perempuan</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Pendidikan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Pendidikan" name="childs[0][education]" class="child-education" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Pekerjaan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Pekerjaan" name="childs[0][work]" class="child-work" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title"></span>
				 						<div class="pf-field">
				 							<button type="button" class="btn btn-primary remove-child add-remove-btn mr-2"><i class="fa fa-trash"></i></button>
				 							<button type="button" class="btn btn-primary add-child add-remove-btn mr-2" data-toggle="tooltip" title="Maximal 5"><i class="fa fa-plus"></i></button>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<hr>
				 					</div>
				 				</div>
				 			</form>
				 		</div>
				 		<div class="profile-title">
				 			<h3>Susunan Keluarga (Ayah, Ibu, Saudara Kandung, Termasuk Anda)</h3>
				 		</div>
				 		<div class="profile-form-edit mb-5">
				 			<form id="parent-form">
				 				<div class="row no-margin-row parent-row">
				 					<div class="col-md-12">
				 						<span class="pf-title">Nama Ayah</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Ayah" name="father_name" />
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Tempat Lahir</span>
				 						<div class="pf-field">
											<input type="text" placeholder="Tempat Lahir" name="father_place_of_birth" />
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Tanggal Lahir</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tanggal Lahir" name="father_date_of_birth" class="datepicker" />
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Pendidikan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Pendidikan" name="father_education" />
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Pekerjaan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Pekerjaan" name="father_work" />
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<hr>
				 					</div>
				 				</div>
				 				<div class="row no-margin-row parent-row">
				 					<div class="col-md-12">
				 						<span class="pf-title">Nama Ibu</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Ayah" name="mother_name" />
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Tempat Lahir</span>
				 						<div class="pf-field">
											<input type="text" placeholder="Tempat Lahir" name="mother_place_of_birth" />
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Tanggal Lahir</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tanggal Lahir" name="mother_date_of_birth" class="datepicker" />
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Pendidikan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Pendidikan" name="mother_education" />
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Pekerjaan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Pekerjaan" name="mother_work" />
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<hr>
				 					</div>
				 				</div>
				 			</form>
				 			<form id="brothers-form">
				 				<div class="row no-margin-row brother-row" data-index="0">
				 					<div class="col-md-12">
				 						<span class="pf-title brother-label">Nama Saudara Ke-1</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Saudara Ke-1" name="brothers[0][name]" class="brother-name" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tempat Lahir</span>
				 						<div class="pf-field">
											<input type="text" placeholder="Tempat Lahir" name="brothers[0][place_of_birth]" class="brother-place-of-birth" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tanggal Lahir</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tanggal Lahir" name="brothers[0][date_of_birth]" class="datepicker brother-date-of-birth" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Jenis Kelamin</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
				 								<input type="Radio" name="brothers[0][gender]" id="brother-gender-man-0" class="brother-gender"><label for="brother-gender-man-0">Laki-Laki</label>
												<input type="Radio" name="brothers[0][gender]" id="brother-gender-women-0" class="brother-gender" checked><label for="brother-gender-women-0">Perempuan</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Pendidikan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Pendidikan" name="brothers[0][education]" class="brother-education" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Pekerjaan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Pekerjaan" name="brothers[0][work]" class="brother-work" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title"></span>
				 						<div class="pf-field">
				 							<button type="button" class="btn btn-primary remove-brother add-remove-btn mr-2"><i class="fa fa-trash"></i></button>
				 							<button type="button" class="btn btn-primary add-brother add-remove-btn mr-2" data-toggle="tooltip" title="Maximal 5"><i class="fa fa-plus"></i></button>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<hr>
				 					</div>
				 				</div>
				 			</form>
				 			<form>
				 				<div class="row">
				 					<div class="col-md-12">
				 						<br><br>
				 						<button type="submit">Update</button>
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
<script src="{{ asset('website/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script>
	const datePickerInit = function() {
		$('.datepicker').datepicker({
		    format: 'dd-mm-yyyy',
    		autoclose: true,
    		orientation: "bottom"
		});
	}

	const labelInit = function() {
		$('#childs-form').find('.child-label').each(function(k, v) {
			$(this).text('Nama Anak Ke-' + (k+1));
		});

		$('#childs-form').find('.child-name').each(function(k, v) {
			$(this).attr('placeholder', 'Nama Anak Ke-' + (k+1));
		});

		$('#brothers-form').find('.brother-label').each(function(k, v) {
			$(this).text('Nama Saudara Ke-' + (k+1));
		});

		$('#brothers-form').find('.brother-name').each(function(k, v) {
			$(this).attr('placeholder', 'Nama Saudara Ke-' + (k+1));
		});
	}

	$(function(){
		datePickerInit();

		$('#childs-form').on('click', '.add-child', function() {
			let parentRow = $(this).closest('form').find('.child-row');

			if (parentRow.length >= 3) {
				return;
			}

			let parentEl = parentRow.last().clone();
			let index = parseInt(parentEl.data('index')) + 1;

			parentEl.find('input').val('');
			parentEl.find('.child-name').attr('name', `childs[${index}][name]`);
			parentEl.find('.child-place-of-birth').attr('name', `childs[${index}][place_of_birth]`);
			parentEl.find('.child-date-of-birth').attr('name', `childs[${index}][date_of_birth]`);
			parentEl.find('.child-gender').attr('name', `childs[${index}][gender]`);
			parentEl.find('.child-work').attr('name', `childs[${index}][work]`);

			parentEl.attr('data-index', index);

			parentEl.appendTo('#childs-form');

			labelInit();

			datePickerInit();
		});

		$('#childs-form').on('click', '.remove-child', function() {
			let parentEl = $(this).closest('form').find('.child-row');

			if(parentEl.length < 2) {
				return;
			}

			$(this).closest('.child-row').remove();
			labelInit();
		});

		$('#brothers-form').on('click', '.add-brother', function() {
			let parentRow = $(this).closest('form').find('.brother-row');

			if (parentRow.length >= 7) {
				return;
			}

			let parentEl = parentRow.last().clone();
			let index = parseInt(parentEl.data('index')) + 1;

			parentEl.find('input').val('');
			parentEl.find('.brother-name').attr('name', `brothers[${index}][name]`);
			parentEl.find('.brother-place-of-birth').attr('name', `brothers[${index}][place_of_birth]`);
			parentEl.find('.brother-date-of-birth').attr('name', `brothers[${index}][date_of_birth]`);
			parentEl.find('.brother-gender').attr('name', `brothers[${index}][gender]`);
			parentEl.find('.brother-work').attr('name', `brothers[${index}][work]`);

			parentEl.attr('data-index', index);

			parentEl.appendTo('#brothers-form');

			labelInit();

			datePickerInit();
		});

		$('#brothers-form').on('click', '.remove-brother', function() {
			let parentEl = $(this).closest('form').find('.brother-row');

			if(parentEl.length < 2) {
				return;
			}

			$(this).closest('.brother-row').remove();
			labelInit();
		});
	});
</script>
@endpush