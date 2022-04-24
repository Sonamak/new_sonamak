$('.extra_section').on({
    click: function ()  {
        let container = $(this).attr('data-container');
        let methodAppend = $(this).attr('method-append');
        $(container).append(window[methodAppend]());
        $(container).find('.empty_section').addClass('d-none');
    }
});

$(document).on('click','.remove_section',function(){
    let container = $(this).attr('data-container');

    $(this).closest('.section').remove();

    if( $(container).children().length == 1 ) {

        $(container).find('.empty_section').removeClass('d-none');

    }
    
});