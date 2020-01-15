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

    $('#form-change-password').on('submit', function(e) {
        e.preventDefault();

        let form = $(this);
        prepareValidation(form);

        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            dataType: "json",
            data: $(this).serialize(),
            success: function (data) {
                $('#form-change-password').remove();
                $('#change-password-title').text('Berhasil')
                $('#modal-change-password').find('.account-popup').append(`<div>
                        <br><hr>
                        <p class="text-success text-center">Password Anda telah diperbaharui.</p>
                    </div>`);
            },
            statusCode: {
                422 : function (data) {
                	resetErrorValidation(form);
                    showErrorValidation(form, data);
                    recaptchaReset();
                },
                400 : function (data) {
                    resetErrorValidation(form);
                    showRecaptchaError('#change-password-title');
                    recaptchaReset();
                }
            }
        });
    });
});