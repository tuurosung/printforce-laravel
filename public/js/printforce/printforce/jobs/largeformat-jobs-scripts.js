// Filter form on submit
$('#filter_jobs_frm').on('submit', function (event) {
    event.preventDefault();

    var url = window.routes.filterLargeFormatJobs;

    $.post(url, $(this).serialize())
        .done(function (data) {
            $('#data_holder').html(data);
        })
        .fail(function (data) {
            bootbox.alert(data);
        });
});


/**
 * Handle the click events for the edit click event
 */
$(document).on('click', '.table tbody .edit', function (event) {
    event.preventDefault();
    var url = $(this).data('url');

    $.get(url, function (response){
        $('#modal_holder').html(response);
        $('#edit_largeformat_modal').modal('show');

        $('#edit_largeformat_service_id').on('change', function (event) {
            event.preventDefault();

            var service_id = $(this).val();

            var service_cost = getServiceCost(service_id);

            service_cost.then(function (cost) {
                $('#edit_largeformat_cost').val(cost);
                calculateLargeFormatTotal();
            }).catch(function (error) {
                console.error('Error fetching service cost:', error);
                $('#vlargeformat_cost').val(0);
                $('#edit_largeformat_total').val(0);
            })


            setTimeout(function () {
                $('#edit_width').focus()
            }, 300);

        });


        $('#edit_measuring_unit').on('change', function (event) {
            event.preventDefault();
            resetLargeFormatFields()
        });

        $("#edit_largeformat_copies, #edit_largeformat_premium, #edit_largeformat_discount, #edit_height, #edit_width").on('keyup change', function (event) {
            event.preventDefault();
            calculateLargeFormatTotal();
        });
    })
});

$(document).on('click', '.table tbody .delete', function (event) {

    var $form = $(this).closest('form');

   bootbox.confirm("Are you sure you want to delete this job?", function (answer) {
        if (answer) {
            $form.submit();
        }
    }
    );

})



// reset the width, height, copies and total when the measuring unit changes
function resetLargeFormatFields() {
    $('#edit_width, #edit_height, #edit_largeformat_copies, #edit_largeformat_total, #edit_largeformat_premium, #edit_largeformat_discount').val('');
    $('#edit_width').focus();
}


function calculateLargeFormatTotal() {

    const getValue = (selector) => {
        const value = $(selector).val();
        return (value === '' || isNaN(value)) ? 0 : parseFloat(value);
    };

    const width = getValue('#edit_width');
    const height = getValue('#edit_height');
    const copies = getValue('#edit_largeformat_copies');
    const cost = getValue('#edit_largeformat_cost');
    const premium = getValue('#edit_largeformat_premium');
    const discount = getValue('#edit_largeformat_discount');

    const measuringUnit = $('#edit_measuring_unit').val();

    // exit early if any of the required fields are empty or invalid
    if (width <= 0 || height <= 0 || copies <= 0 || cost <= 0) {
        $('#edit_largeformat_total').val('0.00');
        return;
    }

    let baseTotal;

    if (measuringUnit === 'ft') {
        baseTotal = width * height * copies * cost;
    } else if (measuringUnit === 'inch') {
        baseTotal = ((width * height) / 144) * copies * cost;
    } else {
        return '0.00';
    }

    var total = Math.round(baseTotal + premium - discount).toFixed(2);

    $('#edit_largeformat_total').val(total);
    return;
}
