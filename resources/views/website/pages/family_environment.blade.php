@extends('website.layouts.master')
@section('title', 'Lingkungan Keluarga')

@section('pages')
@php
$single = App\Models\MaritalStatus::STATUS_SINGLE;
$engaged = App\Models\MaritalStatus::STATUS_ENGAGED;
$married = App\Models\MaritalStatus::STATUS_MARRIED;
$divorced = App\Models\MaritalStatus::STATUS_DIVORCED;

$partnerMan = App\Models\Partner::GENDER_MAN;
$partnerWoman = App\Models\Partner::GENDER_WOMAN;

$childMan = App\Models\Child::GENDER_MAN;
$childWoman = App\Models\Child::GENDER_WOMAN;

$siblingMan = App\Models\Sibling::GENDER_MAN;
$siblingWoman = App\Models\Sibling::GENDER_WOMAN;
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
				 			<h3>Status Pernikahan</h3>
				 		</div>
				 		<div class="profile-form-edit">
				 			<form id="marital-status-form">
				 				@csrf
				 				<input type="hidden" name="recaptcha_key" id="recaptcha-key">
				 				<div class="row no-margin-row">
				 					<div class="col-md-12">
				 						<span class="pf-title education-title"><b>Data Sesuai KTP</b></span>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Status</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
				 								<input type="Radio" name="marital_status_ktp" id="ktp-marital-status-single" value="{{ $single }}" @if($maritalStatus) @if($maritalStatus->status_ktp == $single) checked @endif @else checked @endif>
				 								<label for="ktp-marital-status-single">Single</label>
												<input type="Radio" name="marital_status_ktp" id="ktp-marital-status-engagement" value="{{ $engaged }}" @if($maritalStatus) @if($maritalStatus->status_ktp == $engaged) checked @endif @endif>
												<label for="ktp-marital-status-engagement">Tunangan</label>
												<input type="Radio" name="marital_status_ktp" id="ktp-marital-status-married" value="{{ $married }}" @if($maritalStatus) @if($maritalStatus->status_ktp == $married) checked @endif @endif>
												<label for="ktp-marital-status-married" value="">Menikah</label>
												<input type="Radio" name="marital_status_ktp" id="ktp-marital-status-divorced" value="{{ $divorced }}" @if($maritalStatus) @if($maritalStatus->status_ktp == $divorced) checked @endif @endif>
												<label for="ktp-marital-status-divorced">Bercerai</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Sejak Tanggal</span>
				 						<div class="pf-field">
				 							@php
				 							$dateKtp = '';
				 							if ($maritalStatus) {
				 								if ($maritalStatus->date_ktp) {
				 									$dateKtp = date('d-m-Y', strtotime($maritalStatus->date_ktp));
				 								}
				 							} else {
				 								$dateKtp = old('marital_status_date_ktp');
				 							}
				 							@endphp
				 							<input type="text" placeholder="Sejak Tanggal" name="marital_status_date_ktp" class="datepicker" value="{{ $dateKtp }}" />
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
				 								<input type="Radio" name="marital_status_actual" value="{{ $single }}" id="actual-marital-status-single" @if($maritalStatus) @if($maritalStatus->status_actual == $single) checked @endif @else checked @endif><label for="actual-marital-status-single">Single</label>
												<input type="Radio" name="marital_status_actual" value="{{ $engaged }}" id="actual-marital-status-engagement" @if($maritalStatus) @if($maritalStatus->status_actual == $engaged) checked @endif @endif><label for="actual-marital-status-engagement">Tunangan</label>
												<input type="Radio" name="marital_status_actual" id="actual-marital-status-married" @if($maritalStatus) @if($maritalStatus->status_actual == $married) checked @endif @endif value="{{ $married }}"><label for="actual-marital-status-married">Menikah</label>
												<input type="Radio" name="marital_status_actual" id="actual-marital-status-divorced" @if($maritalStatus) @if($maritalStatus->status_actual == $divorced) checked @endif @endif value="{{ $divorced }}"><label for="actual-marital-status-divorced">Bercerai</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-md-6">
				 						<span class="pf-title">Sejak Tanggal</span>
				 						<div class="pf-field">
				 							@php
				 							$dateActual = '';
				 							if ($maritalStatus) {
				 								if ($maritalStatus->date_actual) {
				 									$dateActual = date('d-m-Y', strtotime($maritalStatus->date_actual));
				 								}
				 							} else {
				 								$dateActual = old('marital_status_date_ktp');
				 							}
				 							@endphp
				 							<input type="text" placeholder="Sejak Tanggal" name="marital_status_date_actual" class="datepicker" value="{{ $dateActual }}" />
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
				 							<input type="text" placeholder="Nama Istri / Suami" name="partner_name" value="{{ $partner ? $partner->name : old('partner_name') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tempat Lahir</span>
				 						<div class="pf-field">
											<input type="text" placeholder="Tempat Lahir" name="partner_place_of_birth" value="{{ $partner ? $partner->place_of_birth : old('partner_place_of_birth') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tanggal Lahir</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tanggal Lahir" name="partner_date_of_birth" class="datepicker" value="{{ $partner ? date('d-m-Y', strtotime($partner->date_of_birth)) : old('partner_date_of_birth') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Jenis Kelamin</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
				 								<input type="Radio" name="partner_gender" id="partner-gender-man" value="{{ $partnerMan }}" @if($partner) @if($partner->gender == $partnerMan) checked @endif @else checked @endif><label for="partner-gender-man">Laki-Laki</label>
												<input type="Radio" name="partner_gender" id="partner-gender-women" value="{{ $partnerMan }}" @if($partner) @if($partner->gender == $partnerMan) checked @endif @endif><label for="partner-gender-women">Perempuan</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Pendidikan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Pendidikan" name="partner_last_education" value="{{ $partner ? $partner->last_education : old('partner_last_education') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Pekerjaan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Pekerjaan" name="partner_job" value="{{ $partner ? $partner->job : old('partner_job') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<hr>
				 					</div>
				 				</div>
				 			</form>
				 			<form id="children-form">
				 				@if($children->count())
				 				@foreach($children as $key => $child)
								<div class="row no-margin-row child-row" data-index="{{ $key }}">
				 					<div class="col-md-12">
				 						<span class="pf-title child-label">Nama Anak Ke-{{ $key+1 }}</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Anak Ke-{{ $key+1 }}" name="children[{{ $key }}][name]" class="child-name" value="{{ $child->name }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tempat Lahir</span>
				 						<div class="pf-field">
											<input type="text" placeholder="Tempat Lahir" name="children[{{ $key }}][place_of_birth]" class="child-place-of-birth" value="{{ $child->place_of_birth }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tanggal Lahir</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tanggal Lahir" name="children[{{ $key }}][date_of_birth]" class="datepicker child-date-of-birth" value="{{ date('d-m-Y', strtotime($child->date_of_birth)) }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Jenis Kelamin</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
				 								<input type="Radio" name="children[{{ $key }}][gender]" id="child-gender-man-{{ $key }}" class="child-gender" @if($child->gender == $childMan) checked @endif value="{{ $childMan }}"><label for="child-gender-man-{{ $key }}">Laki-Laki</label>
												<input type="Radio" name="children[{{ $key }}][gender]" id="child-gender-women-{{ $key }}" class="child-gender" @if($child->gender == $childWoman) checked @endif value="{{ $childWoman }}"><label for="child-gender-women-{{ $key }}">Perempuan</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Pendidikan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Pendidikan" name="children[{{ $key }}][last_education]" class="child-education" value="{{ $child->last_education }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Pekerjaan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Pekerjaan" name="children[{{ $key }}][job]" class="child-job" value="{{ $child->job }}" />
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
				 				@endforeach
				 				@else
				 				<div class="row no-margin-row child-row" data-index="0">
				 					<div class="col-md-12">
				 						<span class="pf-title child-label">Nama Anak Ke-1</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Anak Ke-1" name="children[0][name]" class="child-name" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tempat Lahir</span>
				 						<div class="pf-field">
											<input type="text" placeholder="Tempat Lahir" name="children[0][place_of_birth]" class="child-place-of-birth" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tanggal Lahir</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tanggal Lahir" name="children[0][date_of_birth]" class="datepicker child-date-of-birth" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Jenis Kelamin</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
				 								<input type="Radio" name="children[0][gender]" id="child-gender-man-0" class="child-gender" checked value="{{ $childMan }}"><label for="child-gender-man-0">Laki-Laki</label>
												<input type="Radio" name="children[0][gender]" id="child-gender-women-0" class="child-gender" value="{{ $childWoman }}"><label for="child-gender-women-0">Perempuan</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Pendidikan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Pendidikan" name="children[0][last_education]" class="child-education" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Pekerjaan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Pekerjaan" name="children[0][job]" class="child-job" />
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
				 				@endif
				 			</form>
				 		</div>
				 		<div class="profile-title">
				 			<h3>Susunan Keluarga : Ayah, Ibu, Saudara Kandung (urutkan)</h3>
				 		</div>
				 		<div class="profile-form-edit mb-5">
				 			<form id="parent-form">
				 				<div class="row no-margin-row parent-row">
				 					<div class="col-md-12">
				 						<span class="pf-title">Nama Ayah
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Ayah" name="father_name" value="{{ $father ? $father->name : old('father_name') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Tempat Lahir
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
											<input type="text" placeholder="Tempat Lahir" name="father_place_of_birth" value="{{ $father ? $father->place_of_birth : old('father_place_of_birth') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Tanggal Lahir
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tanggal Lahir" name="father_date_of_birth" class="datepicker" value="{{ $father ? date('d-m-Y', strtotime($father->date_of_birth)) : old('father_date_of_birth') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Pendidikan
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Pendidikan" name="father_last_education" value="{{ $father ? $father->last_education : old('father_last_education') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Pekerjaan
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Pekerjaan" name="father_job" value="{{ $father ? $father->job : old('father_job') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<hr>
				 					</div>
				 				</div>
				 				<div class="row no-margin-row parent-row">
				 					<div class="col-md-12">
				 						<span class="pf-title">Nama Ibu
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Ibu" name="mother_name" value="{{ $mother ? $mother->name : old('mother_name') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Tempat Lahir
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
											<input type="text" placeholder="Tempat Lahir" name="mother_place_of_birth" value="{{ $mother ? $mother->place_of_birth : old('mother_place_of_birth') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Tanggal Lahir
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tanggal Lahir" name="mother_date_of_birth" class="datepicker" value="{{ $mother ? date('d-m-Y', strtotime($mother->date_of_birth)) : old('mother_date_of_birth') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Pendidikan
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Pendidikan" name="mother_last_education" value="{{ $mother ? $mother->last_education : old('mother_last_education') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Pekerjaan
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Pekerjaan" name="mother_job" value="{{ $mother ? $mother->job : old('mother_job') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<hr>
				 					</div>
				 				</div>
				 			</form>
				 			<form id="siblings-form">
				 				@if($siblings->count())
								@foreach($siblings as $key => $sibling)
								<div class="row no-margin-row sibling-row" data-index="{{ $key }}">
				 					<div class="col-md-12">
				 						<span class="pf-title sibling-label">Nama Saudara Ke-{{ $key + 1 }}</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Saudara Ke-{{ $key + 1 }}" name="siblings[{{ $key }}][name]" class="sibling-name" value="{{ $sibling->name }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tempat Lahir</span>
				 						<div class="pf-field">
											<input type="text" placeholder="Tempat Lahir" name="siblings[{{ $key }}][place_of_birth]" class="sibling-place-of-birth" value="{{ $sibling->place_of_birth }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tanggal Lahir</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tanggal Lahir" name="siblings[{{ $key }}][date_of_birth]" class="datepicker sibling-date-of-birth" value="{{ date('d-m-Y', strtotime($sibling->date_of_birth)) }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Jenis Kelamin</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
				 								<input type="Radio" name="siblings[{{ $key }}][gender]" id="sibling-gender-man-{{ $key }}" class="sibling-gender" @if($sibling->gender == $siblingMan) checked @endif value="{{ $siblingMan }}"><label for="sibling-gender-man-{{ $key }}">Laki-Laki</label>
												<input type="Radio" name="siblings[{{ $key }}][gender]" id="sibling-gender-women-{{ $key }}" class="sibling-gender" @if($sibling->gender == $siblingWoman) checked @endif value="{{ $siblingWoman }}"><label for="sibling-gender-women-{{ $key }}">Perempuan</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Pendidikan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Pendidikan" name="siblings[{{ $key }}][last_education]" class="sibling-education" value="{{ $sibling->last_education }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Pekerjaan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Pekerjaan" name="siblings[{{ $key }}][job]" class="sibling-job" value="{{ $sibling->job }}" />
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
								@endforeach
				 				@else
				 				<div class="row no-margin-row sibling-row" data-index="0">
				 					<div class="col-md-12">
				 						<span class="pf-title sibling-label">Nama Saudara Ke-1</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Saudara Ke-1" name="siblings[0][name]" class="sibling-name" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tempat Lahir</span>
				 						<div class="pf-field">
											<input type="text" placeholder="Tempat Lahir" name="siblings[0][place_of_birth]" class="sibling-place-of-birth" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tanggal Lahir</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tanggal Lahir" name="siblings[0][date_of_birth]" class="datepicker sibling-date-of-birth" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Jenis Kelamin</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
				 								<input type="Radio" name="siblings[0][gender]" id="sibling-gender-man-0" class="sibling-gender" value="{{ $siblingMan }}"><label for="sibling-gender-man-0">Laki-Laki</label>
												<input type="Radio" name="siblings[0][gender]" id="sibling-gender-women-0" class="sibling-gender" value="{{ $siblingWoman }}" checked><label for="sibling-gender-women-0">Perempuan</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Pendidikan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Pendidikan" name="siblings[0][last_education]" class="sibling-education" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Pekerjaan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Pekerjaan" name="siblings[0][job]" class="sibling-job" />
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
				 				@endif
				 			</form>
				 			<form>
				 				<div class="row">
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
<script src="{{ asset('website/js/dynamic_page/family.min.js') }}" type="text/javascript"></script>
@endpush