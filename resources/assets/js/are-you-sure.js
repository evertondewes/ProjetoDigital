$(function () {

    $('button[data-toggle="modal"]').click(function () {
        var formId = $(this).attr('data-form-id');

        $('#are-you-sure-modal').find('#yes').click(function () {
            $(formId).submit();
        });
    });

});
