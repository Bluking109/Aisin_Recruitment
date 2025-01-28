$(function() {
	if (localStorage.getItem('success_confirmation')) {
		Toast.fire({
		    type: 'success',
		    title: localStorage.getItem('success_confirmation_message')
		});

		localStorage.removeItem('success_confirmation');
		localStorage.removeItem('success_confirmation_message');
	}

	$('.confirm-stage').on('click', function() {
		let id = $(this).data('id');
		let status = $(this).data('status');
		let message = 'Anda akan menolak untuk menghadiri test ini';

		if (status == '1') {
			message = 'Anda akan menyetujui untuk menghadiri test ini';
		}

		Swal.fire({
	        title: 'Apakah Anda Yakin?',
	        text: message,
	        type: 'info',
	        showCancelButton: true,
	        confirmButtonColor: '#3085d6',
	        cancelButtonColor: '#ccc',
	        confirmButtonText: 'Ya, Saya Yakin',
	        cancelButtonText: 'Cancel',
        }).then((result) => {
	        if (result.value) {
	        	$.ajax({
			        url: '/profiles/applied-jobs/'+id,
			        type: 'PUT',
			        data: {
			        	status : status,
			        	_token : $('#token-confirmation').val()
			        },
			        success: function (data) {
			        	if (data.success) {
			        		localStorage.setItem('success_confirmation', true);
			        		localStorage.setItem('success_confirmation_message', data.message);
			        		location.reload();
			        	}
			        },
			        statusCode: {
			        	400 : function (data) {
			        		Toast.fire({
							    type: 'error',
							    title: data.responseJSON.message
							});
			        	},
			            500 : function (data) {
			            	Toast.fire({
							    type: 'error',
							    title: 'Internal server error'
							});
			            }
			        }
			    });
	        }
        })
	});
});