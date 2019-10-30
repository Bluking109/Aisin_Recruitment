@extends('website.layouts.master')
@section('title', 'Pekerjaan Dilamar')

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
			 	<div class="col-lg-9 column">
			 		<div class="padding-left">
				 		<div class="manage-jobs-sec">
				 			<h3>Pekerjaan Dilamar</h3>
				 			<input type="hidden" value="{{ csrf_token() }}" id="token-confirmation">
					 		<table>
					 			<thead>
					 				<tr>
					 					<td>Act</td>
					 					<td>Posisi</td>
					 					<td>Tahap</td>
					 					<td>Tanggal Test</td>
					 					<td>Jam</td>
					 					<td>Status</td>
					 				</tr>
					 			</thead>
					 			<tbody>
					 				@php
					 				$applications = $jobSeeker->applications;
					 				@endphp
									@foreach($applications as $index => $v)
									@php
					 				$stages = $v->jobApplicationStages;
					 				if (!$stages->count()) {
					 					$stageName = 'Seleksi Doukumen';
					 					$testAt = '-';
					 				} else {
					 					$lastStage = $stages[$stages->count() - 1];
					 					$stageName = $lastStage->stage->name;
					 					$testAt = $lastStage->exam_at;
					 				}
					 				@endphp
					 				<tr>
					 					<td>
					 						@if($v->status == App\Models\JobApplication::STATUS_IN_PROCESS)
					 						@if($stages->count())
					 						@if($lastStage->status == '0')
					 						<a class="btn btn-primary btn-sm confirm-stage" data-id="{{ $lastStage->id }}" data-status="1" data-toggle="tooltip" title="Confirm"><i class="fa fa-check-square-o"></i></a>
					 						<a class="btn btn-danger btn-sm confirm-stage" data-id="{{ $lastStage->id }}" data-status="2" data-toggle="tooltip" title="Reject"><i class="fa fa-times-rectangle-o"></i></a>
					 						@elseif($lastStage->status == '1')
											<span class="text-success"><i class="fa fa-check-square-o"></i> Terkonfirmasi</span>
					 						@else
											<span class="text-danger"><i class="fa fa-times-rectangle-o"></i> Ditolak</span>
					 						@endif
					 						@else

					 						@endif
					 						@endif
					 					</td>
					 					<td>
					 						<div class="table-list-title">
					 							<h3><a href="#" title="">{{ $v->jobVacancy->position->name . " - " . $v->jobVacancy->section->name }}</a></h3>
					 						</div>
					 					</td>
					 					<td>
					 						<div class="table-list-title">
					 							<h3>{{ $stageName }}</h3>
					 						</div>
					 					</td>
					 					<td>
					 						<span>{{ !$stages->count() ? '-' : date('d F Y', strtotime($testAt)) }}</span><br />
					 					</td>
					 					<td>
					 						<span>{{ !$stages->count() ? '-' : date('H:i', strtotime($testAt)) }}</span><br />
					 					</td>
					 					<td>
					 						@if($v->status == App\Models\JobApplication::STATUS_DRAFT || $v->status == App\Models\JobApplication::STATUS_IN_PROCESS)
					 						<span class="text-info">Dalam Proses</span>
					 						@elseif($v->status == App\Models\JobApplication::STATUS_ACCEPTED)
											<span class="text-success">Diterima</span>
					 						@else
											<span class="text-danger">Tidak Diterima</span>
					 						@endif
					 					</td>
					 				</tr>
					 				@endforeach
					 			</tbody>
					 		</table>
				 		</div>
				 	</div>
				</div>
			 </div>
		</div>
	</div>
</section>
@endsection

@push('additional_js')
<script src="{{ asset('website/js/dynamic_page/applied-job.min.js') }}" type="text/javascript"></script>
@endpush