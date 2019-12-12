@extends('website.layouts.master')
@section('title', 'Minat dan Konsep Pribadi')

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
				 			<form id="interest-concept-form">
				 				@csrf
				 				@method('PUT')
				 				<input type="hidden" name="recaptcha_key" id="recaptcha-key">
				 				<input type="file" name="photo" id="photo" class="d-none">
				 				<div class="row">
				 					@if($jobSeeker->educationLevel->isDiplomaForm())
				 					<div class="col-md-12">
				 						<span class="pf-title">Uraikan apa yang menjadi cita-cita Anda ?
				 							<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Cita - cita" name="future_goals" maxlength="500">{{ $interest->future_goals ?? old('future_goals') }}</textarea>
				 						</div>
				 					</div>
				 					@endif
				 					@if($jobSeeker->educationLevel->isHighSchoolForm())
				 					<div class="col-md-12">
				 						<span class="pf-title">Keahlian apa yang Anda miliki ?
				 							<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Keahlian" name="expertise" maxlength="500">{{ $interest->expertise ?? old('expertise') }}</textarea>
				 						</div>
				 					</div>
				 					@endif
				 					<div class="col-md-12">
				 						<span class="pf-title">Apa yang mendorong Anda ingin bekerja ?
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Motivasi bekerja" name="working_motivation" maxlength="500">{{ $interest->working_motivation ?? old('working_motivation') }}</textarea>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Mengapa Anda ingin bekerja di Perusahaan Kami ?
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Alasan ingin bekerja di AIIA" name="working_reason" maxlength="500">{{ $interest->working_reason ?? old('working_reason') }}</textarea>
				 						</div>
				 					</div>
				 					@if($jobSeeker->educationLevel->isDiplomaForm())
				 					<div class="col-md-12">
				 						<span class="pf-title">Sebutkan fasilitas lainnya yang Anda harapkan !
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Fasilitas lain yang diharapkan" name="expected_facility" maxlength="500">{{ $interest->expected_facility ?? old('expected_facility') }}</textarea>
				 						</div>
				 					</div>
				 					@endif
				 					<div class="col-md-4">
				 						<span class="pf-title">Kapan Anda dapat mulai bekerja ?
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tanggal dapat mulai bekerja" name="join_date" class="datepicker" value="{{ $interest ? date('d-m-Y', strtotime($interest->join_date)) : old('join_date') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Sebutkan gaji yang Anda inginkan !
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Gaji yang diharapkan" name="expected_salary" class="work-experience-salary thousand" value="{{ $interest->expected_salary ?? old('expected_salary') }}" />
				 						</div>
				 					</div>
				 					@if($jobSeeker->educationLevel->isDiplomaForm())
				 					<div class="col-md-4">
				 						<span class="pf-title">Bersedia Anda ditempatkan diluar daerah ?
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
												<input type="Radio" name="place_outside" id="willing" checked value="1" @if($interest) @if($interest->place_outside === App\Models\InterestConcept::PLACE_OUTSIDE_YES) checked @endif @else checked @endif ><label for="willing">Bersedia</label>
												<input type="Radio" name="place_outside" id="not_willing" value="0" @if($interest) @if($interest->place_outside === App\Models\InterestConcept::PLACE_OUTSIDE_NO) checked @endif @endif ><label for="not_willing">Tidak Bersedia</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Lingkungan yang anda senangi
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<p class="remember-label no-float">
				 								@foreach(config('aiia.working_environments') as $key => $value)
												<input type="Radio" name="favored_environment" id="working-env-{{ $value }}" value="{{ $value }}"
												@if($interest)
													@if(strtolower($interest->favored_environment) == strtolower($value))
													checked
													@endif
												@else
													@if($key == 0)
													checked
													@endif
												@endif><label for="working-env-{{ $value }}">{{ ucwords($value) }}</label>
												@endforeach
												<input type="Radio" name="favored_environment" id="working-env-other-like" value="other" @if($interest) @if(!in_array($interest->favored_environment, config('aiia.working_environments'))) checked @endif @endif><label for="working-env-other-like">Lain - Lain</label>
											</p>
											<input type="text" placeholder="Lingkungan yang disenangi" name="favored_environment_other" class="working-env-other-like-input
											@if($interest) @if(in_array($interest->favored_environment, config('aiia.working_environments'))) hidden-display @endif @else hidden-display @endif"
											@if($interest)
												@if(in_array($interest->favored_environment, config('aiia.working_environments')))
													disabled
												@endif
												@if(!in_array($interest->favored_environment, config('aiia.working_environments')))
													value="{{ $interest->favored_environment }}"
												@endif
											@else
											disabled
											@endif />
				 						</div>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Lingkungan yang tidak anda senangi
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<p class="remember-label no-float">
												@foreach(config('aiia.working_environments') as $key => $value)
												<input type="Radio" name="unfavored_environment" id="working-env-dislike-{{ $value }}" value="{{ $value }}"
												@if($interest)
													@if(strtolower($interest->unfavored_environment) == strtolower($value))
													checked
													@endif
												@else
													@if($key == 0)
													checked
													@endif
												@endif><label for="working-env-dislike-{{ $value }}">{{ ucwords($value) }}</label>
												@endforeach

												<input type="radio" name="unfavored_environment" id="working-env-other-dislike" value="other" @if($interest) @if(!in_array($interest->unfavored_environment, config('aiia.working_environments'))) checked @endif @endif>
												<label for="working-env-other-dislike">Lain - Lain</label>
											</p>
											<input type="text" placeholder="Lingkungan yang disenangi" name="unfavored_environment_other" class="working-env-other-dislike-input
											@if($interest) @if(in_array($interest->unfavored_environment, config('aiia.working_environments'))) hidden-display @endif @else hidden-display @endif"
											@if($interest)
												@if(in_array($interest->unfavored_environment, config('aiia.working_environments')))
													disabled
												@endif
												@if(!in_array($interest->unfavored_environment, config('aiia.working_environments')))
													value="{{ $interest->unfavored_environment }}"
												@endif
											@else
												disabled
											@endif
											/>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Sebutkan tipe orang yang anda senangi !
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Tipe orang yang disenangi" name="like_people" maxlength="500">{{ $interest->like_people ?? old('like_people') }}</textarea>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Terhadap hal apa Anda sulit mengambil keputusan ?
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Hal apa yang membuat sulit mengambil keputusan" name="dificult_decisions" maxlength="500">{{ $interest->dificult_decisions ?? old('dificult_decisions') }}</textarea>
				 						</div>
				 					</div>
				 					@endif
				 					<div class="col-md-12">
				 						<span class="pf-title">Pilih 3 jenis bidang pekerjaan dibawah ini yang sesuai dengan prioritas minat Anda ! (Urutkan)
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							@php
											// ambil dari data
											$fields = $interest->field_of_works ?? '[]';
											$fields = json_decode($fields, true);

											// untuk mengatasi urutan array
											$sections = array_diff(config('aiia.sections'), $fields);
											@endphp
				 							<select data-placeholder="Allow In Search" class="chosen-multi" name="field_of_works[]" multiple>
				 								@foreach($fields as $value)
												<option name="{{ $value }}" selected>{{ $value }}</option>
				 								@endforeach
												@foreach($sections as $value)
												<option name="{{ $value }}">{{ $value }}</option>
												@endforeach
											</select>
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
<script src="{{ asset('website/js/dynamic_page/interest-concept.min.js') }}" type="text/javascript"></script>
@endpush