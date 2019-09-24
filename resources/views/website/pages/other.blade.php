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
				 			<h3>Lain-Lain</h3>
				 		</div>
				 		<div class="profile-form-edit">
				 			<form id="other-form">
				 				@csrf
				 				@method('PUT')
				 				<input type="hidden" name="recaptcha_key" id="recaptcha-key">
				 				<div class="row" data-index="0">
				 					<div class="col-md-12">
				 						<span class="pf-title">Hobi / Kegemaran Anda</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Hobi dan Kegemaran" name="hobby">{{ $other->hobby ?? old('hobby') }}</textarea>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Bagaimana cara Anda mengisi waktu luang ?</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Cara mengisi waktu luang" name="fill_spare_time">{{ $other->fill_spare_time ?? old('fill_spare_time') }}</textarea>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Sebutkan minimal 3 kelebihan sifat Anda (Strong Point) !</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Kelebihan" name="strong_point">{{ $other->strong_point ?? old('strong_point') }}</textarea>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Sebutkan minimal 3 kelemahan sifat Anda (Weak Point) !</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Kelemahan" name="weak_point">{{ $other->weak_point ?? old('weak_point') }}</textarea>
				 						</div>
				 					</div>
				 					@if($jobSeeker->educationLevel->isAssociateForm())
				 					@php
		 							$rightEyeType = '';
		 							$leftEyeType = '';
		 							$rightEye = '';
		 							$leftEye = '';

		 							if ($other) {
		 								if ($other->right_eye) {
		 									$rightEyeType = json_decode($other->right_eye, true)['type'] ?? '';
		 									$rightEye = json_decode($other->right_eye, true)['size'] ?? '';
		 								}

		 								if ($other->left_eye) {
		 									$leftEyeType = json_decode($other->left_eye, true)['type'] ?? '';
		 									$leftEye = json_decode($other->left_eye, true)['size'] ?? '';
		 								}
		 							}

		 							@endphp
				 					<div class="col-md-4">
				 						<p class="remember-label">
				 							<span class="pf-title">Apakah Anda menggunakan kacamata ?</span>
			 								<input type="Radio" name="use_glasses" id="with-glasses-yes" class="foreign-lang-writing" @if($other) @if($other->use_glasses == '1') checked @endif @endif value="1"><label for="with-glasses-yes">Ya</label>
											<input type="Radio" name="use_glasses" id="with-glasses-no" class="foreign-lang-writing" @if($other) @if($other->use_glasses == '0') checked @endif @else checked @endif value="0"><label for="with-glasses-no">Tidak</label>
										</p>
				 					</div>
				 					<div class="col-md-2 @if($other) @if($other->use_glasses == '0') hidden-display @endif @else hidden-display @endif minus-wrapper">
				 						<span class="pf-title">Mata Kanan</span>
				 						<div class="pf-field">
				 							<select data-placeholder="Status" class="chosen right-eye eye-element" name="right_eye_type" @if($other) @if($other->use_glasses == '0') disabled @endif @else disabled @endif>
				 								<option value="normal" @if($rightEyeType == 'normal') selected @endif>Normal</option>
												<option value="minus" @if($rightEyeType == 'minus') selected @endif>Minus</option>
												<option value="plus" @if($rightEyeType == 'plus') selected @endif>Plus</option>
												<option value="silinder" @if($rightEyeType == 'silinder') selected @endif>Silinder</option>
											</select>
				 						</div>
				 					</div>
				 					<div class="col-md-2 @if($other) @if($other->use_glasses == '0') hidden-display @endif @else hidden-display @endif minus-wrapper">
				 						<span class="pf-title">&nbsp;</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Besaran" name="right_eye" class="eye-element number" @if($other) @if($other->use_glasses == '0') disabled @endif @else disabled @endif value="{{ $rightEye }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-2 @if($other) @if($other->use_glasses == '0') hidden-display @endif @else hidden-display @endif minus-wrapper">
				 						<span class="pf-title">Mata Kiri</span>
				 						<div class="pf-field">
				 							<select data-placeholder="Status" class="chosen right-eye eye-element" name="left_eye_type" @if($other) @if($other->use_glasses == '0') disabled @endif @else disabled @endif>
				 								<option value="normal" @if($leftEyeType == 'normal') selected @endif>Normal</option>
												<option value="minus" @if($leftEyeType == 'minus') selected @endif>Minus</option>
												<option value="plus" @if($leftEyeType == 'plus') selected @endif>Plus</option>
												<option value="silinder" @if($leftEyeType == 'silinder') selected @endif>Silinder</option>
											</select>
				 						</div>
				 					</div>
				 					<div class="col-md-2 @if($other) @if($other->use_glasses == '0') hidden-display @endif @else hidden-display @endif minus-wrapper">
				 						<span class="pf-title">&nbsp;</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Besaran" name="left_eye" class="eye-element number" @if($other) @if($other->use_glasses == '0') disabled @endif @else disabled @endif value="{{ $leftEye }}" />
				 						</div>
				 					</div>
				 					@endif
				 				</div>
				 			</form>
				 		</div>
				 		<div class="profile-form-edit">
				 			<form id="other-recruitment-form">
				 				<div class="row">
				 					<div class="col-md-12">
				 						<p class="remember-label">
				 							<span class="pf-title">Pernah atau sedang mengikuti proses recruitment di Perusahaan lain?</span>
			 								<input type="Radio" name="in_another_recruitment_process" id="follow-yes" class="foreign-lang-writing" value="1" @if($otherRecruitments->count()) checked @endif><label for="follow-yes">Ya</label>
											<input type="Radio" name="in_another_recruitment_process" id="follow-no" class="foreign-lang-writing" value="0" @if(!$otherRecruitments->count()) checked @endif><label for="follow-no">Tidak</label>
										</p>
				 					</div>
				 				</div>
				 				@if(!$otherRecruitments->count())
				 				<div class="row no-margin-row other-row" data-index="0">
				 					<div class="col-md-4">
				 						<span class="pf-title">Penyelenggara</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Penyelenggara" name="other_recruitments[0][organizer]" class="other-organizer other-element" disabled />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Astra Group</span>
				 						<p class="remember-label">
				 							<input type="Radio" name="other_recruitments[0][is_astra]" id="is-astra-yes-0" class="other-is-astra other-element" value="1" disabled><label for="is-astra-yes-0">Ya</label>
											<input type="Radio" name="other_recruitments[0][is_astra]" id="is-astra-no-0" class="other-is-astra other-element" value="0" checked disabled><label for="is-astra-no-0">Bukan</label>
				 						</p>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Proses</span>
				 						<div class="pf-field">
				 							<select data-placeholder="Proses Recruitment" class="chosen other-element other-process" name="other_recruitments[0][process]" disabled>
				 								@foreach(App\Models\OtherRecruitment::getProcessLabel() as $key => $value)
												<option value="{{ $key }}">{{ $value }}</option>
												@endforeach
											</select>
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tempat</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tempat" name="other_recruitments[0][place]" class="other-element other-place" disabled />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tanggal</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tanggal" name="other_recruitments[0][date]" class="other-element datepicker other-date" disabled />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Posisi</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Posisi" name="other_recruitments[0][position]" class="other-element other-position" disabled />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Status</span>
				 						<div class="pf-field">
				 							<select data-placeholder="Status" class="chosen other-element other-status" name="other_recruitments[0][status]" disabled>
												@foreach(App\Models\OtherRecruitment::getStatusLabel() as $key => $value)
												<option value="{{ $key }}">{{ $value }}</option>
												@endforeach
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
				 				@else
								@foreach($otherRecruitments as $key => $value)
								<div class="row no-margin-row other-row" data-index="{{ $key }}">
				 					<div class="col-md-4">
				 						<span class="pf-title">Penyelenggara</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Penyelenggara" name="other_recruitments[{{ $key }}][organizer]" class="other-organizer other-element" value="{{ $value->organizer }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Astra Group</span>
				 						<p class="remember-label">
				 							<input type="Radio" name="other_recruitments[{{ $key }}][is_astra]" id="is-astra-yes-{{ $key }}" class="other-is-astra other-element" value="1" @if($value->is_astra == '1') checked @endif ><label for="is-astra-yes-{{ $key }}">Ya</label>
											<input type="Radio" name="other_recruitments[{{ $key }}][is_astra]" id="is-astra-no-{{ $key }}" class="other-is-astra other-element" value="0" @if($value->is_astra == '0') checked @endif><label for="is-astra-no-{{ $key }}">Bukan</label>
				 						</p>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Proses</span>
				 						<div class="pf-field">
				 							<select data-placeholder="Proses Recruitment" class="chosen other-element other-process" name="other_recruitments[{{ $key }}][process]">
				 								@foreach(App\Models\OtherRecruitment::getProcessLabel() as $k => $val)
												<option value="{{ $k }}" @if($val == $value->process) selected @endif>{{ $val }}</option>
												@endforeach
											</select>
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tempat</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tempat" name="other_recruitments[{{ $key }}][place]" class="other-element other-place" value="{{ $value->place }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tanggal</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tanggal" name="other_recruitments[{{ $key }}][date]" class="other-element datepicker other-date" value="{{ date('d-m-Y', strtotime($value->date)) }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Posisi</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Posisi" name="other_recruitments[{{ $key }}][position]" class="other-element other-position" value="{{ $value->position }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Status</span>
				 						<div class="pf-field">
				 							<select data-placeholder="Status" class="chosen other-element other-status" name="other_recruitments[{{ $key }}][status]">
												@foreach(App\Models\OtherRecruitment::getStatusLabel() as $k => $val)
												<option value="{{ $k }}" @if($val == $value->status) selected @endif>{{ $val }}</option>
												@endforeach
											</select>
				 						</div>
				 					</div>
				 					<div class="col-md-8">
				 						<span class="pf-title"></span>
				 						<div class="pf-field pt-2">
				 							<button type="button" class="btn btn-primary remove-other add-remove-btn mr-2 other-element"><i class="fa fa-trash"></i></button>
				 							<button type="button" class="btn btn-primary add-other add-remove-btn mr-2 other-element" data-toggle="tooltip" title="Maximal 3"><i class="fa fa-plus"></i></button>
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
				 		<div class="profile-form-edit">
				 			<form id="disease-form">
				 				<div class="row">
				 					<div class="col-md-12">
				 						<p class="remember-label">
				 							<span class="pf-title">Pernahkah Anda menderita penyakit yang lama sembuh ?</span>
			 								<input type="Radio" name="had_disease" id="had-disease-yes" class="foreign-lang-writing" value="1" @if($diseases->count()) checked @endif ><label for="had-disease-yes">Ya</label>
											<input type="Radio" name="had_disease" id="had-disease-no" class="foreign-lang-writing" value="0" @if(!$diseases->count()) checked @endif><label for="had-disease-no">Tidak</label>
										</p>
				 					</div>
				 				</div>
				 				@if(!$diseases->count())
				 				<div class="row no-margin-row disease-row" data-index="0">
				 					<div class="col-md-4">
				 						<span class="pf-title">Nama Penyakit</span>
				 						<div class="pf-field">
				 							<select data-placeholder="Nama Penyakit" class="chosen disease-name disease-element" name="diseases[0][name]" disabled>
												@foreach(config('aiia.diseases') as $k => $v)
												<option value="{{ $v }}">{{ $v }}</option>
												@endforeach
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
				 				@else
								@foreach($diseases as $key => $value)
								<div class="row no-margin-row disease-row" data-index="{{ $key }}">
				 					<div class="col-md-4">
				 						<span class="pf-title">Nama Penyakit</span>
				 						<div class="pf-field">
				 							<select data-placeholder="Nama Penyakit" class="chosen disease-name disease-element" name="diseases[{{ $key }}][name]">
												@foreach(config('aiia.diseases') as $k => $v)
												<option value="{{ $v }}" @if($v == $value->name) selected @endif >{{ $v }}</option>
												@endforeach
											</select>
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Dari Kapan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Dari Kapan" name="diseases[{{ $key }}][from_date]" class="disease-element disease-from-date" value="{{ date('d-m-Y', strtotime($value->from_date)) }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Sampai Kapan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Sampai Kapan" name="diseases[{{ $key }}][end_date]" class="disease-element disease-end-date" value="{{ date('d-m-Y', strtotime($value->end_date)) }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-8">
				 						<span class="pf-title">Keterangan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Keterangan" name="diseases[{{ $key }}][note]" class="disease-element disease-note" value="{{ $value->note }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title"></span>
				 						<div class="pf-field pt-2">
				 							<button type="button" class="btn btn-primary remove-disease add-remove-btn mr-2 disease-element"><i class="fa fa-trash"></i></button>
				 							<button type="button" class="btn btn-primary add-disease add-remove-btn mr-2 disease-element" data-toggle="tooltip" title="Maximal 3"><i class="fa fa-plus"></i></button>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<hr>
				 					</div>
				 				</div>
								@endforeach
				 				@endif
				 			</form>
				 			<form id="agreement-form">
				 				<div class="row mt-5">
				 					<div class="col-sm-12">
					 					<div class="pf-field">
				 							<p class="remember-label">
												<input type="checkbox" name="agreement" id="agree" @if($other) @if($other->agreement == '1') checked @endif @endif value="1" ><label for="agree">Dengan ini Saya menyatakan bahwa data yang saya isi diatas adalah data yang sebenar-benarnya. Apabila dikemudian hari ternyata terdapat hal-hal yang bertentangan, maka saya bersedia di tuntut sesuai dengan hukum yang berlaku dan lamaran ini dapat dibatalkan.</label>
											</p>
				 						</div>
					 				</div>
				 				</div>
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
<script src="{{ asset('website/js/dynamic_page/other.min.js') }}" type="text/javascript"></script>
@endpush