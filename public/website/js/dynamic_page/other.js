const initRangeMonthDatePicker = function() {
	const rangeDatePickerClasses = [
		{
			firstDatePicker : ".disease-from-date",
			lastDatePicker : ".disease-end-date",
			format : "dd-mm-yyyy",
			viewMode : "dates"
		}
	];

	rangeDatePickerClasses.forEach(v => {
		$(v.lastDatePicker).datepicker({
		    format: v.format,
		    viewMode: v.viewMode,
    		minViewMode: v.viewMode,
    		autoclose: true,
    		orientation: "bottom"
		}).on('changeDate',function(e){
		    $(v.firstDatePicker).datepicker('setEndDate',e.date)
		});

		$(v.firstDatePicker).datepicker({
		    format: v.format,
		    viewMode: v.viewMode,
    		minViewMode: v.viewMode,
    		autoclose: true,
    		orientation: "bottom"
		}).on('changeDate',function(e){
		    $(v.lastDatePicker).datepicker('setStartDate',e.date)
		});
	});
}


$(function(){
	initRangeMonthDatePicker();
	recaptchaReset('other');
	$('#other-recruitment-form').on('click', '.add-other', function() {
		let parentRow = $(this).closest('form').find('.other-row');
		parentRow.last().find('.chosen').chosen('destroy');

		if (parentRow.length >= 5) {
			return;
		}

		let parentEl = parentRow.last().clone();
		let index = parseInt(parentEl.data('index')) + 1;

		parentEl.find('input').val('');
		parentEl.find('.other-organizer').attr('name', `other_recruitments[${index}][organizer]`);
		parentEl.find('.other-is-astra').attr('name', `other_recruitments[${index}][is_astra]`);
		parentEl.find('#is-astra-yes-'+parentEl.data('index')).attr('id', 'is-astra-yes-'+index).val('1');
		parentEl.find('#is-astra-no-'+parentEl.data('index')).attr('id', 'is-astra-no-'+index).val('0');
		parentEl.find('label[for="is-astra-yes-'+parentEl.data('index')+'"]').attr('for', 'is-astra-yes-'+index);
		parentEl.find('label[for="is-astra-no-'+parentEl.data('index')+'"]').attr('for', 'is-astra-no-'+index);
		parentEl.find('.other-process').attr('name', `other_recruitments[${index}][process]`);
		parentEl.find('.other-place').attr('name', `other_recruitments[${index}][place]`);
		parentEl.find('.other-date').attr('name', `other_recruitments[${index}][date]`);
		parentEl.find('.other-position').attr('name', `other_recruitments[${index}][position]`);
		parentEl.find('.other-status').attr('name', `other_recruitments[${index}][status]`);
		parentEl.attr('data-index', index);

		parentEl.appendTo('#other-recruitment-form');
		$('#other-recruitment-form').find('.chosen').chosen();
		datePickerInit();
	});

	$('#other-recruitment-form').on('click', '.remove-other', function() {
		let parentEl = $(this).closest('form').find('.other-row');

		if(parentEl.length < 2) {
			return;
		}

		$(this).closest('.other-row').remove();
	});

	$('#disease-form').on('click', '.add-disease', function() {
		let parentRow = $(this).closest('form').find('.disease-row');
		parentRow.last().find('.chosen').chosen('destroy');

		if (parentRow.length >= 5) {
			return;
		}

		let parentEl = parentRow.last().clone();
		let index = parseInt(parentEl.data('index')) + 1;

		parentEl.find('input').val('');
		parentEl.find('.disease-name').attr('name', `diseases[${index}][name]`);
		parentEl.find('.disease-from-date').attr('name', `diseases[${index}][from_date]`);
		parentEl.find('.disease-end-date').attr('name', `diseases[${index}][end_date]`);
		parentEl.find('.disease-note').attr('name', `diseases[${index}][note]`);
		parentEl.attr('data-index', index);

		parentEl.appendTo('#disease-form');
		$('#disease-form').find('.chosen').chosen();
		initRangeMonthDatePicker();
	});

	$('#disease-form').on('click', '.remove-disease', function() {
		let parentEl = $(this).closest('form').find('.disease-row');

		if(parentEl.length < 2) {
			return;
		}

		$(this).closest('.disease-row').remove();
	});

	$('input[type="radio"][name="in_another_recruitment_process"]').on('change', function() {
		if ($(this).val() == '1') {
			$('.other-element').prop('disabled', false);
		} else {
			$('.other-element').prop('disabled', true);
		}
		$('#other-recruitment-form').find('.chosen').chosen('destroy');
		$('#other-recruitment-form').find('.chosen').chosen();
	});

	$('input[type="radio"][name="use_glasses"]').on('change', function() {
		if ($(this).val() == '1') {
			$('.minus-wrapper').show();
			$('.eye-element').prop('disabled', false);
		} else {
			$('.minus-wrapper').hide();
			$('.eye-element').prop('disabled', true);
		}

		$('#other-form').find('.chosen').chosen('destroy');
		$('#other-form').find('.chosen').chosen();
	});

	$('input[type="radio"][name="had_disease"]').on('change', function() {
		if ($(this).val() == '1') {
			$('.disease-element').prop('disabled', false);
		} else {
			$('.disease-element').prop('disabled', true);
		}
		$('#disease-form').find('.chosen').chosen('destroy');
		$('#disease-form').find('.chosen').chosen();
	});

	$('.disease-name').closest('.pf-field').on('keyup', '.chosen-search-input', function(e) {
		if (e.which == 13) {
			let v = $(e).val();
			$('.custom-option').remove();

			$('.disease-name').append('<option class="custom-option" value="'+v+'" selected>'+v+'</option>');
			$('.disease-name').trigger("chosen:updated");
			$('.chosen-container').removeClass('chosen-with-drop');
		}
	});

	$('#btn-update').on('click', function(e) {
		e.preventDefault();
		prepareSubmit();

		let form = $('#other-form, #other-recruitment-form, #disease-form, #agreement-form');

		$.ajax({
	        url: '/profiles/other',
	        type: 'POST',
	        data: form.serialize(),
	        success: function (data) {
	        	if (data.success) {
	        		Toast.fire({
					    type: 'success',
					    title: data.message
					});
	        		recaptchaReset('other');
	        	}
	        	afterSubmit();
	        },
	        statusCode: {
	        	422 : function (data) {
	        		recaptchaReset('other');
	        		afterSubmit();
	        		Toast.fire({
					    type: 'error',
					    title: 'Mohon koreksi ulang inputan Anda'
					});
	        		let response = data.responseJSON;
				    let errors = response.errors
				    for (error in errors){
				    	let errorNames = error.split('.');
				    	let errorName = '';

				    	if (errorNames.length > 1) {
				    		errorNames.forEach((v, i ) => {
					    		if (i != errorNames.length) {
						    		if (i == 0) {
						    			errorName += v + '[';
						    		} else {
						    			errorName += v + '][';
						    		}
						    	}
					    	});

					    	errorName = errorName.slice(0, -1);
				    	} else {
				    		errorName = error;
				    	}

				        let element = form.find('[name="'+errorName+'"]').closest('.pf-field');
				        element.after(`<span class="text-danger error-update">${errors[error].join('. ')}</span>`);
				    }
	        	},
	        	400 : function (data) {
	        		Toast.fire({
					    type: 'error',
					    title: data.responseJSON.message
					});
	        		recaptchaReset('other');
	        		afterSubmit();
	        	},
	            500 : function (data) {
	            	Toast.fire({
					    type: 'error',
					    title: 'Internal server error'
					});
	        		recaptchaReset('other');
	        		afterSubmit();
	            }
	        }
	    });
	});
});