$('.cookie_dropdown').on('change',function () {
    $.ajax({
        url: `/cookie/${$(this).attr('data')}/${$(this).val()}`,
        complete: function () {
            window.location.reload();
        }
    })

});