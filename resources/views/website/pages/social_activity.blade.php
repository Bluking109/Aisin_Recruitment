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
				 			<h3>Aktivitas Sosial</h3>
				 		</div>
				 		<div class="profile-form-edit">
				 			<form id="friend-form">
				 				<div class="row">
				 					<div class="col-md-12">
				 						<p class="remember-label">
				 							<span class="pf-title">Apakah Anda memiliki kenalan di AIIA ?</span>
			 								<input type="Radio" name="has_friend" id="has-friend-yes" class="foreign-lang-writing" value="1"><label for="has-friend-yes">Ada</label>
											<input type="Radio" name="has_friend" id="has-friend-no" class="foreign-lang-writing" value="0" checked><label for="has-friend-no">Tidak Ada</label>
										</p>
				 					</div>
				 				</div>
				 				<div class="row no-margin-row friend-row" data-index="0">
				 					<div class="col-md-3 col-lg-4">
				 						<span class="pf-title">Nama</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama" name="friends[0][name]" class="friend-name friend-element" disabled />
				 						</div>
				 					</div>
				 					<div class="col-md-2">
				 						<span class="pf-title">Jabatan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Jabatan" name="friends[0][position]" class="friend-position friend-element" disabled />
				 						</div>
				 					</div>
				 					<div class="col-md-2">
				 						<span class="pf-title">No. Telp.</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="No. Telp" name="friends[0][phone_number]" class="friend-phone-number phone-number friend-element" disabled />
				 						</div>
				 					</div>
				 					<div class="col-md-2">
				 						<span class="pf-title">Hubungan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Hubungan" name="friends[0][relationship]" class="friend-relationship friend-element" disabled />
				 						</div>
				 					</div>
				 					<div class="col-md-3 col-lg-2">
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
				 			</form>
				 		</div>
				 		<div class="profile-title">
				 			<h3>Pengalaman Organisasi</h3>
				 		</div>
				 		<div class="profile-form-edit">
				 			<form id="organization-form">
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
				 							<input type="text" placeholder="Dari Tanggal" name="organizations[0][tenure_from]" class="tenure-from-date" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Akhir Jabatan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Sampai Tanggal" name="organizations[0][tenure_end]" class="tenure-end-date" />
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
				 			</form>
				 			<form>
				 				<div class="row mb-5">
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
	const initRangeMonthDatePicker = function() {
		const rangeDatePickerClasses = [
			{
				firstDatePicker : ".tenure-from-date",
				lastDatePicker : ".tenure-end-date",
				format : "dd-mm-yyyy",
				viewMode : "dates"
			}
		];

		rangeDatePickerClasses.forEach(v => {
			$(v.lastDatePicker).datepicker({
			    format: v.format,
			    viewMode: v.viewMode,
	    		minViewMode: v.viewMode,
	    		autoclose: true,
	    		orientation: "bottom"
			}).on('changeDate',function(e){
			    $(v.firstDatePicker).datepicker('setEndDate',e.date)
			});

			$(v.firstDatePicker).datepicker({
			    format: v.format,
			    viewMode: v.viewMode,
	    		minViewMode: v.viewMode,
	    		autoclose: true,
	    		orientation: "bottom"
			}).on('changeDate',function(e){
			    $(v.lastDatePicker).datepicker('setStartDate',e.date)
			});
		});
	}

	$(function(){
		$('#organization-form').on('click', '.add-non-formal', function() {
			let parentRow = $(this).closest('form').find('.organization-row');

			if (parentRow.length >= 5) {
				return;
			}

			let parentEl = parentRow.last().clone();
			let index = parseInt(parentEl.data('index')) + 1;
			parentEl.find('input').val('');
			parentEl.find('.organization-name').attr('name', `organizations[${index}][name]`);
			parentEl.find('.organization-place').attr('name', `organizations[${index}][place]`);
			parentEl.find('.organization-position').attr('name', `organizations[${index}][position]`);
			parentEl.find('.tenure-from-date').attr('name', `organizations[${index}][tenure_from]`);
			parentEl.find('.tenure-end-date').attr('name', `organizations[${index}][tenure_end]`);
			parentEl.attr('data-index', index);

			parentEl.appendTo('#organization-form');

			initRangeMonthDatePicker();
		});

		$('#organization-form').on('click', '.remove-non-formal', function() {
			let parentEl = $(this).closest('form').find('.organization-row');

			if(parentEl.length < 2) {
				return;
			}

			$(this).closest('.organization-row').remove();
		});

		$('input[type="radio"][name="has_friend"]').on('change', function() {
			if ($(this).val() == '1') {
				$('.friend-element').prop('disabled', false);
			} else {
				$('.friend-element').prop('disabled', true);
			}
		});

		$('#friend-form').on('click', '.add-friend', function() {
			let parentRow = $(this).closest('form').find('.friend-row');

			if (parentRow.length >= 3) {
				return;
			}

			let parentEl = parentRow.last().clone();
			let index = parseInt(parentEl.data('index')) + 1;

			parentEl.find('input').val('');
			parentEl.find('.friend-name').attr('name', `friends[${index}][name]`);
			parentEl.find('.friend-position').attr('name', `friends[${index}][position]`);
			parentEl.find('.friend-phone-number').attr('name', `friends[${index}][phone_number]`);
			parentEl.find('.friend-relationship').attr('name', `friends[${index}][relationship]`);
			parentEl.attr('data-index', index);

			parentEl.appendTo('#friend-form');

			cleaveJsInit();
		});

		$('#friend-form').on('click', '.remove-friend', function() {
			let parentEl = $(this).closest('form').find('.friend-row');

			if(parentEl.length < 2) {
				return;
			}

			$(this).closest('.friend-row').remove();
		});
	});
</script>
@endpush