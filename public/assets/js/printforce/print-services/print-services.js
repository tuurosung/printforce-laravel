$('#new_service_modal').on('shown.bs.modal', function () {
    $('#service_name').focus();
    $('#service_category').select2({
        dropdownParent: $('#new_service_modal'),
    })
});

$('.table tbody').on('click', '.edit_service', function (event) {

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


$('.table tbody').on('click', '.delete_service', function (event) {

    const $this = $(this);

    new swal("Confirm", "Are you sure you want to delete this service?", "warning", {
        buttons: {
            cancel: "Cancel",
            catch: {
                text: "Yes! Delete it!",
                value: "catch",
            }
        }
    })
        .then((value) => {
            switch (value) {
                case "cancel":
                    break;
                case "catch":
                    $this.closest('form').submit();
                    break;

                default:
                    break;
            }
        });


})
