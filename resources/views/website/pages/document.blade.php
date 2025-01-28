@extends('website.layouts.master')
@section('title', 'Dokumen')

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
				 			<h3>Dokumen Pendukung</h3>
				 		</div>
				 		<div class="profile-form-edit">
				 			<form id="document-form">
				 				@csrf
				 				@method('PUT')
				 				<input type="hidden" name="recaptcha_key" id="recaptcha-key">
				 				<div class="row">
				 					<div class="manage-jobs-sec">
				 						<table>
								 			<thead>
								 				<tr>
								 					<td>File</td>
								 					<td>Nama File</td>
								 					<td>Syarat</td>
								 					<td></td>
								 				</tr>
								 			</thead>
								 			<tbody>
								 				@foreach(config('aiia.document_types') as $value)
								 				<tr>
								 					<td>
								 						<div class="table-list-title">
								 							<h3>{{ $value['display_name'] }}</h3>
								 						</div>
								 					</td>
								 					<td>
								 						<div class="table-list-title">
								 							<p class="filename">{{ $document->{$value['name']} ?? 'Belum ada file dipilih' }}</p>
								 						</div>
								 					</td>
								 					<td>
								 						@foreach($value['rules'] as $val)
														<span>{{ $val }}</span><br />
								 						@endforeach
								 					</td>
								 					<td>
								 						<input type="file" name="{{ $value['name'] }}" class="d-none file-upload">
								 						<ul class="action_job">
								 							<li><span>Upload File</span><a title="" class="upload"><i class="fa fa-upload"></i></a></li>
								 							@if($document)
								 							@if($document->{$value['name']})
								 							<li><span>Download File</span><a href="{{ route('profiles.document.getfile', $value['name']) }}" title=""><i class="fa fa-download"></i></a></li>
								 							@endif
								 							@endif
								 						</ul>
								 					</td>
								 				</tr>
								 				@endforeach
								 			</tbody>
								 		</table>
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
<script src="{{ asset('website/js/dynamic_page/document.min.js') }}" type="text/javascript"></script>
@endpush