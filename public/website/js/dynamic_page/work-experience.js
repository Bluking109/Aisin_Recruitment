$(function(){
	recaptchaReset('work_experience');
	datePickerInit();

	$('#work-experience-form').on('click', '.add-work-experience', function() {
		let parentRow = $(this).closest('form').find('.work-experience-row');

		if (parentRow.length >= 4) {
			return;
		}

		let parentEl = parentRow.last().clone();
		let index = parseInt(parentEl.data('index')) + 1;

		parentEl.find('input, textarea').val('');
		parentEl.find('.work-experience-company').attr('name', `work_experiences[${index}][company]`);
		parentEl.find('.work-experience-position').attr('name', `work_experiences[${index}][position]`);
		parentEl.find('.work-experience-salary').attr('name', `work_experiences[${index}][salary]`);
		parentEl.find('.work-experience-join-date').attr('name', `work_experiences[${index}][join_date]`);
		parentEl.find('.work-experience-end-date').attr('name', `work_experiences[${index}][end_date]`);
		parentEl.find('.work-experience-reason-out').attr('name', `work_experiences[${index}][reason_to_move]`);

		// Hanya D3 / S1
		parentEl.find('.work-experience-boss-name').attr('name', `work_experiences[${index}][boss_name]`);
		parentEl.find('.work-experience-boss-position').attr('name', `work_experiences[${index}][boss_position]`);
		parentEl.find('.work-experience-subordinate-total').attr('name', `work_experiences[${index}][number_of_subordinates]`);

		parentEl.attr('data-index', index);

		parentEl.appendTo('#work-experience-form');

		datePickerInit();
		cleaveJsInit();
	});

	$('#work-experience-form').on('click', '.remove-work-experience', function() {
		let parentEl = $(this).closest('form').find('.work-experience-row');

		if(parentEl.length < 2) {
			return;
		}

		$(this).closest('.work-experience-row').remove();
	});

	$('#btn-update').on('click', function(e) {
		e.preventDefault();
		prepareSubmit();

		let form = $('#work-experience-form, #work-experience-detail-form');

		$.ajax({
	        url: '/profiles/work-experience',
	        type: 'PUT',
	        data: form.serialize(),
	        success: function (data) {
	        	if (data.success) {
	        		Toast.fire({
					    type: data.type,
					    title: data.message
					});
	        		recaptchaReset('work_experience');
	        		afterSubmit();
	        	}
	        	afterSubmit();
	        },
	        statusCode: {
	        	422 : function (data) {
	        		recaptchaReset('work_experience');
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

	        		recaptchaReset('work_experience');
	        		afterSubmit();
	        	},
	            500 : function (data) {
	            	Toast.fire({
					    type: 'error',
					    title: 'Internal server error'
					});

	        		recaptchaReset('work_experience');
	        		afterSubmit();
	            }
	        }
	    });
	});
});