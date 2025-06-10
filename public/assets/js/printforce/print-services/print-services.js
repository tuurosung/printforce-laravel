$('#new_service_modal').on('shown.bs.modal', function () {
    $('#service_name').focus();
    $('#service_category').select2({
        dropdownParent: $('#new_service_modal'),
    })
});

$(document).on('click', '.table tbody .edit', function () {

    const url = $(this).data('url')

    $.get(url, function (msg) {
        
        $('#modal_holder').html(msg)
        $('#edit_service_modal').modal('show')

        $('#edit_service_modal').on('shown.bs.modal', function () {
            $('#service_name').focus();
            $('#edit_service_category').select2({
                dropdownParent: $('#edit_service_modal'),
            })
        });

    })
})



$(document).on('click', '.table tbody .delete', function () {

    const $form = $(this).closest('form');

    bootbox.confirm("Are you sure you want to delete this service?", function (answer) {

        if (answer) {
            $form.submit();
        }
    });

})
