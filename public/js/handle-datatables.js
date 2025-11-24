document.addEventListener('DOMContentLoaded', function () {

    if(typeof $ ==='undefined' || typeof jQuery ==='undefined'){
        return;
    }

    if (typeof $.fn.DataTable === 'undefined') {
        return;
    }

    $('.datatable').DataTable({
        'sorting': false,
        'paging': false,
        'searching': false,
        'stateSave': true,
        language: {
            search: ""
        },
        responsive: true,
        buttons: [{
            extend: 'print',
            className: 'btn btn-default'
        },
        {
            extend: 'csv',
            className: 'btn btn-default'
        }
        ]
    });


    $('.datatables').DataTable({
        'sorting': false,
        'paging': true,
        'stateSave': true,
        pageLength: 10,
        responsive: true,
        buttons: [{
            extend: 'print',
            className: 'btn btn-default'
        },
        {
            extend: 'csv',
            className: 'btn btn-default'
        }
        ],
        language: {
            search: '',
            searchPlaceholder: "Search..."
        },
    })

});
