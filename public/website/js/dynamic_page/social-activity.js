const initRangeMonthDatePicker = function() {
	const rangeDatePickerClasses = [
		{
			firstDatePicker : ".tenure-from-date",
			lastDatePicker : ".tenure-end-date",
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
	recaptchaReset('social_activity');
	initRangeMonthDatePicker();

	$('#organization-form').on('click', '.add-non-formal', function() {
		let parentRow = $(this).closest('form').find('.organization-row');

		if (parentRow.length >= 5) {
			return;
		}

		let parentEl = parentRow.last().clone();
		let index = parseInt(parentEl.data('index')) + 1;
		parentEl.find('input').val('');
		parentEl.find('.organization-name').attr('name', `organizations[${index}][name]`);
		parentEl.find('.organization-place').attr('name', `organizations[${index}][place]`);
		parentEl.find('.organization-position').attr('name', `organizations[${index}][position]`);
		parentEl.find('.tenure-from-date').attr('name', `organizations[${index}][start_date]`);
		parentEl.find('.tenure-end-date').attr('name', `organizations[${index}][end_date]`);
		parentEl.attr('data-index', index);

		parentEl.appendTo('#organization-form');

		initRangeMonthDatePicker();
	});

	$('#organization-form').on('click', '.remove-non-formal', function() {
		let parentEl = $(this).closest('form').find('.organization-row');

		if(parentEl.length < 2) {
			return;
		}

		$(this).closest('.organization-row').remove();
	});

	$('input[type="radio"][name="has_friend"]').on('change', function() {
		if ($(this).val() == '1') {
			$('.friend-element').prop('disabled', false);
		} else {
			$('.friend-element').prop('disabled', true);
		}
	});

	$('#friend-form').on('click', '.add-friend', function() {
		let parentRow = $(this).closest('form').find('.friend-row');

		if (parentRow.length >= 3) {
			return;
		}

		let parentEl = parentRow.last().clone();
		let index = parseInt(parentEl.data('index')) + 1;

		parentEl.find('input').val('');
		parentEl.find('.friend-name').attr('name', `friends[${index}][name]`);
		parentEl.find('.friend-position').attr('name', `friends[${index}][position]`);
		parentEl.find('.friend-phone-number').attr('name', `friends[${index}][telephone_number]`);
		parentEl.find('.friend-relationship').attr('name', `friends[${index}][relationship]`);
		parentEl.attr('data-index', index);

		parentEl.appendTo('#friend-form');

		cleaveJsInit();
	});

	$('#friend-form').on('click', '.remove-friend', function() {
		let parentEl = $(this).closest('form').find('.friend-row');

		if(parentEl.length < 2) {
			return;
		}

		$(this).closest('.friend-row').remove();
	});

	$('#btn-update').on('click', function(e) {
		e.preventDefault();
		prepareSubmit();

		let form = $('#friend-form, #organization-form');

		$.ajax({
	        url: '/profiles/social-activity',
	        type: 'POST',
	        data: form.serialize(),
	        success: function (data) {
	        	if (data.success) {
	        		Toast.fire({
					    type: 'success',
					    title: data.message
					});
	        		recaptchaReset('education');
	        	}
	        	afterSubmit();
	        },
	        statusCode: {
	        	422 : function (data) {
	        		recaptchaReset('social_activity');
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
	        		recaptchaReset('social_activity');
	        		afterSubmit();
	        	},
	            500 : function (data) {
	            	Toast.fire({
					    type: 'error',
					    title: 'Internal server error'
					});
	        		recaptchaReset('social_activity');
	        		afterSubmit();
	            }
	        }
	    });
	});
});