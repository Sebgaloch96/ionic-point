/**
 * *** NOTICE ***
 * Only include the JS that you want to share between multiple pages in the hub
 */

window.moment = require('moment');

$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')                
        }
    });
    
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
});


