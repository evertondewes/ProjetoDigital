window.$ = window.jQuery = require('jquery');

require('popper.js');

require('bootstrap');

// --------------------------------------------------------------
var areaCode = $('#area_code');

if (window.old.hasOwnProperty('area_code') && areaCode.length) {
    areaCode.val(window.old.area_code);
}
// --------------------------------------------------------------

var sidebarWidth = 210;

$('#sidebar').find('.navbar .close').click(function () {
    $('#sidebar').css('display', 'none');
    $('#content').css('margin-left', '0');
    $('.sidebar-burger').show();
});

$('.sidebar-burger').click(function () {
    $('#sidebar').css('display', 'block');
    $('#content').css('margin-left', sidebarWidth + 'px');
    $('.sidebar-burger').hide();
});
