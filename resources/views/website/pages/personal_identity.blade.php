@extends('website.layouts.master')
@section('title', 'Identitas')

@section('pages')
@php
$drivingLicences = $jobSeeker->driving_licences;
@endphp
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
				 			<h3>Identitas Pribadi</h3>
				 			<div class="upload-img-bar">
				 				<span class="round"><img src="{{ $jobSeeker->photo ? route('profiles.personal-identity.getphoto') : asset('website/images/avatar/avatar.jpg') }}" class="photo-img" id="photo-img" alt="" /><i id="deleted-photo-icon">x</i></span>
				 				<div class="upload-info">
				 					<h4>Foto Terbaru</h4>
				 					<a href="#" title="" id="browse-photo">Browse</a>
				 					<span>Maksimal 1MB, Format : jpg, jpeg, png</span>
				 				</div>
				 			</div>
				 		</div>
				 		<div class="profile-form-edit mb-5">
				 			<form id="personal-identity-form">
				 				@csrf
				 				@method('PUT')
				 				<input type="hidden" name="recaptcha_key" id="recaptcha-key">
				 				<input type="file" name="photo" id="photo" class="d-none">
				 				<div class="row">
				 					<div class="col-md-6">
				 						<span class="pf-title">Nama Lengkap
				 							<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup><i class="fa fa-info-circle text-warning" data-toggle="tooltip" title="Diisi sesuai ijazah terakhir"></i>
				 						</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Lengkap" name="name" value="{{ $jobSeeker->name ?? old('name') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Nomer KTP
				 							<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nomer KTP" name="identity_number" value="{{ $jobSeeker->identity_number ?? old('identity_number') }}" class="number" maxlength="16" />
				 						</div>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Email
				 							<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<input type="text" class="disabled" placeholder="Email" disabled="disabled" name="email" value="{{ $jobSeeker->email ?? old('email') }}" />
				 							<small class="text-danger">Email belum terkonfirmasi. <a href="{{ route('verification.resend') }}" class="text-info">Kirim ulang email konfirmasi</a></small>
				 						</div>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Tempat Lahir
				 							<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tempat Lahir" name="place_of_birth" value="{{ $jobSeeker->place_of_birth ?? old('place_of_birth') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Tanggal Lahir
				 							<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tanggal Lahir" name="date_of_birth" value="{{ $jobSeeker->date_of_birth ? date('d-m-Y', strtotime($jobSeeker->date_of_birth)) : old('date_of_birth')  }}" class="datepicker" />
				 						</div>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Jenis Kelamin
				 							<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
												<input type="Radio" name="gender" id="man" value="{{ App\Models\JobSeeker::GENDER_MAN }}" @if($jobSeeker->gender === App\Models\JobSeeker::GENDER_MAN || old('gender') === App\Models\JobSeeker::GENDER_MAN) checked @endif><label for="man">Laki-Laki</label>
												<input type="Radio" name="gender" id="women" value="{{ App\Models\JobSeeker::GENDER_WOMAN }}" @if($jobSeeker->gender === App\Models\JobSeeker::GENDER_WOMAN || old('gender') === App\Models\JobSeeker::GENDER_WOMAN) checked @endif><label for="women">Perempuan</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Alamat Sesuai KTP
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Alamat KTP" name="address">{{ $jobSeeker->address ?? old('address') }}</textarea>
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Provinsi KTP
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<select data-placeholder="Provinsi" class="chosen" id="province-address" data-child="#district-address" data-child-url="{{ route('ajax.districts.get') }}" data-parent-param="province" name="province_address_id">
												<option value="{{ $jobSeeker->addressVillage ? $jobSeeker->addressVillage->subDistrict->district->province->id : (old('province_address_id') ?? null) }}"></option>
											</select>
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Kabupaten KTP
				 							<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<select data-placeholder="Kabupaten" class="chosen" id="district-address" data-child="#sub-district-address" data-child-url="{{ route('ajax.sub-districts.get') }}" data-parent-param="district" name="district_address_id">
												<option value="{{ $jobSeeker->addressVillage ? $jobSeeker->addressVillage->subDistrict->district->id : (old('district_address_id') ?? null) }}"></option>
											</select>
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Kecamatan KTP
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<select data-placeholder="Kecamatan" class="chosen" id="sub-district-address" data-child="#village-address" data-child-url="{{ route('ajax.villages.get') }}" data-parent-param="sub_district" name="sub_district_address_id">
												<option value="{{ $jobSeeker->addressVillage ? $jobSeeker->addressVillage->subDistrict->id : (old('sub_district_address_id') ?? null) }}"></option>
											</select>
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Kelurahan KTP
				 							<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<select data-placeholder="Kelurahan" class="chosen" id="village-address" name="address_village_id">
												<option value="{{ $jobSeeker->addressVillage ? $jobSeeker->addressVillage->id : (old('address_village_id') ?? null) }}"></option>
											</select>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Nomer Telepon</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nomer Telepon" class="phone-number" name="address_telephone_number" value="{{ $jobSeeker->address_telephone_number ?? old('address_telephone_number') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Nomer Telepon Orang Tua</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nomer Telepon Orang Tua" class="phone-number" name="parent_telephone_number" value="{{ $jobSeeker->parent_telephone_number ?? old('parent_telephone_number') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Alamat Domisili
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Alamat Domisili" name="domicile">{{ $jobSeeker->domicile ?? old('domicile') }}</textarea>
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Provinsi Domisili
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<select data-placeholder="Provinsi" class="chosen" id="province-domicile" name="province_domicile_id" data-child="#district-domicile" data-child-url="{{ route('ajax.districts.get') }}" data-parent-param="province">
												<option value="{{ $jobSeeker->domicileVillage ? $jobSeeker->domicileVillage->subDistrict->district->province->id : (old('province_domicile_id') ?? null) }}"></option>
											</select>
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Kabupaten Domisili
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<select data-placeholder="Kabupaten" class="chosen" id="district-domicile" data-child="#sub-district-domicile" data-child-url="{{ route('ajax.sub-districts.get') }}" data-parent-param="district" name="district_domicile_id">
												<option value="{{ $jobSeeker->domicileVillage ? $jobSeeker->domicileVillage->subDistrict->district->id : (old('district_domicile_id') ?? null) }}"></option>
											</select>
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Kecamatan Domisili
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<select data-placeholder="Kecamatan" name="sub_district_domicile_id" class="chosen" id="sub-district-domicile" data-child="#village-domicile" data-child-url="{{ route('ajax.villages.get') }}" data-parent-param="sub_district">
												<option value="{{ $jobSeeker->domicileVillage ? $jobSeeker->domicileVillage->subDistrict->id : (old('sub_district_domicile_id') ?? null) }}"></option>
											</select>
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Kelurahan Domisili
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<select data-placeholder="Kelurahan" name="domicile_village_id" class="chosen" id="village-domicile">
												<option value="{{ $jobSeeker->domicileVillage ? $jobSeeker->domicileVillage->id : (old('domicile_village_id') ?? null) }}"></option>
											</select>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Nomer Telepon Domisili</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nomer Telepon Domisili" name="domicile_telephone_number" class="phone-number" value="{{ $jobSeeker->domicile_telephone_number ?? old('domicile_telephone_number') }}" />
				 						</div>
				 					</div>
				 					<div class="col-sm-3 sim-wrapper">
				 						<span class="pf-title">SIM Yang Dimiliki</span>
			 							<div class="pf-field">
				 							<p class="remember-label">
												<input type="checkbox" class="sim-select" name="driving_licences[0][type]" id="sim-a" data-id="#sim-a-number" value="A" @if(isset($drivingLicences['A'])) checked @endif><label for="sim-a">SIM A</label>
											</p>
				 						</div>
				 						<div class="pf-field">
				 							<p class="remember-label">
												<input type="checkbox" class="sim-select" name="driving_licences[1][type]" id="sim-b" data-id="#sim-b-number" value="B" @if(isset($drivingLicences['B'])) checked @endif><label for="sim-b">SIM B</label>
											</p>
				 						</div>
				 						<div class="pf-field">
				 							<p class="remember-label">
												<input type="checkbox" class="sim-select" name="driving_licences[2][type]" id="sim-c" data-id="#sim-c-number" value="C" @if(isset($drivingLicences['C'])) checked @endif><label for="sim-c">SIM C</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-sm-9 sim-wrapper">
				 						<span class="pf-title">Nomer SIM</span>
			 							<div class="pf-field">
				 							<input type="text" id="sim-a-number" placeholder="Nomer SIM A" name="driving_licences[0][value]" class="number" maxlength="16" @if(isset($drivingLicences['A'])) value="{{ $drivingLicences['A'] }}" @else disabled @endif />
				 						</div>
				 						<div class="pf-field">
				 							<input type="text" id="sim-b-number" placeholder="Nomer SIM B" name="driving_licences[1][value]" class="number" maxlength="16" @if(isset($drivingLicences['B'])) value="{{ $drivingLicences['B'] }}" @else disabled @endif />
				 						</div>
				 						<div class="pf-field">
				 							<input type="text" id="sim-c-number" placeholder="Nomer SIM C" name="driving_licences[2][value]" class="number" maxlength="16" @if(isset($drivingLicences['C'])) value="{{ $drivingLicences['C'] }}" @else disabled @endif />
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Nomer Handphone
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nomer Handphone" class="phone-number" name="handphone_number" value="{{ $jobSeeker->handphone_number ?? old('handphone_number') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Golongan Darah
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
												<input type="Radio" name="blood_type" id="a" value="A" @if($jobSeeker->blood_type === 'A'  || old('blood_type') === 'A') checked @endif><label for="a">A</label>
												<input type="Radio" name="blood_type" id="b" value="B" @if($jobSeeker->blood_type === 'B'  || old('blood_type') === 'B') checked @endif><label for="b">B</label>
												<input type="Radio" name="blood_type" id="ab" value="AB" @if($jobSeeker->blood_type === 'AB'  || old('blood_type') === 'AB') checked @endif><label for="ab">AB</label>
												<input type="Radio" name="blood_type" id="o" value="O" @if($jobSeeker->blood_type === 'O'  || old('blood_type') === 'O') checked @endif><label for="o">O</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Agama
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
												<input type="Radio" name="religion" id="islam" value="{{ App\Models\JobSeeker::RELIGION_ISLAM }}" @if($jobSeeker->religion === App\Models\JobSeeker::RELIGION_ISLAM || old('religion') === App\Models\JobSeeker::RELIGION_ISLAM) checked @endif><label for="islam">Islam</label>
												<input type="Radio" name="religion" id="hindu" value="{{ App\Models\JobSeeker::RELIGION_HINDU }}" @if($jobSeeker->religion === App\Models\JobSeeker::RELIGION_HINDU || old('religion') === App\Models\JobSeeker::RELIGION_HINDU) checked @endif><label for="hindu">Hindu</label>
												<input type="Radio" name="religion" id="budha" value="{{ App\Models\JobSeeker::RELIGION_BUDHA }}" @if($jobSeeker->religion === App\Models\JobSeeker::RELIGION_BUDHA || old('religion') === App\Models\JobSeeker::RELIGION_BUDHA) checked @endif><label for="budha">Budha</label>
												<input type="Radio" name="religion" id="katolik" value="{{ App\Models\JobSeeker::RELIGION_KATOLIK }}" @if($jobSeeker->religion === App\Models\JobSeeker::RELIGION_KATOLIK || old('religion') === App\Models\JobSeeker::RELIGION_KATOLIK) checked @endif><label for="katolik">Katolik</label>
												<input type="Radio" name="religion" id="protestan" value="{{ App\Models\JobSeeker::RELIGION_PROTESTAN }}" @if($jobSeeker->religion === App\Models\JobSeeker::RELIGION_PROTESTAN || old('religion') === App\Models\JobSeeker::RELIGION_PROTESTAN) checked @endif><label for="protestan">Protestan</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Tinggi Badan (cm)
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tinggi Badan" name="height" value="{{ $jobSeeker->height ?? old('height') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Berat Badan (kg)
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Berat Badan" name="weight" value="{{ $jobSeeker->weight ?? old('weight') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Ukuran Baju
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
												<input type="Radio" name="clothes_size" id="m" value="M" @if($jobSeeker->clothes_size === 'M'  || old('clothes_size') === 'M') checked @endif><label for="m">M</label>
												<input type="Radio" name="clothes_size" id="l" value="L" @if($jobSeeker->clothes_size === 'L'  || old('clothes_size') === 'L') checked @endif><label for="l">L</label>
												<input type="Radio" name="clothes_size" id="xl" value="XL" @if($jobSeeker->clothes_size === 'XL'  || old('clothes_size') === 'XL') checked @endif><label for="xl">XL</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Ukuran Celana (28 - 35)
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
											<input type="text" placeholder="Ukuran celana" name="pants_size" class="number" maxlength="2" value="{{ $jobSeeker->pants_size ?? old('pants_size') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Ukuran Sepatu (37 - 48)
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
											<input type="text" name="shoe_size" placeholder="Ukuran Sepatu" class="number" maxlength="2" value="{{ $jobSeeker->shoe_size ?? old('shoe_size') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<br>
				 						<p class="google-term">This site is protected by reCAPTCHA and the Google
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
<script type="text/javascript" src="{{ asset('website/js/dynamic_page/personal-identity.min.js') }}"></script>
@endpush