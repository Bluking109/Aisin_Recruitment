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
				 			<form>
				 				<div class="row">
				 					<div class="col-lg-12">
				 						<span class="pf-title">Cover Letter</span>
				 						<div class="pf-field">
				 							<textarea placeholder="Cover Letter"></textarea>
				 						</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">CV</span>
				 						<div class="pf-field no-margin">
					 						<input type="file" name="myfile" />
										</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Ijazah</span>
				 						<div class="pf-field no-margin">
					 						<input type="file" name="myfile" />
										</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">Transkip Nilai</span>
				 						<div class="pf-field no-margin">
					 						<input type="file" name="myfile" />
										</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">KTP</span>
				 						<div class="pf-field no-margin">
					 						<input type="file" name="myfile" />
										</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">NPWP</span>
				 						<div class="pf-field no-margin">
					 						<input type="file" name="myfile" />
										</div>
				 					</div>
				 					<div class="col-md-4">
				 						<span class="pf-title">KK</span>
				 						<div class="pf-field no-margin">
					 						<input type="file" name="myfile" />
										</div>
				 					</div>
				 				</div>
				 			</form>
				 			<form>
				 				<div class="row mb-5">
				 					<div class="col-md-12">
				 						<br><br>
				 						<button type="submit">Update</button>
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
<script src="{{ asset('website/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('website/js/cleave.min.js') }}" type="text/javascript"></script>
<script>
	$(function(){
		$('.datepicker').datepicker({
		    format: 'dd-mm-yyyy',
    		autoclose: true,
    		orientation: "bottom"
		});

		$('.cleave').each(function() {
			new Cleave(this, {
			    numeral: true,
			    numeralThousandsGroupStyle: 'thousand'
			});
		});

		$('input[type="radio"][name="working_environtment_like"]').on('change', function() {
			if ($(this).val() === 'other') {
				$('.working-env-other-like-input').prop('disabled', false).fadeIn();
			} else {
				$('.working-env-other-like-input').prop('disabled', true).fadeOut();
			}
		});

		$('input[type="radio"][name="working_environtment_dislike"]').on('change', function() {
			if ($(this).val() === 'other') {
				$('.working-env-other-dislike-input').prop('disabled', false).fadeIn();
			} else {
				$('.working-env-other-dislike-input').prop('disabled', true).fadeOut();
			}
		});

		$(".chosen-multi").chosen({max_selected_options: 3});
	});
</script>
@endpush