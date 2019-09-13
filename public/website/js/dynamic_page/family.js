const labelInit = function() {
	$('#children-form').find('.child-label').each(function(k, v) {
		$(this).text('Nama Anak Ke-' + (k+1));
	});

	$('#children-form').find('.child-name').each(function(k, v) {
		$(this).attr('placeholder', 'Nama Anak Ke-' + (k+1));
	});

	$('#siblings-form').find('.sibling-label').each(function(k, v) {
		$(this).text('Nama Saudara Ke-' + (k+1));
	});

	$('#siblings-form').find('.sibling-name').each(function(k, v) {
		$(this).attr('placeholder', 'Nama Saudara Ke-' + (k+1));
	});
}

$(function(){
	recaptchaReset('family');
	datePickerInit();

	$('#children-form').on('click', '.add-child', function() {
		let parentRow = $(this).closest('form').find('.child-row');

		if (parentRow.length >= 3) {
			return;
		}

		let parentEl = parentRow.last().clone();
		let index = parseInt(parentEl.data('index')) + 1;

		parentEl.find('input[type="text"]').val('');
		parentEl.find('.child-name').attr('name', `children[${index}][name]`);
		parentEl.find('.child-place-of-birth').attr('name', `children[${index}][place_of_birth]`);
		parentEl.find('.child-date-of-birth').attr('name', `children[${index}][date_of_birth]`);
		parentEl.find('.child-gender').attr('name', `children[${index}][gender]`);
		parentEl.find('.child-education').attr('name', `children[${index}][last_education]`);
		parentEl.find('.child-job').attr('name', `children[${index}][job]`);

		parentEl.attr('data-index', index);

		parentEl.appendTo('#children-form');

		labelInit();

		datePickerInit();
	});

	$('#children-form').on('click', '.remove-child', function() {
		let parentEl = $(this).closest('form').find('.child-row');

		if(parentEl.length < 2) {
			return;
		}

		$(this).closest('.child-row').remove();
		labelInit();
	});

	$('#siblings-form').on('click', '.add-brother', function() {
		let parentRow = $(this).closest('form').find('.sibling-row');

		if (parentRow.length >= 7) {
			return;
		}

		let parentEl = parentRow.last().clone();
		let index = parseInt(parentEl.data('index')) + 1;

		parentEl.find('input[type="text"]').val('');
		parentEl.find('.sibling-name').attr('name', `siblings[${index}][name]`);
		parentEl.find('.sibling-place-of-birth').attr('name', `siblings[${index}][place_of_birth]`);
		parentEl.find('.sibling-date-of-birth').attr('name', `siblings[${index}][date_of_birth]`);
		parentEl.find('.sibling-gender').attr('name', `siblings[${index}][gender]`);
		parentEl.find('.sibling-job').attr('name', `siblings[${index}][job]`);
		parentEl.find('.sibling-education').attr('name', `siblings[${index}][last_education]`);

		parentEl.attr('data-index', index);

		parentEl.appendTo('#siblings-form');

		labelInit();

		datePickerInit();
	});

	$('#siblings-form').on('click', '.remove-brother', function() {
		let parentEl = $(this).closest('form').find('.sibling-row');

		if(parentEl.length < 2) {
			return;
		}

		$(this).closest('.sibling-row').remove();
		labelInit();
	});

	$('#btn-update').on('click', function(e) {
		e.preventDefault();
		prepareSubmit();

		let form = $('#marital-status-form, #partner-form, #children-form, #parent-form, #siblings-form');

		$.ajax({
	        url: '/profiles/family',
	        type: 'PUT',
	        data: form.serialize(),
	        success: function (data) {
	        	if (data.success) {
	        		Toast.fire({
					    type: 'success',
					    title: data.message
					});
	        		recaptchaReset('family');
	        		afterSubmit();
	        	}
	        	afterSubmit();
	        },
	        statusCode: {
	        	422 : function (data) {
	        		recaptchaReset('family');
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

				        let element = form.find('[name="'+errorName+'"]');
				        element.after(`<span class="text-danger error-update">${errors[error].join('. ')}</span>`);
				    }
	        	},
	        	400 : function (data) {
	        		Toast.fire({
					    type: 'error',
					    title: data.responseJSON.message
					});

	        		recaptchaReset('family');
	        		afterSubmit();
	        	},
	            500 : function (data) {
	            	Toast.fire({
					    type: 'error',
					    title: 'Internal server error'
					});

	        		recaptchaReset('family');
	        		afterSubmit();
	            }
	        }
	    });
	});
});