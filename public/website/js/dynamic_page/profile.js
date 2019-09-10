let recaptchaReset = function(action) {
    grecaptcha.ready(function() {
        grecaptcha.execute(siteKey, {action: action}).then(function(token) {
            $('#btn-update').prop('disabled', false);
            $('#recaptcha-key').val(token);
        });
    });
}

const prepareSubmit = function () {
    $('#btn-update').find('.submit-text').hide();
    $('#btn-update').find('.loading').css('display', 'inline-block');
    $('#btn-update').prop('disabled', true);
}

const afterSubmit = function () {
    $('#btn-update').find('.submit-text').show();
    $('#btn-update').find('.loading').css('display', 'none');
    $('.error-update').remove();

    setTimeout(function(){
        $('#btn-update').prop('disabled', false);
    }, 3000);
}

const getRegions = function(url, element, param = null, child = null) {
    let query = buildQuery(param);
    let elementValue = $(element).val();
    $.ajax({
        url: url + '?' + query,
        type: 'GET',
        dataType: "json",
        success: function (data) {
            let opt = '';
            data.forEach((v) => {
                let selected  = '';
                if (v.id == elementValue) {
                    selected = 'selected';
                }
                opt += `<option value="${v.id}" ${selected}>${v.text}</option>`
            });

            $(element).chosen('destroy').empty().append(opt);
            $(element).chosen();

            let childId = $(element).data('child');

            if (childId != null && childId != undefined) {
                let attributChild = $(element).data('parent-param');
                let valueChild = $(element).val();
                getRegions($(element).data('child-url'), childId, {[attributChild] : valueChild})
            }
        },
        statusCode: {
            500 : function (data) {
                console.log('Internal Server Error')
            }
        }
    });
}

const buildQuery = function (data) {
    if (typeof (data) === 'string') return data;

    var query = [];

    for (var key in data) {
        if (data.hasOwnProperty(key)) {
            query.push(encodeURIComponent(key) + '=' + encodeURIComponent(data[key]));
        }
    }

    return query.join('&');
};

$(function() {
    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        orientation: 'bottom'
    });

    $('.year-input').datepicker({
        format: 'yyyy',
        viewMode: "years",
        minViewMode: "years",
        autoclose: true,
        orientation: "bottom"
    });
});