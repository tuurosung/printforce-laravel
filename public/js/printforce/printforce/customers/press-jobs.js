// Filter form on submit
$('#filter_jobs_frm').on('submit', function (event) {
    event.preventDefault();

    var url = "{{ route('jobs.press.filter') }}";

    $.post(url, $(this).serialize())
        .done(function (data) {
            $('tbody').html('');
            $('tbody').append(data);

            bindEvents();
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
$('#press_service_id').on('change', function (event) {
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



$("#press_copies").on('keyup', function (event) {
    event.preventDefault();
    calculatePressJobTotal()
});


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
