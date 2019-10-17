@extends('website.layouts.master')
@section('title', 'ITD Staff')

@section('pages')
<section class="overlape sub-header mt-126">
	<div class="block no-padding">
		<div class="container fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="inner-header">
						<h3>Application Developer For Android</h3>
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
						 				<div class="job-thumb"> <img src="http://placehold.it/120x95" alt="" /></div>
						 				<div class="job-single-info3">
						 					<h3>{{ $job->position->name . ' - ' . $job->section->name }}</h3>
						 					<span><i class="la la-map-marker"></i>Karawang - Jawa Barat</span>
						 					{{-- <span class="job-is ft">Full time</span> --}}
						 					<ul class="tags-jobs">
							 					<li><i class="fa fa-users"></i> 654 Pelamar</li>
							 					<li><i class="fa fa-calendar"></i> Batas Lamaran: {{ date('d M Y', strtotime($job->close_date)) }}</li>
							 				</ul>
						 				</div>
						 			</div><!-- Job Head -->
			 					</div>
			 					<div class="col-lg-4">
			 						<a class="apply-thisjob" href="#" title=""><i class="la la-paper-plane"></i>Lamar Pekerjaan</a>
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
							 				{{-- <li><i class="fa fa-shield"></i><h3>Minimal Pengalaman</h3><span>2 Years</span></li> --}}
							 				<li><i class="fa fa-graduation-cap"></i><h3>Pendidikan</h3><span>{{ $job->educationLevel->name }}</span></li>
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