$(function () {

    $('*[data-toggle="modal"]').click(function (event) {
        event.preventDefault();

        var formId = $(this).attr('data-form-id');

        $('#are-you-sure-modal').find('#yes').click(function () {
            $(formId).submit();
        });
    });

});
