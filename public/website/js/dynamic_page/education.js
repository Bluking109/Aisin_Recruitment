const initRangeMonthDatePicker = function() {
	const rangeDatePickerClasses = [
		{
			firstDatePicker : ".month-year-input-in",
			lastDatePicker : ".month-year-input-out",
			format : "mm-yyyy",
			viewMode : "months"
		},
		{
			firstDatePicker : ".non-formal-from-date",
			lastDatePicker : ".non-formal-until-date",
			format : "dd-mm-yyyy",
			viewMode : "dates"
		},
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
	recaptchaReset('education');
	initRangeMonthDatePicker();

	// major
	$.ajax({
        url: '/ajax/majors',
        type: 'GET',
        success: function (data) {
        	let smaOpts = '<option></option>';

        	let smaSelect = $('#major-sma-select');
        	let selects = ['d3', 's1', 's2'];

        	data.forEach(v => {
        		if (v.type == '1') {
        			let smaVal = smaSelect.val();

        			if (smaVal != '' && smaVal != null && smaVal != undefined) {
        				if (smaVal != v.id) {
        					smaOpts += `<option value="${v.id}">${v.text}</option>`;
        				}
        			} else {
        				smaOpts += `<option value="${v.id}">${v.text}</option>`;
        			}
        		}
        	});

        	selects.forEach(v => {
        		let d3Opts = '<option></option>';
        		let elem = $('#major-'+v+'-select');
        		let elemVal = elem.val();

        		data.forEach(val => {
        			if (val.type == '2') {
	        			if (elemVal != '' && elemVal != null && elemVal != undefined) {
	        				if (elemVal != val.id) {
	        					d3Opts += `<option value="${val.id}">${val.text}</option>`;
	        				}
	        			} else {
	        				d3Opts += `<option value="${val.id}">${val.text}</option>`;
	        			}
	        		}
        		});

        		elem.append(d3Opts);
        		elem.chosen();
        	});

        	smaSelect.append(smaOpts).chosen();
        },
        statusCode: {
        	422 : function (data) {

        	},
        	400 : function (data) {

        	},
            500 : function (data) {

            }
        }
    });

	$('#non-formal-form').on('click', '.add-non-formal', function() {
		let parentRow = $(this).closest('form').find('.non-formal-row');

		if (parentRow.length >= 5) {
			return;
		}

		let parentEl = parentRow.last().clone();
		let index = parseInt(parentEl.data('index')) + 1;
		parentEl.find('input').val('');
		parentEl.find('.non-formal-course-name').attr('name', `non_formal_educations[${index}][training_name]`);
		parentEl.find('.non-formal-place').attr('name', `non_formal_educations[${index}][place]`);
		parentEl.find('.non-formal-note').attr('name', `non_formal_educations[${index}][note]`);
		parentEl.find('.non-formal-from-date').attr('name', `non_formal_educations[${index}][start_date]`);
		parentEl.find('.non-formal-until-date').attr('name', `non_formal_educations[${index}][end_date]`);
		parentEl.attr('data-index', index);

		parentEl.appendTo('#non-formal-form');

		initRangeMonthDatePicker();
	});

	$('#non-formal-form').on('click', '.remove-non-formal', function() {
		let parentEl = $(this).closest('form').find('.non-formal-row');

		if(parentEl.length < 2) {
			return;
		}

		$(this).closest('.non-formal-row').remove();
	});

	$('#foreign-lang-form').on('click', '.add-non-formal', function() {
		let parentRow = $(this).closest('form').find('.foreign-lang-row');

		if (parentRow.length >= 5) {
			return;
		}

		let parentEl = parentRow.last().clone();
		let sourceId = parentEl.data('index');
		let index = parseInt(sourceId) + 1;
		parentEl.find('input[type="text"]').val('');
		parentEl
			.find('.foreign-lang-language')
			.attr('name', `languages[${index}][language]`);
		parentEl
			.find('.foreign-lang-writing')
			.attr('name', `languages[${index}][writing]`);
		parentEl
			.find('.foreign-lang-reading')
			.attr('name', `languages[${index}][reading]`);
		parentEl
			.find('.foreign-lang-grammar')
			.attr('name', `languages[${index}][grammar]`);
		parentEl
			.attr('data-index', index);

		parentEl.find(`#writing-bad-${sourceId}`).attr('id', `writing-bad-${index}`);
		parentEl.find(`#reading-bad-${sourceId}`).attr('id', `reading-bad-${index}`);
		parentEl.find(`#grammar-bad-${sourceId}`).attr('id', `grammar-bad-${index}`);

		parentEl.find(`label[for="writing-bad-${sourceId}"]`).attr('for', `writing-bad-${index}`);
		parentEl.find(`label[for="reading-bad-${sourceId}"]`).attr('for', `reading-bad-${index}`);
		parentEl.find(`label[for="grammar-bad-${sourceId}"]`).attr('for', `grammar-bad-${index}`);

		parentEl.find(`#writing-good-${sourceId}`).attr('id', `writing-good-${index}`);
		parentEl.find(`#reading-good-${sourceId}`).attr('id', `reading-good-${index}`);
		parentEl.find(`#grammar-good-${sourceId}`).attr('id', `grammar-good-${index}`);

		parentEl.find(`label[for="writing-good-${sourceId}"]`).attr('for', `writing-good-${index}`);
		parentEl.find(`label[for="reading-good-${sourceId}"]`).attr('for', `reading-good-${index}`);
		parentEl.find(`label[for="grammar-good-${sourceId}"]`).attr('for', `grammar-good-${index}`);

		parentEl.appendTo('#foreign-lang-form');
	});

	$('#foreign-lang-form').on('click', '.remove-non-formal', function() {
		let parentEl = $(this).closest('form').find('.foreign-lang-row');

		if(parentEl.length < 2) {
			return;
		}

		$(this).closest('.foreign-lang-row').remove();
	});

	$('#btn-update').on('click', function(e) {
		e.preventDefault();
		prepareSubmit();

		let form = $('#formal-education-form, #education-detail-form, #non-formal-form, #foreign-lang-form');

		$.ajax({
	        url: '/profiles/education',
	        type: 'PUT',
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
	        		recaptchaReset('education');
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

				        let element = form.find('[name="'+errorName+'"]').parent();
				        element.append(`<span class="text-danger error-update">${errors[error].join('. ')}</span>`);
				    }
	        	},
	        	400 : function (data) {
	        		Toast.fire({
					    type: 'error',
					    title: data.responseJSON.message
					});

	        		recaptchaReset('education');
	        		afterSubmit();
	        	},
	            500 : function (data) {
	            	Toast.fire({
					    type: 'error',
					    title: 'Internal server error'
					});

	        		recaptchaReset('education');
	        		afterSubmit();
	            }
	        }
	    });
	});
});