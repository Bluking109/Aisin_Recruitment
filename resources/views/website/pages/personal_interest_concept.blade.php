@extends('website.layouts.master')
@section('title', 'Minat dan Konsep Pribadi')

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
				 			<h3>Minat dan Konsep Pribadi</h3>
				 		</div>
				 		<div class="profile-form-edit">
				 			<form>
				 				<div class="row">
				 					{{-- D3 / S1 --}}
				 					<div class="col-md-12">
				 						<span class="pf-title">Uraikan apa yang menjadi cita-cita Anda ?</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Cita - cita"></textarea>
				 						</div>
				 					</div>
				 					{{-- SMA --}}
				 					<div class="col-md-12">
				 						<span class="pf-title">Keahlian apa yang Anda miliki ?</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Keahlian"></textarea>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Apa yang mendorong Anda ingin bekerja ?</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Motivasi bekerja"></textarea>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Mengapa Anda ingin bekerja di Perusahaan Kami ? </span>
				 						<div class="pf-field">
				 							<textarea placeholder="Alasan ingin bekerja di AIIA"></textarea>
				 						</div>
				 					</div>
				 					{{-- D3 / S1 --}}
				 					<div class="col-md-12">
				 						<span class="pf-title">Sebutkan fasilitas lainnya yang Anda harapkan !</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Fasilitas lain yang diharapkan"></textarea>
				 						</div>
				 					</div>
				 					{{-- Ketika sma col-md-4 ganti menjadi col-md-6 --}}
				 					<div class="col-md-4">
				 						<span class="pf-title">Kapan Anda dapat mulai bekerja ?</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tanggal dapat mulai bekerja" name="work_experiences[0][join_date]" class="work-experience-join-date datepicker" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Sebutkan gaji yang Anda inginkan !</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Gaji yang diharapkan" name="" class="work-experience-salary thousand" />
				 						</div>
				 					</div>
				 					{{-- D3 / S1 --}}
				 					<div class="col-md-4">
				 						<span class="pf-title">Bersedia Anda ditempatkan diluar daerah ?</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
												<input type="Radio" name="willing" id="willing" checked><label for="willing">Bersedia</label>
												<input type="Radio" name="willing" id="not_willing"><label for="not_willing">Tidak Bersedia</label>
											</p>
				 						</div>
				 					</div>
				 					{{-- D3 / S1 --}}
				 					<div class="col-md-6">
				 						<span class="pf-title">Lingkungan yang anda senangi</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
												<input type="Radio" name="working_environtment_like" id="working-env-field-like" value="field"><label for="working-env-field-like">Lapangan</label>
												<input type="Radio" name="working_environtment_like" id="working-env-office-like" value="office"><label for="working-env-office-like">Kantor</label>
												<input type="Radio" name="working_environtment_like" id="working-env-factory-like" value="factory" checked><label for="working-env-factory-like">Pabrik</label>
												<input type="Radio" name="working_environtment_like" id="working-env-other-like" value="other"><label for="working-env-other-like">Lain - Lain</label>
											</p>
											<input type="text" placeholder="Lingkungan yang disenangi" name="" class="working-env-other-like-input hidden-display" disabled />
				 						</div>
				 					</div>
				 					{{-- D3 / S1 --}}
				 					<div class="col-md-6">
				 						<span class="pf-title">Lingkungan yang tidak anda senangi</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
												<input type="Radio" name="working_environtment_dislike" id="working-env-field-dislike" checked value="field"><label for="working-env-field-dislike">Lapangan</label>
												<input type="Radio" name="working_environtment_dislike" id="working-env-office-dislike" value="office"><label for="working-env-office-dislike">Kantor</label>
												<input type="Radio" name="working_environtment_dislike" id="working-env-factory-dislike" value="factory" checked><label for="working-env-factory-dislike">Pabrik</label>
												<input type="Radio" name="working_environtment_dislike" id="working-env-other-dislike" value="other"><label for="working-env-other-dislike">Lain - Lain</label>
											</p>
											<input type="text" placeholder="Lingkungan yang tidak disenangi" name="" class="working-env-other-dislike-input hidden-display" disabled />
				 						</div>
				 					</div>
				 					{{-- D3 / S1 --}}
				 					<div class="col-md-12">
				 						<span class="pf-title">Sebutkan tipe orang yang anda senangi !</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Tipe orang yang disenangi"></textarea>
				 						</div>
				 					</div>
				 					{{-- D3 / S1 --}}
				 					<div class="col-md-12">
				 						<span class="pf-title">Terhadap hal apa Anda sulit mengambil keputusan ?</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Hal apa yang membuat sulit mengambil keputusan"></textarea>
				 						</div>
				 					</div>
				 					{{-- SMA --}}
				 					<div class="col-md-12">
				 						<span class="pf-title">Apakah ada kenalan, kerabat atau keluarga Anda yang bekerja di PT. Aisin Indonesia Automotive ? Dan apa hubungan Anda dengan kenalan tersebut?</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Kenalan, kerabat atau keluarga"></textarea>
				 						</div>
				 					</div>

				 					<div class="col-md-12">
				 						<span class="pf-title">Pilih 3 jenis bidang pekerjaan dibawah ini yang sesuai dengan prioritas minat Anda ! (Urutkan)</span>
				 						<div class="pf-field">
				 							<select data-placeholder="Allow In Search" class="chosen-multi" multiple>
												<option>Accounting</option>
												<option>Finance</option>
												<option>Purchasing - Exim</option>
												<option>New Project & Localization</option>
												<option>Human Resource Department</option>
												<option>Industrial Relation & Legal</option>
												<option>General Affair</option>
												<option>Interpreter - Translator Bahasa Jepang</option>
												<option>Production</option>
												<option>Production Planning & Inventory Control (PPIC)</option>
												<option>Production Research (Kaizen) / OMD</option>
												<option>Quality Assurance</option>
												<option>Engineering</option>
												<option>Maintenance</option>
												<option>Information Technology Development (ITD) </option>
												<option>Management System</option>
											</select>
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
<script>
	$(function(){
		$('.datepicker').datepicker({
		    format: 'dd-mm-yyyy',
    		autoclose: true,
    		orientation: "bottom"
		});

		$('input[type="radio"][name="working_environtment_like"]').on('change', function() {
			if ($(this).val() === 'other') {
				$('.working-env-other-like-input').prop('disabled', false).fadeIn();
			} else {
				$('.working-env-other-like-input').prop('disabled', true).fadeOut();
			}
		});

		$('input[type="radio"][name="working_environtment_dislike"]').on('change', function() {
			if ($(this).val() === 'other') {
				$('.working-env-other-dislike-input').prop('disabled', false).fadeIn();
			} else {
				$('.working-env-other-dislike-input').prop('disabled', true).fadeOut();
			}
		});

		$(".chosen-multi").chosen({max_selected_options: 3});
	});
</script>
@endpush