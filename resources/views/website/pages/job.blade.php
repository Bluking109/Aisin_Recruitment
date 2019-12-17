@extends('website.layouts.master')
@section('title', $job->position->name . ' - ' . $job->section->name)

@section('pages')
@php
$jobSeeker = auth()->guard('job_seekers')->user();
$alreadyApplied = null;

if ($jobSeeker) {
	$alreadyApplied = $jobSeeker->applications()->where('job_vacancy_id', $job->id)->first();
}
@endphp
<section class="overlape sub-header mt-126">
	<div class="block no-padding">
		<div class="container fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="inner-header">
						<h3>PT. AISIN INDONESIA AUTOMOTIVE</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="block">
		<div class="container">
			<div class="row">
			 	<div class="col-lg-12 column">
			 		<div class="job-single-sec style3">
			 			<div class="job-head-wide">
			 				<div class="row">
			 					<div class="col-lg-8">
			 						<div class="job-single-head3">
						 				<div class="job-thumb"> <img src="{{ asset('admin/images/vacancies/' . $job->image) }}" alt="" /></div>
						 				<div class="job-single-info3">
						 					<h3>{{ $job->position->name . ' - ' . $job->section->name }}</h3>
						 					<span><i class="la la-map-marker"></i>Karawang - Jawa Barat</span>
						 					{{-- <span class="job-is ft">Full time</span> --}}
						 					<ul class="tags-jobs">
							 					<li><i class="fa fa-users"></i> {{ $job->applications->count() }} Pelamar</li>
							 					<li><i class="fa fa-calendar"></i> Batas Lamaran: {{ date('d M Y', strtotime($job->close_date)) }}</li>
							 				</ul>
						 				</div>
						 			</div><!-- Job Head -->
			 					</div>
			 					<div class="col-lg-4">
			 						@if(!$alreadyApplied)
			 						<a class="apply-thisjob" href="#" title="" id="apply-job"><i class="la la-paper-plane"></i>Lamar Pekerjaan</a>
			 						@else
									<span class="already-apply-text">Sudah Dilamar</span>
			 						@endif
			 						<form class="d-none" id="form-sumbit-vacancy" method="post" action="{{ route('job-vacancies.apply', ['slug' => $job->slug]) }}">
			 							@csrf
			 							<button id="btn-sumbit-vacancy"></button>
			 						</form>
			 					</div>
			 				</div>
			 			</div>
			 			<div class="job-wide-devider">
						 	<div class="row">
						 		<div class="col-lg-8 column">
						 			<div class="job-details">
						 				<h3>Deskripsi Pekerjaan</h3>
						 				<div>
						 					{!! $job->descriptions !!}
						 				</div>
						 				<h3>Persyaratan</h3>
						 				<div>
						 					{!! $job->requirements !!}
						 				</div>
						 			</div>
						 		</div>
						 		<div class="col-lg-4 column">
						 			<div class="job-overview">
							 			<ul>
							 				<li><i class="fa fa-mars-double"></i><h3>Jenis Kelamin</h3><span>{{ $job->gender_label }}</span></li>
							 				<li><i class="fa fa-shield"></i><h3>Batas Usia</h3><span>{{ $job->max_age }} Tahun</span></li>
							 				<li><i class="fa fa-graduation-cap"></i><h3>Pendidikan</h3><span>{{ $job->educationLevel->name }}</span></li>
							 				@if($job->educationLevel->hierarchy > 3)
							 				<li><i class="fa fa-book"></i><h3>Min IPK</h3><span>{{ $job->min_gpa }}</span></li>
							 				@else
											<li><i class="fa fa-book"></i><h3>Nilai Rata-Rata MTK</h3><span>{{ $job->min_math_score }}</span></li>
							 				@endif
							 			</ul>
							 		</div><!-- Job Overview -->
						 		</div>
						 	</div>
						 </div>
				 	</div>
			 	</div>
			</div>
		</div>
	</div>
</section>
@endsection

@push('additional_js')
<script type="text/javascript">
	$(function() {
		$('#apply-job').on('click', function(e) {
			e.preventDefault();
			@if(auth()->guard('job_seekers')->check())
			$('#form-sumbit-vacancy').submit();
			@else
			$('.signin-popup').trigger('click');
			@endif
		});

		@if (session('error'))
		Toast.fire({
		    type: 'error',
		    title: "{{ session('error') }}"
		});
		@endif

		@if (session('success'))
		Toast.fire({
		    type: 'success',
		    title: "{{ session('success') }}"
		});
		@endif
	});
</script>
@endpush