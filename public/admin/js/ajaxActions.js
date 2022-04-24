$.ajaxSetup({

    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Accept': "application/json"
    },

    beforeSend: () => {
        $('.error').each(function() {
            $(this).text('');
        });

        $('.form_submit').addClass('active');
    },

    error: (e) => {
        let errors = e.responseJSON.errors;
        $('.ajax-btn').removeClass('active');

        for (error in errors ) {
            console.log(error,$(`p.error_${error}`));
            $(`p.error_${error}`).text(errors[error]);
        }
        
        $('.form_submit').removeClass('active');
    }
});

$(document).on('submit','.ajax-form',function(e) {
    e.preventDefault();

    $(this).find('.form_submit').addClass('active');

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
        
        success: (e) => {
            
            if($(this).attr('callback').length > 0)
                window[$(this).attr('callback')](e);
        }

    })
});