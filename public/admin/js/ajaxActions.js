var pending = false;
var pending = false;

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        'Accept': "application/json"
    },

    beforeSend: () => {
        $('.error').each(function() {
            console.log($(this));
            $(this).text('');
        });

        $('.form_submit').addClass('active');
    },

    error: (e) => {
        pending = false;
        
        if (e.responseJSON) {
            let errors = e.responseJSON.errors;
            $('.ajax-btn').removeClass('active');

            for (error in errors ) {
                error_remove_dot = error.replace('.','_');
                $(`p.error_${error_remove_dot}`).text(errors[error]);
            }
            
            $('.form_submit').removeClass('active');
        }
        
    }
});

$(document).on('click','.delete-btn',function(e) {
    console.log($(this).attr('callback'))

    $('.modal .confirm_btn').attr('delete-route',$(this).attr('route'))
    $('.modal .confirm_btn').attr('callback',$(this).attr('callback'))

});

$(document).on('change','.switch',function () {

    let route = $(this).attr('route');
    let val = $(this).val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Accept': "application/json"
        },
        url: route,
        method: 'post',
        data: {value:$(this).val()}
    });
});


$(document).on('click','#deleteModel .confirm_btn',function () {

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Accept': "application/json"
        },
        url: $(this).attr('delete-route'),
        method: 'post',
        success:  (e) => {
            window[$(this).attr('callback')](e)

        }

    })

});

$(document).on('submit','.ajax-form',function(e) {
    e.preventDefault();
    

    if ( ! pending ) {
        console.log(pending)
        pending = true;
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

            beforeSend: () => {

                if( $(this).attr('beforeSend') )
                    window[$(this).attr('beforeSend')](e);

                if ( $(this).attr('emptyContainer') )
                    $($(this).attr('emptyContainer')).html('');

                $('.error').each(function() {
                    $(this).text('');
                });

                $('.overlay_loader').addClass('d-flex').removeClass('d-none');

            },

            complete: () => {
                pending = false;
                $('.overlay_loader').addClass('d-none').removeClass('d-flex');
            },  
            
            
            success: (e) => {
                
                if( $(this).attr('callback') )
                    window[$(this).attr('callback')](e);

                if( $(this).attr('swalOnSuccess') )  {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        icon: 'success',
                        background:'#4a4a69',
                        color: '#fff',
                        title: $(this).attr('swalOnSuccess')
                    })
                }

                if( $(this).attr('redirect') ) {
                    window.location.href = $(this).attr('redirect');
                }

                if( $(this).attr('resetAfterSend') != undefined) $(this).trigger('reset');

                if( $(this).attr('refreshAfterSend') != undefined) location.reload();
            },
        }).fail(() => {

            if( $(this).attr('swalOnFail') )  {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    width: '500',
                    showConfirmButton: false,
                    timer: 5000,
                    background:'#4a4a69',
                    color: '#fff',
                    timerProgressBar: true,
                    icon: 'error',
                    title: 'Opps...',
                    text: $(this).attr('swalOnFail')
                })
            }
        })
    }
});

