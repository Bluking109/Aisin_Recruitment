$(function(){
	recaptchaReset('personal_identity');
	let defaultPhoto = "/website/images/avatar/avatar.jpg";

	getRegions('/ajax/provinces', '#province-address');
	getRegions('/ajax/provinces', '#province-domicile');

	$('#btn-update').on('click', function(e) {
		e.preventDefault();
		prepareSubmit();

		let form = $('#personal-identity-form');

		$.ajax({
	        url: '/profiles/personal-identity',
	        type: 'POST',
	        data: new FormData(form[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
	        success: function (data) {
	        	if (data.success) {
	        		toastr.success(data.message);
	        		recaptchaReset('personal_identity');
	        		afterSubmit();
	        	}
	        },
	        statusCode: {
	        	422 : function (data) {
	        		recaptchaReset('personal_identity');
	        		afterSubmit();
	        		toastr.error('Mohon koreksi ulang inputan Anda');
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
	        		toastr.error(data.responseJSON.message);
	        		recaptchaReset('personal_identity');
	        		afterSubmit();
	        	},
	            500 : function (data) {
	                toastr.error('Internal server error');
	        		recaptchaReset('personal_identity');
	        		afterSubmit();
	            }
	        }
	    });
	});

	$('#province-address, #district-address, #sub-district-address, #province-domicile, #district-domicile, #sub-district-domicile').on('change', function() {
		let childId = $(this).data('child');
		let attributChild = $(this).data('parent-param');
    	let valueChild = $(this).val();
    	getRegions($(this).data('child-url'), childId, {[attributChild] : valueChild})
	});

	$('#browse-photo').on('click', function() {
		$('#photo').trigger('click');
	});

	$('#deleted-photo-icon').on('click', function(e) {
		e.preventDefault();
		$('#photo-img').attr('src', defaultPhoto);
		$('#photo').val('');
	});

	$('#photo').on('change', function() {
		var file = this.files[0];
        var reader = new FileReader();
        reader.onloadend = function () {
           $('#photo-img').attr('src', reader.result);
        }

        if (file) {
            reader.readAsDataURL(file);
        }
	});

	$('.sim-select').on('change', function() {
		let checked = $(this).prop('checked');
		let target = $(this).data('id');

		if (checked) {
			$(target).prop('disabled', false);
		} else {
			$(target).prop('disabled', true);
		}
	});
});