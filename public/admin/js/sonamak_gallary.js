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

        $('.gallary_empty').addClass('d-none');

        if( fileType == 'image' ) {
            dataTransfere.items.add(file);

            $(`${$(this).attr('data-append')}`)[0].files = dataTransfere.files;

            var fr = new FileReader();
            fr.readAsDataURL(file);
            fr.onload = () => {

                $(`${$(this).attr('data-container')} .row`).append(`
                    <div class="col-md-3 gallary_image">
                        <div class="image_container d-flex justify-content-center w-100 p-2">
                            <img src="${fr.result}" alt="badget" id="${file.lastModified}" class="gallary_image">
                            <div class="overlay_image position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                                <i class="fas fa-times remove_gallary_btn" data-append="${$(this).attr('data-append')}" rel="${file.lastModified}"></i>
                            </div>
                        </div>
                    </div>
                `)
            }

        }
    }
});

$(document).on('click','.remove_gallary_btn',function(){

    let rel = $(this).attr('rel');

    let index = Array.from(dataTransfere.files).findIndex(x => x.lastModified == rel);

    dataTransfere.items.remove(index);

    $(`${$(this).attr('data-append')}`)[0].files = dataTransfere.files;

    $(this).closest('.gallary_image').remove();

    if(!dataTransfere.files.length) {
        $('.gallary_empty').removeClass('d-none');
    }

})