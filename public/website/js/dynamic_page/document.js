$(function(){
	recaptchaReset('document');

	if (localStorage.getItem('success_document')) {
		Toast.fire({
		    type: 'success',
		    title: localStorage.getItem('success_document_message')
		});

		localStorage.removeItem('success_document');
		localStorage.removeItem('success_document_message');
	}

	$('.upload').on('click', function() {
		$(this).closest('td').find('input[type="file"]').trigger('click');
	});

	$('.file-upload').on('change', function(e) {
		let filename = $(this).closest('tr').find('.filename').text();
		let val = $(this).val();

		if (val !== null && val !== '' && val !== undefined) {
			filename = e.target.files[0].name;
		}

		$(this).closest('tr').find('.filename').text(filename);
	});

	$('#btn-update').on('click', function(e) {
		e.preventDefault();
		prepareSubmit();

		let form = $('#document-form');

		$.ajax({
	        url: '/profiles/document',
	        type: 'POST',
	        data: new FormData(form[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
	        success: function (data) {
	        	if (data.success) {
	        		localStorage.setItem('success_document', true);
	        		localStorage.setItem('success_document_message', data.message);
	        		location.reload();
	        	}
	        },
	        statusCode: {
	        	422 : function (data) {
	        		recaptchaReset('document');
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
				        element.closest('tr')
				        	.find('.filename')
				        	.after(`<span class="text-danger error-update">${errors[error].join('. ')}</span>`);
				    }
	        	},
	        	400 : function (data) {
	        		Toast.fire({
					    type: 'error',
					    title: data.responseJSON.message
					});
	        		recaptchaReset('document');
	        		afterSubmit();
	        	},
	            500 : function (data) {
	            	Toast.fire({
					    type: 'error',
					    title: 'Internal server error'
					});
	        		recaptchaReset('document');
	        		afterSubmit();
	            }
	        }
	    });
	});
});