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

$(document).on('click','.delete_btn',function(e) {

    $('.modal .confirm_btn').attr('delete-route',$(this).attr('route'))
    $('.modal .confirm_btn').attr('callback',$(this).attr('callback'))

});

$(document).on('change','.feature_tour_check',function () {
    $.ajax({
        url: 'tour/feature/'+$(this).attr('model_id'),
        method: 'post'
    });
})

$(document).on('click','#deleteModel .confirm_btn',function () {
    alert('asd');
    $.ajax({
        url: $(this).attr('delete-route'),
        method: 'post',
        success:  (e) => {
            console.log($(this).attr('callback'))
            window[$(this).attr('callback')](e)

        }

    })

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

    if( $(this).attr('appendToData') ) {
        
        data = window[$(this).attr('appendToData')]();

        for ( element in data ) {

            formData.append(element,JSON.stringify(data[element]));

        }

    }


    $.ajax({

        url: $(this).attr('action'),

        method: $(this).attr('method'),

        processData: false,

        contentType: false,

        data: formData,
        
        success: (e) => {
            
            if( $(this).attr('callback') )
                window[$(this).attr('callback')](e);

            if( $(this).attr('redirect') ) {
                window.location.href = $(this).attr('redirect');
            }
        }

    })
});

