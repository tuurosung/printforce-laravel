$('#account_number, #customer_id').select2({
    dropdownParent: $('#new_payment_modal'),
});
$('#date').datepicker();

$('#date').on('change', function () {
    $(this).datepicker('hide')
})

setTimeout(function () {
    $('#amount_paid').focus()
}, 300);


$('#new_payment_frm').on('submit', function (event) {
    event.preventDefault();
    $(this).submit(function (event) {
        return false;
    });
    $.ajax({
        url: '../serverscripts/admin/Payments/new.php',
        type: 'GET',
        data: $('#new_payment_frm').serialize(),
        success: function (msg) {
            if (msg === 'save_successful') {
                bootbox.alert("Payment Recorded Successfully", function () {
                    window.location.reload()
                })
            } else {
                bootbox.alert(msg)
            }
        }
    }) //end ajax
}); //end large format submit

$('#new_payment_modal').on('shown.bs.modal', function (event) {
    event.preventDefault();

    $('#date').datepicker()

    $('#date').on('change', function (event) {
        event.preventDefault();
        $(this).datepicker('hide')
    });

    $('#amount_paid').focus()
});
