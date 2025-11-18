// import { init } from "../../bootbox";

// initialize the selected element
const url = window.routes.filterCustomersJson;

$('#filterCustomerId2').select2({
    ajax: {
        url: url,
        dataType: 'json',
        data: function (params) {
            return {
                search_term: $.trim(params.term)
            };
        },
        processResults: function (data) {
            return {
                results: data
            };
        },
        cache: true
    }
});

$('#new_payment_modal').on('shown.bs.modal', function (event) {
    event.preventDefault();

    $('#date').datepicker()

    $('#date').on('change', function (event) {
        event.preventDefault();
        $(this).datepicker('hide')
    });

    $('#amount_paid').focus()
});

// initialize the datepicker
$('#start_date,#end_date,#payment_date').datepicker()
$('#start_date,#end_date,#payment_date').on('change', function (event) {
    event.preventDefault();
    $(this).datepicker('hide')
});

$('table tbody').on('click', '.receipt', function (event) {
    event.preventDefault();
    var payment_id = $(this).attr('ID')
    print_popup('payment_receipt.php?payment_id=' + payment_id)
});


$(document).on('click', '.table tbody .edit', function (event) {
    event.preventDefault();
    var url = $(this).data('url');

    $.get(url, function (response) {
        $('#modal_holder').html(response);
        $('#edit_payment_modal').modal('show');
        initializeSelect2();
        initializeDatepickers();
    })
});

$(document).on('click', '.table tbody .delete', function (event) {
    event.preventDefault();
    var $form = $(this).closest('form');

    bootbox.confirm('Are you sure you want to delete this payment?', function (confirmed) {
        if (confirmed) {
            $form.submit();
        }
    });
})

/**
 * Filter cash payments
 */
$('#filter_cash_payments_frm').on('submit', function (event) {
    event.preventDefault();

    var start_date = $('#start_date').val();
    var end_date = $('#end_date').val();
    var customer_id = $('#filterCustomerId').val();
    $('#filter_cash_payment_frm').serialize();
    // var _token = ;
    const url = "{{ route('filter.payments') }}";

    $.post(url, {
        _token: "{{ csrf_token() }}",
        start_date,
        end_date,
        customer_id
    },
        function (data) {
            $('#data_holder').html(data);
        }
    );

});
