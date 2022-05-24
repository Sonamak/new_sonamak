let dataTransfere = new DataTransfer;

$('.gallary_btn').on({
    click: function () {
       let data_input = $(this).attr('data-insert');
       $(data_input).click();
    }
});

$('.insert_gallary').on({

    change: function () {
        file = $(this)[0].files[0];
        let fileTypeExtention = file.type;
        let fileType = fileTypeExtention.split('/').shift();
        let sizeOutRange = (file.size > 500000) ? true : false;
        $('.gallary_empty').addClass('d-none');

        if( fileType == 'image' && ! sizeOutRange) {
            dataTransfere.items.add(file);

            $(`${$(this).attr('data-append')}`)[0].files = dataTransfere.files;

            var fr = new FileReader();
            fr.readAsDataURL(file);
            fr.onload = () => {
                let gallary_error_class = `error_gallary_${$('.appended_gallary').length}`
                $(`${$(this).attr('data-container')} .row`).append(`
                    <div class="col-md-3 gallary_image appended_gallary">
                        <div class="image_container d-flex justify-content-center w-100 p-2">
                            <img src="${fr.result}" alt="badget" id="${file.lastModified}" class="gallary_image">
                            <div class="overlay_image position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                                <i class="fas fa-times remove_gallary_btn" data-append="${$(this).attr('data-append')}" rel="${file.lastModified}"></i>
                            </div>
                        </div>
                        <p class="error ${gallary_error_class}"></p>
                    </div>
                `)
            }

        } else {
            let gallary_error = document.querySelector('.error_gallary');
            gallary_error.innerHTML = '';
            if ( fileType != 'image' ) {
                gallary_error.innerHTML += '<p>Please add image only</p>'
            }

            if ( sizeOutRange ) {
                gallary_error.innerHTML += '<p>Please add image with size lower than 500kb</p>'
            }

        }
    }
});

$(document).on('click','.remove_gallary_btn',function(){

    if( ! $(this).attr('model_id') ) {
        let rel = $(this).attr('rel');

        let index = Array.from(dataTransfere.files).findIndex(x => x.lastModified == rel);

        dataTransfere.items.remove(index);

        $(`${$(this).attr('data-append')}`)[0].files = dataTransfere.files;

    } else {
        let model_id = $(this).attr('model_id');

        $('.removed_gallary').append(`
            <input type="hidden" value="${model_id}" name="removed_gallary[]">
        `)
    }

    $(this).closest('.gallary_image').remove();

    if(!dataTransfere.files.length) {
        $('.gallary_empty').removeClass('d-none');
    }

})