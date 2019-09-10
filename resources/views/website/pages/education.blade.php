@extends('website.layouts.master')
@section('title', 'Education')

@push('additional_css')
<link rel="stylesheet" type="text/css" href="{{ asset('website/css/bootstrap-datepicker.css') }}" />
@endpush

@section('pages')
@php
$primarySchool = App\Models\FormalEducation::EDU_PRIMARY_SCHOOL;
$juniorHighSchool = App\Models\FormalEducation::EDU_JUNIOR_HIGH_SCHOOL;
$seniorHighSchool = App\Models\FormalEducation::EDU_SENIOR_HIGH_SCHOOL;
$diploma = App\Models\FormalEducation::EDU_DIPLOMA;
$bachelor = App\Models\FormalEducation::EDU_BACHELOR;
$master = App\Models\FormalEducation::EDU_MASTER;
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
				 			<h3>Pendidikan Formal</h3>
				 		</div>
				 		<div class="profile-form-edit">
				 			<form id="formal-education-form">
				 				@csrf
				 				<input type="hidden" name="recaptcha_key" id="recaptcha-key">
				 				@if($jobSeeker->educationLevel->isHighSchoolForm())
				 				<div class="row no-margin-row">
				 					<div class="col-md-12">
				 						<span class="pf-title education-title"><b>SD</b></span>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Nama Sekolah
				 							<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Sekolah" name="educations[{{ $primarySchool }}][name_of_institution]" value="{{ isset($formalEducations[$primarySchool]) ? $formalEducations[$primarySchool]->name_of_institution : old('educations['.$primarySchool.'][name_of_institution]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Jurusan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Jurusan" name="educations[{{ $primarySchool }}][major]" value="{{ isset($formalEducations[$primarySchool]) ? $formalEducations[$primarySchool]->major : old('educations['.$primarySchool.'][major]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tahun Lulus
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tahun Lulus" class="year-input" name="educations[{{ $primarySchool }}][end_year]" value="{{ isset($formalEducations[$primarySchool]) ? $formalEducations[$primarySchool]->end_year : old('educations['.$primarySchool.'][end_year]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Kota
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Kota" name="educations[{{ $primarySchool }}][city]" value="{{ isset($formalEducations[$primarySchool]) ? $formalEducations[$primarySchool]->city : old('educations['.$primarySchool.'][city]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Nilai Rata-rata MTK (6 Semester)</span>
				 						<div class="pf-field">
				 							<input type="number" placeholder="Nilai MTK" name="educations[{{ $primarySchool }}][average_math_score]" value="{{ isset($formalEducations[$primarySchool]) ? $formalEducations[$primarySchool]->average_math_score : old('educations['.$primarySchool.'][average_math_score]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Nilai UN MTK</span>
				 						<div class="pf-field">
				 							<input type="number" placeholder="Nilai UN MTK" name="educations[{{ $primarySchool }}][un_math_score]" value="{{ isset($formalEducations[$primarySchool]) ? $formalEducations[$primarySchool]->un_math_score : old('educations['.$primarySchool.'][un_math_score]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Keterangan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Keterangan" name="educations[{{ $primarySchool }}][note]" value="{{ isset($formalEducations[$primarySchool]) ? $formalEducations[$primarySchool]->note : old('educations['.$primarySchool.'][note]') }}" />
				 						</div>
				 					</div>
				 				</div>
				 				<div class="row no-margin-row">
				 					<div class="col-md-12">
				 						<span class="pf-title education-title"><b>SMP</b></span>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Nama Sekolah
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Sekolah" name="educations[{{ $juniorHighSchool }}][name_of_institution]" value="{{ isset($formalEducations[$juniorHighSchool]) ? $formalEducations[$juniorHighSchool]->name_of_institution : old('educations['.$juniorHighSchool.'][name_of_institution]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Jurusan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Jurusan" name="educations[{{ $juniorHighSchool }}][major]" value="{{ isset($formalEducations[$juniorHighSchool]) ? $formalEducations[$juniorHighSchool]->major : old('educations['.$juniorHighSchool.'][major]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tahun Lulus
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tahun Lulus" class="year-input" name="educations[{{ $juniorHighSchool }}][end_year]" value="{{ isset($formalEducations[$juniorHighSchool]) ? $formalEducations[$juniorHighSchool]->end_year : old('educations['.$juniorHighSchool.'][end_year]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Kota
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Kota" name="educations[{{ $juniorHighSchool }}][city]" value="{{ isset($formalEducations[$juniorHighSchool]) ? $formalEducations[$juniorHighSchool]->city : old('educations['.$juniorHighSchool.'][city]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Nilai Rata-rata MTK (6 Semester)
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<input type="number" placeholder="Nilai MTK" name="educations[{{ $juniorHighSchool }}][average_math_score]" value="{{ isset($formalEducations[$juniorHighSchool]) ? $formalEducations[$juniorHighSchool]->average_math_score : old('educations['.$juniorHighSchool.'][average_math_score]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Nilai UN MTK
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<input type="number" placeholder="Nilai UN MTK" name="educations[{{ $juniorHighSchool }}][un_math_score]" value="{{ isset($formalEducations[$juniorHighSchool]) ? $formalEducations[$juniorHighSchool]->un_math_score : old('educations['.$juniorHighSchool.'][un_math_score]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Keterangan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Keterangan" name="educations[{{ $juniorHighSchool }}][note]" value="{{ isset($formalEducations[$juniorHighSchool]) ? $formalEducations[$juniorHighSchool]->note : old('educations['.$juniorHighSchool.'][note]') }}" />
				 						</div>
				 					</div>
				 				</div>
				 				@endif
				 				<div class="row no-margin-row">
				 					<div class="col-md-12">
				 						<span class="pf-title education-title"><b>SMA</b></span>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Nama Sekolah
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Sekolah" name="educations[{{ $seniorHighSchool }}][name_of_institution]" value="{{ isset($formalEducations[$seniorHighSchool]) ? $formalEducations[$seniorHighSchool]->name_of_institution : old('educations['.$seniorHighSchool.'][name_of_institution]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Jurusan
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Jurusan" name="educations[{{ $seniorHighSchool }}][major]" value="{{ isset($formalEducations[$seniorHighSchool]) ? $formalEducations[$seniorHighSchool]->major : old('educations['.$seniorHighSchool.'][major]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tahun Lulus
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tahun Lulus" class="year-input" name="educations[{{ $seniorHighSchool }}][end_year]" value="{{ isset($formalEducations[$seniorHighSchool]) ? $formalEducations[$seniorHighSchool]->end_year : old('educations['.$seniorHighSchool.'][end_year]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Kota
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Kota" name="educations[{{ $seniorHighSchool }}][city]" value="{{ isset($formalEducations[$seniorHighSchool]) ? $formalEducations[$seniorHighSchool]->city : old('educations['.$seniorHighSchool.'][city]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Nilai Rata-rata MTK (6 Semester)
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<input type="number" placeholder="Nilai MTK" name="educations[{{ $seniorHighSchool }}][average_math_score]" value="{{ isset($formalEducations[$seniorHighSchool]) ? $formalEducations[$seniorHighSchool]->average_math_score : old('educations['.$seniorHighSchool.'][average_math_score]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Nilai UN MTK
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<input type="number" placeholder="Nilai UN MTK" name="educations[{{ $seniorHighSchool }}][un_math_score]" value="{{ isset($formalEducations[$seniorHighSchool]) ? $formalEducations[$seniorHighSchool]->un_math_score : old('educations['.$seniorHighSchool.'][un_math_score]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Keterangan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Keterangan" name="educations[{{ $seniorHighSchool }}][note]" value="{{ isset($formalEducations[$seniorHighSchool]) ? $formalEducations[$seniorHighSchool]->note : old('educations['.$seniorHighSchool.'][note]') }}" />
				 						</div>
				 					</div>
				 				</div>
				 				@if($jobSeeker->educationLevel->isAssociateForm())
				 				<div class="row no-margin-row">
				 					<div class="col-md-12">
				 						<span class="pf-title education-title"><b>D3</b></span>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Nama Perguruan Tinggi</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Sekolah" name="educations[{{ $diploma }}][name_of_institution]" value="{{ isset($formalEducations[$diploma]) ? $formalEducations[$diploma]->name_of_institution : old('educations['.$diploma.'][name_of_institution]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Fakultas</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Fakultas" name="educations[{{ $diploma }}][faculty]" value="{{ isset($formalEducations[$diploma]) ? $formalEducations[$diploma]->faculty : old('educations['.$diploma.'][faculty]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Jurusan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Jurusan" name="educations[{{ $diploma }}][major]" value="{{ isset($formalEducations[$diploma]) ? $formalEducations[$diploma]->major : old('educations['.$diploma.'][major]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Program Studi</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Program Studi" name="educations[{{ $diploma }}][study_program]" value="{{ isset($formalEducations[$diploma]) ? $formalEducations[$diploma]->study_program : old('educations['.$diploma.'][study_program]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Masuk</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Periode Masuk" class="year-input" name="educations[{{ $diploma }}][start_year]" value="{{ isset($formalEducations[$diploma]) ? $formalEducations[$diploma]->start_year : old('educations['.$diploma.'][start_year]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Lulus</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Periode Lulus" class="year-input" name="educations[{{ $diploma }}][end_year]" value="{{ isset($formalEducations[$diploma]) ? $formalEducations[$diploma]->end_year : old('educations['.$diploma.'][end_year]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Kota</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Kota" name="educations[{{ $diploma }}][city]" value="{{ isset($formalEducations[$diploma]) ? $formalEducations[$diploma]->city : old('educations['.$diploma.'][city]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">IPK</span>
				 						<div class="pf-field">
				 							<input type="number" placeholder="IPK" name="educations[{{ $diploma }}][grade_point]" value="{{ isset($formalEducations[$diploma]) ? $formalEducations[$diploma]->grade_point : old('educations['.$diploma.'][grade_point]') }}" />
				 						</div>
				 					</div>
				 				</div>
				 				<div class="row no-margin-row">
				 					<div class="col-md-12">
				 						<span class="pf-title education-title"><b>D4/S1</b></span>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Nama Perguruan Tinggi</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Sekolah" name="educations[{{ $bachelor }}][name_of_institution]" value="{{ isset($formalEducations[$bachelor]) ? $formalEducations[$bachelor]->name_of_institution : old('educations['.$bachelor.'][name_of_institution]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Fakultas</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Fakultas" name="educations[{{ $bachelor }}][faculty]" value="{{ isset($formalEducations[$bachelor]) ? $formalEducations[$bachelor]->faculty : old('educations['.$bachelor.'][faculty]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Jurusan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Jurusan" name="educations[{{ $bachelor }}][major]" value="{{ isset($formalEducations[$bachelor]) ? $formalEducations[$bachelor]->major : old('educations['.$bachelor.'][major]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Program Studi</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Program Studi" name="educations[{{ $bachelor }}][study_program]" value="{{ isset($formalEducations[$bachelor]) ? $formalEducations[$bachelor]->study_program : old('educations['.$bachelor.'][study_program]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Masuk</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Periode Masuk" class="year-input" name="educations[{{ $bachelor }}][start_year]" value="{{ isset($formalEducations[$bachelor]) ? $formalEducations[$bachelor]->start_year : old('educations['.$bachelor.'][start_year]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Lulus</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Periode Lulus" class="year-input" name="educations[{{ $bachelor }}][end_year]" value="{{ isset($formalEducations[$bachelor]) ? $formalEducations[$bachelor]->end_year : old('educations['.$bachelor.'][end_year]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Kota</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Kota" name="educations[{{ $bachelor }}][city]" value="{{ isset($formalEducations[$bachelor]) ? $formalEducations[$bachelor]->city : old('educations['.$bachelor.'][city]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">IPK</span>
				 						<div class="pf-field">
				 							<input type="number" placeholder="IPK" name="educations[{{ $bachelor }}][grade_point]" value="{{ isset($formalEducations[$bachelor]) ? $formalEducations[$bachelor]->grade_point : old('educations['.$bachelor.'][grade_point]') }}" />
				 						</div>
				 					</div>
				 				</div>
				 				<div class="row no-margin-row">
				 					<div class="col-md-12">
				 						<span class="pf-title education-title"><b>S2</b></span>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Nama Perguruan Tinggi</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Sekolah" name="educations[{{ $master }}][name_of_institution]" value="{{ isset($formalEducations[$master]) ? $formalEducations[$master]->name_of_institution : old('educations['.$master.'][name_of_institution]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Fakultas</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Fakultas" name="educations[{{ $master }}][faculty]" value="{{ isset($formalEducations[$master]) ? $formalEducations[$master]->faculty : old('educations['.$master.'][faculty]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Jurusan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Jurusan" name="educations[{{ $master }}][major]" value="{{ isset($formalEducations[$master]) ? $formalEducations[$master]->major : old('educations['.$master.'][major]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Program Studi</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Program Studi" name="educations[{{ $master }}][study_program]" value="{{ isset($formalEducations[$master]) ? $formalEducations[$master]->study_program : old('educations['.$master.'][study_program]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Masuk</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Periode Masuk" class="year-input"name="educations[{{ $master }}][start_year]" value="{{ isset($formalEducations[$master]) ? $formalEducations[$master]->start_year : old('educations['.$master.'][start_year]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Lulus</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Periode Lulus" class="year-input"name="educations[{{ $master }}][end_year]" value="{{ isset($formalEducations[$master]) ? $formalEducations[$master]->end_year : old('educations['.$master.'][end_year]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Kota</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Kota" name="educations[{{ $master }}][city]" value="{{ isset($formalEducations[$master]) ? $formalEducations[$master]->city : old('educations['.$master.'][city]') }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">IPK</span>
				 						<div class="pf-field">
				 							<input type="number" placeholder="IPK" name="educations[{{ $master }}][grade_point]" value="{{ isset($formalEducations[$master]) ? $formalEducations[$master]->grade_point : old('educations['.$master.'][grade_point]') }}" />
				 						</div>
				 					</div>
				 				</div>
				 				@endif
				 			</form>
				 		</div>
				 		@if($jobSeeker->educationLevel->isAssociateForm())
				 		<div class="profile-title">
				 			<h3></h3>
				 		</div>
				 		<div class="profile-form-edit">
				 			<form id="education-detail-form">
				 				<div class="row">
				 					<div class="col-md-12">
				 						<span class="pf-title">Uraikan dengan singkat mengapa Anda memilih jurusan tersebut di Perguruan Tinggi
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Alasan memilih jurusan" name="reason_choose_institute">{{ $educationDetail ? $educationDetail->reason_choose_institute : old('reason_choose_institute') }}</textarea>
				 						</div>
				 					</div>
				 					<div class="col-md-12">
				 						<span class="pf-title">Sebutkan karya ilmiah yang pernah anda buat: (Skripsi, Artikel, Karya Tulis, dll)
											<sup class="text-danger" data-toggle="tooltip" title="Required">* &nbsp;</sup>
				 						</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Karya ilmiah" name="essay">{{ $educationDetail ? $educationDetail->essay : old('essay') }}</textarea>
				 						</div>
				 					</div>
				 				</div>
				 			</form>
				 		</div>
				 		@endif
				 		<div class="profile-title">
				 			<h3>Pendidikan Non Formal</h3>
				 		</div>
				 		<div class="profile-form-edit">
				 			<form id="non-formal-form">
				 				@if ($nonFormalEducations->count())
								@foreach($nonFormalEducations as $key => $value)
								<div class="row no-margin-row non-formal-row" data-index="{{ $key }}">
				 					<div class="col-md-4">
				 						<span class="pf-title">Nama Kursus / Training</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Kursus" name="non_formal_educations[{{ $key }}][training_name]" class="non-formal-course-name" value="{{ $value->training_name }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Tempat</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Tempat" name="non_formal_educations[{{ $key }}][place]" class="non-formal-place" value="{{ $value->place }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Keterangan</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Keterangan" name="non_formal_educations[{{ $key }}][note]" class="non-formal-note" value="{{ $value->note }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Dari Tanggal</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Dari Tanggal" name="non_formal_educations[{{ $key }}][start_date]" class="non-formal-from-date" value="{{ date('d-m-Y', strtotime($value->start_date)) }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Sampai Tanggal</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Sampai Tanggal" name="non_formal_educations[{{ $key }}][end_date]" class="non-formal-until-date" value="{{ date('d-m-Y', strtotime($value->end_date)) }}"  />
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
								@endforeach
				 				@else
				 				<div class="row no-margin-row non-formal-row" data-index="0">
				 					<div class="col-md-4">
				 						<span class="pf-title">Nama Kursus / Training</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Nama Kursus" name="non_formal_educations[0][training_name]" class="non-formal-course-name" />
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
				 							<input type="text" placeholder="Dari Tanggal" name="non_formal_educations[0][start_date]" class="non-formal-from-date" />
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Sampai Tanggal</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Sampai Tanggal" name="non_formal_educations[0][end_date]" class="non-formal-until-date" />
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
				 				@endif
				 			</form>
				 		</div>
				 		<div class="profile-title">
				 			<h3>Bahasa Asing Yang Dikuasai</h3>
				 		</div>
				 		<div class="profile-form-edit mb-5">
				 			<form id="foreign-lang-form">
				 				@if($languages->count())
								@foreach($languages as $key => $value)
								<div class="row no-margin-row foreign-lang-row" data-index="{{ $key }}">
				 					<div class="col-md-12">
				 						<span class="pf-title">Bahasa</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Bahasa" name="languages[{{ $key }}][language]" class="foreign-lang-language" value="{{ $value->language }}" />
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Tulisan</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
				 								<input type="Radio" name="languages[{{ $key }}][writing]" id="writing-bad-{{ $key }}" class="foreign-lang-writing" value="bad" @if($value->writing == 'bad') checked @endif><label for="writing-bad-{{ $key }}">Kurang</label>
												<input type="Radio" name="languages[{{ $key }}][writing]" id="writing-good-{{ $key }}" class="foreign-lang-writing" value="good" @if($value->writing == 'good') checked @endif><label for="writing-good-{{ $key }}">Baik</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Membaca</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
				 								<input type="Radio" name="languages[{{ $key }}][reading]" id="reading-bad-{{ $key }}" class="foreign-lang-reading" value="bad" @if($value->reading == 'bad') checked @endif><label for="reading-bad-{{ $key }}">Kurang</label>
												<input type="Radio" name="languages[{{ $key }}][reading]" id="reading-good-{{ $key }}" class="foreign-lang-reading" value="good" @if($value->reading == 'good') checked @endif><label for="reading-good-{{ $key }}">Baik</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Tata Bahasa</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
				 								<input type="Radio" name="languages[{{ $key }}][grammar]" id="grammar-bad-{{ $key }}" class="foreign-lang-grammar" value="bad" @if($value->grammar == 'bad') checked @endif><label for="grammar-bad-{{ $key }}">Kurang</label>
												<input type="Radio" name="languages[{{ $key }}][grammar]" id="grammar-good-{{ $key }}" class="foreign-lang-grammar" value="good" @if($value->grammar == 'good') checked @endif><label for="grammar-good-{{ $key }}">Baik</label>
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
								@endforeach
				 				@else
								<div class="row no-margin-row foreign-lang-row" data-index="0">
				 					<div class="col-md-12">
				 						<span class="pf-title">Bahasa</span>
				 						<div class="pf-field">
				 							<input type="text" placeholder="Bahasa" name="languages[0][language]" class="foreign-lang-language" />
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Tulisan</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
				 								<input type="Radio" name="languages[0][writing]" id="writing-bad-0" class="foreign-lang-writing" value="bad"><label for="writing-bad-0">Kurang</label>
												<input type="Radio" name="languages[0][writing]" id="writing-good-0" class="foreign-lang-writing" value="good" checked><label for="writing-good-0">Baik</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Membaca</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
				 								<input type="Radio" name="languages[0][reading]" id="reading-bad-0" class="foreign-lang-reading" value="bad"><label for="reading-bad-0">Kurang</label>
												<input type="Radio" name="languages[0][reading]" id="reading-good-0" class="foreign-lang-reading" value="good" checked><label for="reading-good-0">Baik</label>
											</p>
				 						</div>
				 					</div>
				 					<div class="col-md-3">
				 						<span class="pf-title">Tata Bahasa</span>
				 						<div class="pf-field">
				 							<p class="remember-label">
				 								<input type="Radio" name="languages[0][grammar]" id="grammar-bad-0" class="foreign-lang-grammar" value="bad"><label for="grammar-bad-0">Kurang</label>
												<input type="Radio" name="languages[0][grammar]" id="grammar-good-0" class="foreign-lang-grammar" value="good" checked><label for="grammar-good-0">Baik</label>
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
<script type="text/javascript" src="{{ asset('website/js/dynamic_page/education.min.js') }}"></script>
@endpush
