$(function(){
	recaptchaReset('interest_concept');
	datePickerInit();

	$('input[type="radio"][name="favored_environment"]').on('click', function() {
		if ($(this).val() === 'other') {
			$('.working-env-other-like-input').prop('disabled', false).fadeIn();
		} else {
			$('.working-env-other-like-input').prop('disabled', true).fadeOut();
		}
	});

	$('input[type="radio"][name="unfavored_environment"]').on('click', function() {
		if ($(this).val() === 'other') {
			$('.working-env-other-dislike-input').prop('disabled', false).fadeIn();
		} else {
			$('.working-env-other-dislike-input').prop('disabled', true).fadeOut();
		}
	});

	$(".chosen-multi").chosen({max_selected_options: 3});

	$('#btn-update').on('click', function(e) {
		e.preventDefault();
		prepareSubmit();

		let form = $('#interest-concept-form');

		$.ajax({
	        url: '/profiles/interest-concept',
	        type: 'PUT',
	        data: form.serialize(),
	        success: function (data) {
	        	if (data.success) {
	        		Toast.fire({
					    type: 'success',
					    title: data.message
					});
	        		recaptchaReset('interest_concept');
	        		afterSubmit();
	        	}
	        	afterSubmit();
	        },
	        statusCode: {
	        	422 : function (data) {
	        		recaptchaReset('interest_concept');
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

				    	if (errorName === 'field_of_works') {
				    		errorName += '[]';
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

	        		recaptchaReset('interest_concept');
	        		afterSubmit();
	        	},
	            500 : function (data) {
	            	Toast.fire({
					    type: 'error',
					    title: 'Internal server error'
					});

	        		recaptchaReset('interest_concept');
	        		afterSubmit();
	            }
	        }
	    });
	});
});