/**
 * JS for Manage Jobs page
 */

$(function () {
    var manageJobsDatatable = $('#manage_jobs_datatable').on('preXhr.dt', function (e, settings, data) {
        // data.filters = {
        //     show_trashed: $('#show_trashed').prop('checked') === true ? 1 : 0
        // }
    }).DataTable({
        orderable: true,
    });
});