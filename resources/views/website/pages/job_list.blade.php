@extends('website.layouts.master')
@section('title', 'List Pekerjaan')

@section('pages')
<section class="overlape sub-header mt-126">
	<div class="block no-padding">
		<div data-velocity="-.1" style="background: url(http://placehold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
		<div class="container fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="inner-header wform">
						<div class="job-search-sec">
							<div class="job-search">
								<h4 class="text-left">Cari Pekerjaan Yang Sesuai Kualifikasi Anda</h4>
								<form id="form-search">
									<div class="row">
										<div class="col-lg-7">
											<div class="job-field">
												<input type="text" placeholder="Cari" id="search-input" value="{{ request()->query('s') }}" />
												<i class="la la-keyboard-o"></i>
											</div>
										</div>
										<div class="col-lg-1">
											<button type="button" id="search-submit"><i class="la la-search"></i></button>
										</div>
									</div>
								</form>
							</div>
						</div>
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
			 	<div class="col-lg-12">
			 		<div class="filterbar">
			 			<h5>{{ $jobs->total() }} Lowongan Pekerjaan Tersedia @if(auth()->guard('job_seekers')->check()) Untuk Lulusan {{ auth()->guard('job_seekers')->user()->educationLevel->name }} @endif</h5>
			 			@if(!auth()->guard('job_seekers')->check())
			 			<div class="sortby-sec">
			 				<span>Filter</span>
			 				<select data-placeholder="Pendidikan" class="chosen" id="filter-edu">
			 					<option value="">- No Filter -</option>
			 					@foreach($educationLevels as $value)
								<option value="{{ $value->name }}" @if(request()->query('f') == $value->name) selected @endif>{{ $value->name }}</option>
			 					@endforeach
							</select>
			 			</div>
			 			@endif
			 		</div>
			 		<div class="job-grid-sec">
						<div class="row">
							@foreach($jobs as $key => $job)
							@php
							$jobSeeker = auth()->guard('job_seekers')->user();
							$alreadyApplied = null;

							if ($jobSeeker) {
								$alreadyApplied = $jobSeeker->applications()
									->where('job_vacancy_id', $job->id)
									->first();
							}
							@endphp
							<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
								<div class="job-grid border">
									<div class="job-title-sec">
										<div class="c-logo">
											<a href="{{ route('job-vacancies.show', ['job_vacancy' => $job->slug]) }}">
												<img src="{{ asset('admin/images/vacancies/' . $job->image) }}" alt="" />
											</a>
										</div>
										<h3>
											<a href="{{ route('job-vacancies.show', ['job_vacancy' => $job->slug]) }}" title="">{{ $job->position->name . ' - ' . $job->section->name }}</a>
										</h3>
										<span><i class="fa fa-clock-o"></i> Ditutup : {{ date('d M Y', strtotime($job->close_date)) }}</span>
									</div>
									<span class="job-lctn">Minimal Pendidikan {{ $job->educationLevel->name }}</span>

									@if(!$alreadyApplied)
			 						<a  href="#" title="" class="apply-job" data-target="#form-sumbit-vacancy-{{$key}}">Lamar</a>
			 						@else
			 						<a  href="#" title="" class="apply-job">Sudah Dilamar</a>
			 						@endif

									<form class="d-none" method="post" id="form-sumbit-vacancy-{{$key}}" action="{{ route('job-vacancies.apply', ['slug' => $job->slug]) }}">
			 							@csrf
			 							<button type="submit"></button>
			 						</form>
								</div><!-- JOB Grid -->
							</div>
							@endforeach
						</div>
					</div>
					{{ $jobs->appends(request()->except('page'))->links() }}
			 	</div>
			 </div>
		</div>
	</div>
</section>
@endsection

@push('additional_js')
<script type="text/javascript">
	$(function() {
		let url = new URL(window.location.href);
        let params = new URLSearchParams(url.search.slice(1));

        $('.apply-job').on('click', function(e) {
			e.preventDefault();
			@if(auth()->guard('job_seekers')->check())
			$($(this).data('target')).submit();
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

		$('#filter-edu').on('change', function() {
            let val = $(this).val();

            // Delete the f param.
            params.delete('f');
            params.delete('page');

            if (val != null && val != undefined && val != '') {
                params.append('f', val);
            }

            window.location.href = window.location.href.split('?')[0] + '?' + params.toString();
		});

		$('#form-search').on('keypress', function(e) {
			if(e.which == 13) {
				e.preventDefault();
			}
		})

		$('#search-input').on('keypress',function(e) {
		    if(e.which == 13) {
		        let val = $(this).val();
		        params.delete('page');
		        params.delete('s');

	            if (val != null && val != undefined && val != '') {
	                params.append('s', val);
	            }

	            window.location.href = window.location.href.split('?')[0] + '?' + params.toString();
		    }
		});

		$('#search-submit').on('click', function() {
			let val = $('#search-input').val();
	        params.delete('page');
	        params.delete('s');

            if (val != null && val != undefined && val != '') {
                params.append('s', val);
            }

            window.location.href = window.location.href.split('?')[0] + '?' + params.toString();
		});
	});
</script>
@endpush