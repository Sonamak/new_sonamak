$('.extra_section').on({
    click: function ()  {
        let container = $(this).attr('data-container');
        let methodAppend = $(this).attr('method-append');
        $(container).append(window[methodAppend]());
        $(container).find('.empty_section').addClass('d-none');
    }
});

$('.add_prefrence').on({
    click: function () {

        let container = $(`${$(this).attr('data-container')}`);
        let methodAppend = $(this).attr('method-append');
        let input = $($(this).attr('input'));
        
        console.log(input)

        if ( input.val() ) {
            alert('das')
            $(container).append(window[methodAppend](input.val()));
        }

        input.val('');


    }
})

$(document).on('click','.remove_section',function(){
    let container = $(this).attr('data-container');
    let removed_name = $(this).attr('name');

    $(this).closest('.section').remove();

    if ( removed_name )  {

        let id = $(this).attr('id')

        $('.removed_section_container').append(
            `
                <input type="hidden" name="${removed_name}" value="${id}">
            `
        )


    }

    if( $(container).children().length == 1 ) {

        $(container).find('.empty_section').removeClass('d-none');

    }
    
});