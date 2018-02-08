window.$ = window.jQuery = require('jquery');

require('popper.js');

require('bootstrap');

$('#sidebar').find('.navbar .close').click(function () {
    $('#sidebar').css('display', 'none');
    $('#content').css('margin-left', '0');
    $('.sidebar-burger').show();
});

$('.sidebar-burger').click(function () {
    $('#sidebar').css('display', 'block');
    $('#content').css('margin-left', '250px');
    $('.sidebar-burger').hide();
});
