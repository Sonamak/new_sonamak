$('.cookie_dropdown').on('change',function () {
    $.ajax({
        url: `/cookie/${$(this).attr('data')}/${$(this).val()}`,
        complete: function () {
            window.location.reload();
        }
    })

});

$('.switch').on('click',function () {

    if ( $(this).attr('type') == 'language' ) {
        $(`.language_dropdown option[value="${$(this).attr('value')}"]`).trigger('click');
    }

    $.ajax({
        url: `/cookie/${$(this).attr('type')}/${$(this).attr('value')}`,
        complete: function () {
            setTimeout(function(){
                window.location.reload()
            },1000);
        }
    })
})