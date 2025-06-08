// Filter form on submit
$('#filter_jobs_frm').on('submit', function (event) {
    event.preventDefault();

    var url = window.routes.filterPressJobs;

    $.get(url, $(this).serialize())
        .done(function (data) {
            $('#data_holder').html(data);
        })
        .fail(function (data) {
            bootbox.alert(data);
        });
});


/**
 * Fetches the cost of a service based on its ID.
 * @param {number} serviceId - The ID of the service to fetch the cost for.
 * @returns {Promise<number>} A promise that resolves to the cost of the service.
 */
$(document).on('change', '#press_service_id', function (event) {
    event.preventDefault();
    var service_id = $(this).val();

    if (service_id !== '') {

        const service_cost = getServiceCost(service_id);

        service_cost.then(function (cost) {

            $("#press_cost").val(cost);
            $('#press_copies, #press_total').val('');
            $('#press_copies').focus();
        }).catch(function (error) {
            console.error('Error fetching service cost:', error);
            alert('Failed to retrieve service cost. Please try again.');
        })
    }

}); //end change event


$(document).on('keyup', '#press_copies', function (event) {
    event.preventDefault();
    calculatePressJobTotal()
});


$(document).on('click', '.table tbody .edit', function (event) {
    event.preventDefault();

    var url = $(this).data('url');

    $.get(url, function (response) {
        $('#modal_holder').html(response);
        $('#edit_press_job_modal').modal('show');

        // initialize the datepicker for the edit form
        initializeDatepickers();
    }).fail(function (error) {
        console.error('Error fetching edit form:', error);
        bootbox.alert('Failed to load edit form. Please try again.');
    });
})

$(document).on('click', '.table tbody .delete', function (event) {
    var $form = $(this).closest('form');

    bootbox.confirm("Are you sure you want to delete this job?", function (answer) {
        if (answer) {
            $form.submit();
        }
    })
}); //end click


/**
 * Calculates the total cost for a press job by multiplying cost per unit by number of copies.
 * Updates the press_total input field with the calculated result.
 *
 * @returns {void}
 */
function calculatePressJobTotal() {
    /**
     * Helper function to safely parse numeric values from input fields
     * @param {string} selector - jQuery selector for the input field
     * @returns {number} Parsed numeric value or 0 if invalid
     */
    const getValue = (selector) => {
        const value = $(selector).val();
        return (value === '' || isNaN(value) || value === 'undefined') ? 0 : parseFloat(value);
    };

    const pressCost = getValue('#press_cost');
    const pressCopies = getValue('#press_copies');
    const total = Math.ceil(pressCost * pressCopies).toFixed(2);

    $('#press_total').val(total);
}
