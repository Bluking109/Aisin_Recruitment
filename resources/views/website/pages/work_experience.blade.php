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
				 				<div class="row no-margin-row work-experience-row" data-index="0">
				 					<div class="col-md-4">
				 						<span class="pf-title">Nama Perusahaan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Perusahaan" name="work_experiences[0][company_name]" class="work-experience-company-name" />
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
				 							<input type="text" placeholder="Gaji" name="work_experiences[0][salary]" class="work-experience-salary cleave" />
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
				 					{{-- Hanya D3 / S1 --}}
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
				 							<input type="text" placeholder="Jumlah Bawahan Anda" name="work_experiences[0][subordinates_total]" class="work-experience-subordinate-total" />
				 						</div>
				 					</div>
				 					{{-- Batas Hanya D3 / S1 --}}
				 					<div class="col-md-8">
				 						<span class="pf-title">Alasan Pindah</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Alasan Pindah" name="work_experiences[0][reason_out]" class="work-experience-reason-out"></textarea>
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
				 			</form>
				 		</div>
			 			<div class="profile-title">
				 			<h3></h3>
				 		</div>
				 		<div class="profile-form-edit">
				 			<form>
				 				<div class="row">
				 					<div class="col-md-12">
				 						<span class="pf-title">Berikan gambaran singkat mengenai jabatan-jabatan di atas !</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Gambaran singkat mengenai jabatan"></textarea>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Masalah penting apa saja yang pernah anda hadapi, dan bagaimana mengatasinya ?</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Msalah dan cara mengatasinya"></textarea>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Ceritakan pandangan / kesan anda terhadap perusahaan tersebut !</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Pandangan dan kesan terhadap perusahaan"></textarea>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Pernahkan anda melakukan pembaharuan atau perubahan di perusahaan tersebut ?</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Pembaharuan dan perubahan pada perusahaan"></textarea>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Siapakah yang mendorong Anda hingga sampai pada taraf kemajuan seperti sekarang ?</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Siapa yang mendorong Anda"></textarea>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Bagaimana bila Anda menghadapi persoalan dalam pekerjaan dan harus mengambil keputusan ?</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Karya ilmiah"></textarea>
				 						</div>
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
<script src="{{ asset('website/js/cleave.min.js') }}" type="text/javascript"></script>
<script>
	const datePickerInit = function() {
		$('.datepicker').datepicker({
		    format: 'dd-mm-yyyy',
    		autoclose: true,
    		orientation: "bottom"
		});
	}

	const cleaveJsInit = function() {
		$('.cleave').each(function() {
			new Cleave(this, {
			    numeral: true,
			    numeralThousandsGroupStyle: 'thousand'
			});
		});
	}

	$(function(){
		datePickerInit();
		cleaveJsInit();

		$('#work-experience-form').on('click', '.add-work-experience', function() {
			let parentRow = $(this).closest('form').find('.work-experience-row');

			if (parentRow.length >= 4) {
				return;
			}

			let parentEl = parentRow.last().clone();
			let index = parseInt(parentEl.data('index')) + 1;

			parentEl.find('input').val('');
			parentEl.find('.work-experience-company-name').attr('name', `work_experiences[${index}][company_name]`);
			parentEl.find('.work-experience-position').attr('name', `work_experiences[${index}][position]`);
			parentEl.find('.work-experience-salary').attr('name', `work_experiences[${index}][salary]`);
			parentEl.find('.work-experience-join-date').attr('name', `work_experiences[${index}][join_date]`);
			parentEl.find('.work-experience-join-date').attr('name', `work_experiences[${index}][end_date]`);
			parentEl.find('.work-experience-join-date').attr('name', `work_experiences[${index}][reason_out]`);

			// Hanya D3 / S1
			parentEl.find('.work-experience-boss-name').attr('name', `work_experiences[${index}][boss_name]`);
			parentEl.find('.work-experience-boss-position').attr('name', `work_experiences[${index}][boss_position]`);
			parentEl.find('.work-experience-subordinate-total').attr('name', `work_experiences[${index}][subordinates_total]`);

			parentEl.attr('data-index', index);

			parentEl.appendTo('#work-experience-form');

			datePickerInit();
			cleaveJsInit();
		});

		$('#work-experience-form').on('click', '.remove-work-experience', function() {
			let parentEl = $(this).closest('form').find('.work-experience-row');

			if(parentEl.length < 2) {
				return;
			}

			$(this).closest('.work-experience-row').remove();
		});
	});
</script>
@endpush