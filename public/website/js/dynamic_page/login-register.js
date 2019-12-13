const showErrorValidation = function(form, data) {
    let response = data.responseJSON;
    let errors = response.errors
    for (error in errors){
        let element = form.find('[name="'+error+'"]');
        let parent = element.closest('.cfield');
        parent.after(`<p class="text-danger text-left error-auth">${errors[error].join('. ')}</p>`);
        parent.addClass('no-margin');
    }
};

const resetErrorValidation = function(form) {
    form.find('.submit-button').attr('type', 'submit');
    form.find('.submit-text').show();
    form.find('.loading').css('display', 'none');
    $('.error-auth').remove();
    $('.cfield').removeClass('no-margin');
}

const showRecaptchaError = function(sibling) {
    $(sibling).after(`<p class="text-danger text-left error-auth text-center no-margin">Recaptcha Error</p>`);
}

const prepareValidation = function (form) {
    form.find('.submit-button').attr('type', 'button');
    form.find('.submit-text').hide();
    form.find('.loading').css('display', 'inline-block');
}

$(function() {
    recaptchaReset();

    $.ajax({
        url: '/ajax/education-levels',
        type: 'GET',
        dataType: "json",
        success: function (data) {
            let opt = '';
            data.forEach((v) => {
                opt += `<option value="${v.id}">${v.text}</option>`
            });

            $('#education-select').chosen('destroy').append(opt);
            $('#education-select').chosen();
        },
        statusCode: {
            500 : function (data) {
                console.log('Internal Server Error')
            }
        }
    });

	$('#form-login').on('submit', function(e) {
		e.preventDefault();
        let form = $(this);
        prepareValidation(form);

		$.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: $(this).serialize(),
            dataType: "json",
            success: function (data) {
                let redirect = data.redirect == null ? '/profiles/personal-identity' : data.redirect;
                window.location.href = redirect;
            },
            statusCode: {
                422 : function (data) {
                	resetErrorValidation(form);
                    showErrorValidation(form, data);
                    recaptchaReset();
                },
                400 : function (data) {
                    resetErrorValidation(form);
                    showRecaptchaError('#login-title');
                    recaptchaReset();
                }
            }
        });
	});

	$('#form-register').on('submit', function(e) {
		e.preventDefault();
		let form = $(this);
        prepareValidation(form);

		$.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(),
            dataType: "json",
            success: function (data) {
                if (data.success) {
                    $('.term-register').hide();
                	$('#form-register').remove();
                	$('#register-title').text('Pendaftaran Berhasil')
                	$('#modal-register').find('.account-popup').append(`<div>
                			<br><hr>
							<p class="text-success text-center">Pendaftaran anda berhasil, mohon cek email untuk konfirmasi dan melanjutkan proses lamaran Anda</p>
                		</div>`);

                    recaptchaReset();
                }
            },
            statusCode: {
                422 : function (data) {
                    resetErrorValidation(form);
                    showErrorValidation(form, data);
                    recaptchaReset();
                },
                400 : function (data) {
                    resetErrorValidation(form);
                    showRecaptchaError('#register-title');
                	recaptchaReset();
                }
            }
        });
	});
});