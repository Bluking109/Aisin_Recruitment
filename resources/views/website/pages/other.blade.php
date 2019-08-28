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
				 			<h3>Lain-Lain</h3>
				 		</div>
				 		<div class="profile-form-edit">
				 			<form>
				 				<div class="row" data-index="0">
				 					<div class="col-md-12">
				 						<span class="pf-title">Hobi / Kegemaran Anda</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Hobi dan Kegemaran"></textarea>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Bagaimana cara Anda mengisi waktu luang ?</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Cara mengisi waktu luang"></textarea>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Sebutkan minimal 3 kelebihan sifat Anda (Strong Point) !</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Kelebihan"></textarea>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Sebutkan minimal 3 kelemahan sifat Anda (Weak Point) !</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Kelemahan"></textarea>
				 						</div>
				 					</div>
				 					<div class="col-md-6">
				 						<p class="remember-label">
				 							<span class="pf-title">Apakah Anda menggunakan kacamata ?</span>
			 								<input type="Radio" name="with_glasses" id="with-glasses-yes" class="foreign-lang-writing" value="1"><label for="with-glasses-yes">Ya</label>
											<input type="Radio" name="with_glasses" id="with-glasses-no" class="foreign-lang-writing" value="0" checked><label for="with-glasses-no">Tidak</label>
										</p>
				 					</div>
				 					<div class="col-md-3 hidden-display minus-wrapper">
				 						<span class="pf-title">Kanan</span>
				 						<div class="pf-field">
				 							<input type="number" placeholder="Besaran minus/silinder/plus" name="right_eye" class="eye-element" disabled />
				 						</div>
				 					</div>
				 					<div class="col-md-3 hidden-display minus-wrapper">
				 						<span class="pf-title">Kiri</span>
				 						<div class="pf-field">
				 							<input type="number" placeholder="Besaran minus/silinder/plus" name="left_eye" class="eye-element" disabled />
				 						</div>
				 					</div>
				 				</div>
				 			</form>
				 		</div>
				 		<div class="profile-form-edit">
				 			<form id="other-form">
				 				<div class="row">
				 					<div class="col-md-12">
				 						<p class="remember-label">
				 							<span class="pf-title">Pernah atau sedang mengikuti proses recruitment di Perusahaan lain?</span>
			 								<input type="Radio" name="in_another_recruitment_process" id="follow-yes" class="foreign-lang-writing" value="1"><label for="follow-yes">Ya</label>
											<input type="Radio" name="in_another_recruitment_process" id="follow-no" class="foreign-lang-writing" value="0" checked><label for="follow-no">Tidak</label>
										</p>
				 					</div>
				 				</div>
				 				<div class="row no-margin-row other-row" data-index="0">
				 					<div class="col-md-4">
				 						<span class="pf-title">Penyelenggara</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Penyelenggara" name="others[0][organizer]" class="other-organizer other-element" disabled />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Astra Group</span>
				 						<p class="remember-label">
				 							<input type="Radio" name="others[0][is_astra]" id="is-astra-yes-0" class="other-is-astra other-element" value="1" disabled><label for="is-astra-yes-0">Ya</label>
											<input type="Radio" name="others[0][is_astra]" id="is-astra-no-0" class="other-is-astra other-element" value="0" checked disabled><label for="is-astra-no-0">Bukan</label>
				 						</p>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Proses</span>
				 						<div class="pf-field">
				 							<select data-placeholder="Proses Recruitment" class="chosen other-element other-process" name="others[0][process]" disabled>
												<option>Administrasi</option>
												<option>Psikotest</option>
												<option>Interview HRD</option>
												<option>Interview User</option>
												<option>MCU</option>
												<option>Lain-Lain</option>
											</select>
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tempat</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tempat" name="others[0][place]" class="other-element other-place" disabled />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tanggal</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tanggal" name="others[0][date]" class="other-element datepicker other-date" disabled />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Posisi</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Posisi" name="others[0][position]" class="other-element other-position" disabled />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Status</span>
				 						<div class="pf-field">
				 							<select data-placeholder="Status" class="chosen other-element other-status" name="others[0][status]" disabled>
												<option>Dalam proses</option>
												<option>Diterima</option>
												<option>Tidak Diterima</option>
											</select>
				 						</div>
				 					</div>
				 					<div class="col-md-8">
				 						<span class="pf-title"></span>
				 						<div class="pf-field pt-2">
				 							<button type="button" class="btn btn-primary remove-other add-remove-btn mr-2 other-element" disabled><i class="fa fa-trash"></i></button>
				 							<button type="button" class="btn btn-primary add-other add-remove-btn mr-2 other-element" data-toggle="tooltip" title="Maximal 3" disabled><i class="fa fa-plus"></i></button>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<hr>
				 					</div>
				 				</div>
				 			</form>
				 		</div>
				 		<div class="profile-form-edit">
				 			<form id="disease-form">
				 				<div class="row">
				 					<div class="col-md-12">
				 						<p class="remember-label">
				 							<span class="pf-title">Pernahkah Anda menderita penyakit yang lama sembuh ?</span>
			 								<input type="Radio" name="had_disease" id="had-disease-yes" class="foreign-lang-writing" value="1"><label for="had-disease-yes">Ya</label>
											<input type="Radio" name="had_disease" id="had-disease-no" class="foreign-lang-writing" value="0" checked><label for="had-disease-no">Tidak</label>
										</p>
				 					</div>
				 				</div>
				 				<div class="row no-margin-row disease-row" data-index="0">
				 					<div class="col-md-4">
				 						<span class="pf-title">Nama Penyakit</span>
				 						<div class="pf-field">
				 							<select data-placeholder="Status" class="chosen disease-name disease-element" name="diseases[0][name]" disabled>
												<option>Asma</option>
												<option>Paru-Paru Basah</option>
												<option>Flex Paru</option>
												<option>TBC</option>
												<option>Hepatitis</option>
												<option>Hernia</option>
												<option>Patah Tulang</option>
												<option>Ambeien</option>
											</select>
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Dari Kapan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Dari Kapan" name="diseases[0][from_date]" class="disease-element datepicker disease-from-date" disabled />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Sampai Kapan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Sampai Kapan" name="diseases[0][end_date]" class="disease-element datepicker disease-end-date" disabled />
				 						</div>
				 					</div>
				 					<div class="col-md-8">
				 						<span class="pf-title">Keterangan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Keterangan" name="diseases[0][note]" class="disease-element disease-note" disabled />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title"></span>
				 						<div class="pf-field pt-2">
				 							<button type="button" class="btn btn-primary remove-disease add-remove-btn mr-2 disease-element" disabled><i class="fa fa-trash"></i></button>
				 							<button type="button" class="btn btn-primary add-disease add-remove-btn mr-2 disease-element" data-toggle="tooltip" title="Maximal 3" disabled><i class="fa fa-plus"></i></button>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<hr>
				 					</div>
				 				</div>
				 			</form>
				 			<form>
				 				<div class="row mt-5">
				 					<div class="col-sm-12">
					 					<div class="pf-field">
				 							<p class="remember-label">
												<input type="checkbox" name="aggrement" id="agree"><label for="agree" value="1">Dengan ini Saya menyatakan bahwa data yang saya isi diatas adalah data yang sebenar-benarnya. Apabila dikemudian hari ternyata terdapat hal-hal yang bertentangan, maka saya bersedia di tuntut sesuai dengan hukum yang berlaku dan lamaran ini dapat dibatalkan.</label>
											</p>
				 						</div>
					 				</div>
				 				</div>
				 				<div class="row mb-5">
				 					<div class="col-md-12">
				 						<br><br><br>
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
	const datepickerInit = function() {
		$('.datepicker').datepicker({
		    format: 'dd-mm-yyyy',
    		autoclose: true,
    		orientation: "bottom"
		});
	}

	$(function(){
		datepickerInit();

		$('#other-form').on('click', '.add-other', function() {
			let parentRow = $(this).closest('form').find('.other-row');
			parentRow.last().find('.chosen').chosen('destroy');

			if (parentRow.length >= 5) {
				return;
			}

			let parentEl = parentRow.last().clone();
			let index = parseInt(parentEl.data('index')) + 1;

			parentEl.find('input').val('');
			parentEl.find('.other-organizer').attr('name', `others[${index}][organizer]`);
			parentEl.find('.other-is-astra').attr('name', `others[${index}][is_astra]`);
			parentEl.find('#is-astra-yes-'+parentEl.data('index')).attr('id', 'is-astra-yes-'+index);
			parentEl.find('#is-astra-no-'+parentEl.data('index')).attr('id', 'is-astra-no-'+index);
			parentEl.find('label[for="is-astra-yes-'+parentEl.data('index')+'"]').attr('for', 'is-astra-yes-'+index);
			parentEl.find('label[for="is-astra-no-'+parentEl.data('index')+'"]').attr('for', 'is-astra-no-'+index);
			parentEl.find('.other-process').attr('name', `others[${index}][process]`);
			parentEl.find('.other-place').attr('name', `others[${index}][place]`);
			parentEl.find('.other-date').attr('name', `others[${index}][date]`);
			parentEl.find('.other-position').attr('name', `others[${index}][position]`);
			parentEl.find('.other-status').attr('name', `others[${index}][status]`);
			parentEl.attr('data-index', index);

			parentEl.appendTo('#other-form');
			$('#other-form').find('.chosen').chosen();
			datepickerInit();
		});

		$('#other-form').on('click', '.remove-other', function() {
			let parentEl = $(this).closest('form').find('.other-row');

			if(parentEl.length < 2) {
				return;
			}

			$(this).closest('.other-row').remove();
		});

		$('#disease-form').on('click', '.add-disease', function() {
			let parentRow = $(this).closest('form').find('.disease-row');
			parentRow.last().find('.chosen').chosen('destroy');

			if (parentRow.length >= 5) {
				return;
			}

			let parentEl = parentRow.last().clone();
			let index = parseInt(parentEl.data('index')) + 1;

			parentEl.find('input').val('');
			parentEl.find('.disease-name').attr('name', `diseases[${index}][name]`);
			parentEl.find('.disease-from-date').attr('name', `diseases[${index}][from_date]`);
			parentEl.find('.disease-end-date').attr('name', `diseases[${index}][end_date]`);
			parentEl.find('.disease-note').attr('name', `diseases[${index}][note]`);
			parentEl.attr('data-index', index);

			parentEl.appendTo('#disease-form');
			$('#disease-form').find('.chosen').chosen();
			datepickerInit();
		});

		$('#disease-form').on('click', '.remove-disease', function() {
			let parentEl = $(this).closest('form').find('.disease-row');

			if(parentEl.length < 2) {
				return;
			}

			$(this).closest('.disease-row').remove();
		});

		$('input[type="radio"][name="in_another_recruitment_process"]').on('change', function() {
			if ($(this).val() == '1') {
				$('.other-element').prop('disabled', false);
			} else {
				$('.other-element').prop('disabled', true);
			}
			$('#other-form').find('.chosen').chosen('destroy');
			$('#other-form').find('.chosen').chosen();
		});

		$('input[type="radio"][name="with_glasses"]').on('change', function() {
			if ($(this).val() == '1') {
				$('.minus-wrapper').show();
				$('.eye-element').prop('disabled', false);
			} else {
				$('.minus-wrapper').hide();
				$('.eye-element').prop('disabled', true);
			}
		});

		$('input[type="radio"][name="had_disease"]').on('change', function() {
			if ($(this).val() == '1') {
				$('.disease-element').prop('disabled', false);
			} else {
				$('.disease-element').prop('disabled', true);
			}
			$('#disease-form').find('.chosen').chosen('destroy');
			$('#disease-form').find('.chosen').chosen();
		});

		$('.disease-name').closest('.pf-field').on('keyup', '.chosen-search-input', function(e) {
			if (e.which == 13) {
				let v = $(this).val();
				$('.custom-option').remove();

				$('.disease-name').append('<option class="custom-option" value="'+v+'" selected>'+v+'</option>');
				$('.disease-name').trigger("chosen:updated");
				$('.chosen-container').removeClass('chosen-with-drop');
			}
		});
	});
</script>
@endpush