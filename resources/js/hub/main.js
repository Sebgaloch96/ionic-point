/**
 * *** NOTICE ***
 * Only include the JS that you want to share between multiple pages in the hub
 */

$(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
});