$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Accept': "application/json"
    },

    beforeSend: () => {
        $('.send_btn i').removeClass('fa fa-paper-plane').addClass('icon-loader fa-spin');
        $('.error').each(function() {
            $(this).text('');
        });
    },

    complete: () => {
        $('.send_btn i').addClass('fa fa-paper-plane').removeClass('icon-loader fa-spin');
    },
    success: (e) => {

    },
    error: (e) => {
        $('.send_btn i').addClass('fa fa-paper-plane').removeClass('icon-loader fa-spin');
        let errors = e.responseJSON.errors;
        $(this).find('.error').text('');
        for (error in errors ) {
            $(`p.error_${error}`).text(errors[error]);
        }
    }
});

$(document).on('submit','.ajax-form',function(e) {
    e.preventDefault();

    $(this).find('.ajax-btn').addClass('active');

    let formData;

    if( $(this).attr('methodAppend') ) {
        formData = window[$(this).attr('methodAppend')]();
    } else {
        formData = new FormData(this);
    }


    $.ajax({
        url: $(this).attr('action'),
        method: $(this).attr('method'),
        processData: false,
        contentType: false,
        data: formData,
        complete:  () =>  {
            $(this).find('.ajax-btn').removeClass('active');
        },
        success: (e) => {
            
            $('.send_btn i').addClass('fa fa-paper-plane').removeClass('icon-loader fa-spin');

            if( $(this).attr('reset') ) {
                $(this).trigger("reset");
            }

            if( $(this).attr('message') ) {
                window.swal.fire({
                    icon: 'success',
                    toast: true,
                    showConfirmButton: false,
                    position: 'top-end',
                    timer: 3000,
                    title:  $(this).attr('message')
                })
            }

            
            if( $(this).attr('callback')  ) {
                window[$(this).attr('callback')](e);
            }
        }
    })
});