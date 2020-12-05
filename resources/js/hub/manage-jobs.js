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
        ajax: '/api/hub/jobs/datatable',
        columns: [
            {
                data: 'title',
            },
            {
                data: 'status',
                render: function (data, type, row) {
                    return `
                        <span class="badge badge-success">${data}</span>
                    `;
                }
            },
            {
                data: 'start_date',
                render: function (data, type, row) {
                    return moment(data).format('DD/MM/YYYY');
                }
            },
            {
                render: function (data, type, row) {
                    return row.address.address_line_1 + ', ' + row.address.postcode;
                } 
            },
            {
                render: function (data, type, row) {
                    return '';
                }
            },
            {
                data: 'public',
                class: 'text-center',
                render: function (data, type, row) {
                    var icon = 'fa-eye-slash';
                    if (row.public) {
                        icon = 'fa-eye';
                    } 
                    return `<i class="far ${icon} fa-lg toggle-public" data-toggle="tooltip" title="Click to toggle" data-uuid="${row.uuid}"></i>`;
                }
            },
            {
                data: 'uuid',
                render: function (data, type, row) {
                    return '';
                }
            }
        ]
    });

    $('#manage_jobs_datatable tbody').on('click', '.toggle-public', function () {
        var uuid = $(this).data('uuid');
        var url = `/api/hub/jobs/${uuid}/toggle-public`;

        $.ajax({
            type: 'POST',
            url: url
        }).done(function (response) {
            manageJobsDatatable.ajax.reload(null, false);
        });
    });
});