@extends('website.layouts.master')
@section('title', 'Education')

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
				 			<h3>Pendidikan Formal</h3>
				 		</div>
				 		<div class="profile-form-edit">
				 			<form>
				 				<div class="row no-margin-row">
				 					<div class="col-md-12">
				 						<span class="pf-title education-title"><b>SD</b></span>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Nama Sekolah</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Sekolah" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Jurusan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Jurusan" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tahun Lulus</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tahun Lulus" class="year-input" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Kota</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Kota" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Nilai Rata-rata MTK (6 Semester)</span>
				 						<div class="pf-field">
				 							<input type="number" placeholder="Nilai MTK" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Nilai UN MTK</span>
				 						<div class="pf-field">
				 							<input type="number" placeholder="Nilai UN MTK" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Keterangan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Keterangan" />
				 						</div>
				 					</div>
				 				</div>
				 				<div class="row no-margin-row">
				 					<div class="col-md-12">
				 						<span class="pf-title education-title"><b>SMP</b></span>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Nama Sekolah</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Sekolah" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Jurusan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Jurusan" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tahun Lulus</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tahun Lulus" class="year-input" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Kota</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Kota" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Nilai Rata-rata MTK (6 Semester)</span>
				 						<div class="pf-field">
				 							<input type="number" placeholder="Nilai MTK" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Nilai UN MTK</span>
				 						<div class="pf-field">
				 							<input type="number" placeholder="Nilai UN MTK" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Keterangan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Keterangan" />
				 						</div>
				 					</div>
				 				</div>
				 				<div class="row no-margin-row">
				 					<div class="col-md-12">
				 						<span class="pf-title education-title"><b>SMA</b></span>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Nama Sekolah</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Sekolah" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Jurusan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Jurusan" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tahun Lulus</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tahun Lulus" class="year-input" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Kota</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Kota" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Nilai Rata-rata MTK (6 Semester)</span>
				 						<div class="pf-field">
				 							<input type="number" placeholder="Nilai MTK" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Nilai UN MTK</span>
				 						<div class="pf-field">
				 							<input type="number" placeholder="Nilai UN MTK" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Keterangan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Keterangan" />
				 						</div>
				 					</div>
				 				</div>
				 				<div class="row no-margin-row">
				 					<div class="col-md-12">
				 						<span class="pf-title education-title"><b>D3</b></span>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Nama Perguruan Tinggi</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Sekolah" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Fakultas</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Fakultas" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Jurusan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Jurusan" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Program Studi</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Program Studi" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Masuk</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Periode Masuk" class="month-year-input-in" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Lulus</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Periode Lulus" class="month-year-input-out" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Kota</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Kota" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">IPK</span>
				 						<div class="pf-field">
				 							<input type="number" placeholder="IPK" />
				 						</div>
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
				 						<span class="pf-title">Uraikan dengan singkat mengapa Anda memilih jurusan tersebut di Perguruan Tinggi</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Alasan memilih jurusan"></textarea>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Sebutkan karya ilmiah yang pernah anda buat: (Skripsi, Artikel, Karya Tulis, dll)</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Karya ilmiah"></textarea>
				 						</div>
				 					</div>
				 				</div>
				 			</form>
				 		</div>
				 		<div class="profile-title">
				 			<h3>Pendidikan Non Formal</h3>
				 		</div>
				 		<div class="profile-form-edit">
				 			<form id="non-formal-form">
				 				<div class="row no-margin-row non-formal-row" data-index="0">
				 					<div class="col-md-4">
				 						<span class="pf-title">Nama Kursus / Training</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Kursus" name="non_formal_educations[0][course_name]" class="non-formal-course-name" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tempat</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tempat" name="non_formal_educations[0][place]" class="non-formal-place" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Keterangan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Keterangan" name="non_formal_educations[0][note]" class="non-formal-note" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Dari Tanggal</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Dari Tanggal" name="non_formal_educations[0][from_date]" class="non-formal-from-date" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Sampai Tanggal</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Sampai Tanggal" name="non_formal_educations[0][until_date]" class="non-formal-until-date" />
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
				 		</div>
				 		<div class="profile-title">
				 			<h3>Bahasa Asing Yang Dikuasai</h3>
				 		</div>
				 		<div class="profile-form-edit mb-5">
				 			<form id="foreign-lang-form">
				 				<div class="row no-margin-row foreign-lang-row" data-index="0">
				 					<div class="col-md-12">
				 						<span class="pf-title">Bahasa</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Bahasa" name="foreign_langs[0][language]" class="foreign-lang-language" />
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Tulisan</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
				 								<input type="Radio" name="foreign_langs[0][writing]" id="writing-bad-0" class="foreign-lang-writing"><label for="writing-bad-0">Kurang</label>
												<input type="Radio" name="foreign_langs[0][writing]" id="writing-good-0" class="foreign-lang-writing" checked><label for="writing-good-0">Baik</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Membaca</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
				 								<input type="Radio" name="foreign_langs[0][reading]" id="reading-bad-0" class="foreign-lang-reading"><label for="reading-bad-0">Kurang</label>
												<input type="Radio" name="foreign_langs[0][reading]" id="reading-good-0" class="foreign-lang-reading" checked><label for="reading-good-0">Baik</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Tata Bahasa</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
				 								<input type="Radio" name="foreign_langs[0][grammar]" id="grammar-bad-0" class="foreign-lang-grammar"><label for="grammar-bad-0">Kurang</label>
												<input type="Radio" name="foreign_langs[0][grammar]" id="grammar-good-0" class="foreign-lang-grammar" checked><label for="grammar-good-0">Baik</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-md-3">
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
	const initRangeMonthDatePicker = function() {
		const rangeDatePickerClasses = [
			{
				firstDatePicker : ".month-year-input-in",
				lastDatePicker : ".month-year-input-out",
				format : "mm-yyyy",
				viewMode : "months"
			},
			{
				firstDatePicker : ".non-formal-from-date",
				lastDatePicker : ".non-formal-until-date",
				format : "dd-mm-yyyy",
				viewMode : "dates"
			},
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
		initRangeMonthDatePicker();

		$('#non-formal-form').on('click', '.add-non-formal', function() {
			let parentRow = $(this).closest('form').find('.non-formal-row');

			if (parentRow.length >= 5) {
				return;
			}

			let parentEl = parentRow.last().clone();
			let index = parseInt(parentEl.data('index')) + 1;
			parentEl.find('input').val('');
			parentEl.find('.non-formal-course-name').attr('name', `non_formal_educations[${index}][course_name]`);
			parentEl.find('.non-formal-place').attr('name', `non_formal_educations[${index}][place]`);
			parentEl.find('.non-formal-note').attr('name', `non_formal_educations[${index}][note]`);
			parentEl.find('.non-formal-from-date').attr('name', `non_formal_educations[${index}][from_date]`);
			parentEl.find('.non-formal-until-date').attr('name', `non_formal_educations[${index}][until_date]`);
			parentEl.attr('data-index', index);

			parentEl.appendTo('#non-formal-form');

			initRangeMonthDatePicker();
		});

		$('#non-formal-form').on('click', '.remove-non-formal', function() {
			let parentEl = $(this).closest('form').find('.non-formal-row');

			if(parentEl.length < 2) {
				return;
			}

			$(this).closest('.non-formal-row').remove();
		});

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

		$('#foreign-lang-form').on('click', '.add-non-formal', function() {
			let parentRow = $(this).closest('form').find('.foreign-lang-row');

			if (parentRow.length >= 5) {
				return;
			}

			let parentEl = parentRow.last().clone();
			let sourceId = parentEl.data('index');
			let index = parseInt(sourceId) + 1;
			parentEl.find('input').val('');
			parentEl
				.find('.foreign-lang-language')
				.attr('name', `foreign-langs[${index}][language]`);
			parentEl
				.find('.foreign-lang-writing')
				.attr('name', `foreign-langs[${index}][writing]`);
			parentEl
				.find('.foreign-lang-reading')
				.attr('name', `foreign-langs[${index}][reading]`);
			parentEl
				.find('.foreign-lang-grammar')
				.attr('name', `foreign-langs[${index}][grammar]`);
			parentEl
				.attr('data-index', index);

			parentEl.find(`#writing-bad-${sourceId}`).attr('id', `writing-bad-${index}`);
			parentEl.find(`#reading-bad-${sourceId}`).attr('id', `reading-bad-${index}`);
			parentEl.find(`#grammar-bad-${sourceId}`).attr('id', `grammar-bad-${index}`);

			parentEl.find(`label[for="writing-bad-${sourceId}"]`).attr('for', `writing-bad-${index}`);
			parentEl.find(`label[for="reading-bad-${sourceId}"]`).attr('for', `reading-bad-${index}`);
			parentEl.find(`label[for="grammar-bad-${sourceId}"]`).attr('for', `grammar-bad-${index}`);

			parentEl.find(`#writing-good-${sourceId}`).attr('id', `writing-good-${index}`);
			parentEl.find(`#reading-good-${sourceId}`).attr('id', `reading-good-${index}`);
			parentEl.find(`#grammar-good-${sourceId}`).attr('id', `grammar-good-${index}`);

			parentEl.find(`label[for="writing-good-${sourceId}"]`).attr('for', `writing-good-${index}`);
			parentEl.find(`label[for="reading-good-${sourceId}"]`).attr('for', `reading-good-${index}`);
			parentEl.find(`label[for="grammar-good-${sourceId}"]`).attr('for', `grammar-good-${index}`);

			parentEl.appendTo('#foreign-lang-form');
		});

		$('#foreign-lang-form').on('click', '.remove-non-formal', function() {
			let parentEl = $(this).closest('form').find('.foreign-lang-row');

			if(parentEl.length < 2) {
				return;
			}

			$(this).closest('.foreign-lang-row').remove();
		});

		$('.year-input').datepicker({
		    format: 'yyyy',
		    viewMode: "years",
    		minViewMode: "years",
    		autoclose: true,
    		orientation: "bottom"
		});
	});
</script>
@endpush