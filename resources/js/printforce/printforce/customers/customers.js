document.addEventListener('DOMContentLoaded', function () {

$('#newCustomerModal').on('shown.bs.modal', function () {
    $('#name').focus();
});

$('#searchCustomer').on('keyup', function () {

    const url = window.routes.filterCustomers;

    $.get(url, $('#searchCustomersFrm').serialize(), function (data) {
        $('#data_holder').html(data);
    })
})

$(document).on('click', '.table tbody .edit', function (){

    var url = $(this).data('url')

    $.get(url)
        .done(function (data) {

            $('#modal_holder').html(data);
            $('#editCustomerModal').modal('show');
        })
})


$(document).on('click', '.table tbody .delete', function (){

    const $form = $(this).closest('form');

    bootbox.confirm("Are you sure you want to delete this customer?", function (answer) {
        if (answer) {
            $form.submit();
        }
    })
});

})
