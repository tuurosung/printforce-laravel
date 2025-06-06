/**
 * Handle the design job service drop down on change
 * This will set the cost of the service in the cost input field
 */
$('#design_service_id').on('change', function (event) {
    event.preventDefault();

    var service_id = $(this).val();

    var service_cost = getServiceCost(service_id);

    service_cost.then(function (cost) {
        $('#design_cost').val(cost);
        $('#design_total').val((parseFloat($('#design_copies').val()) * cost).toFixed(2));
    }).catch(function (error) {
        console.error('Error fetching service cost:', error);
        $('#design_cost').val(0);
        $('#design_total').val(0);
    });

    setTimeout(function () {
        $('#design_copies').focus()
    }, 300);

});

/**
 * Handle the design job copies input on keyup
 * This will calculate the total cost based on the number of copies and the service cost
 */
$("#design_copies").on('keyup', function (event) {
    const copies = parseInt($('#design_copies').val()) || 0;
    const cost = parseFloat($('#design_cost').val()) || 0;

    $('#design_total').val((copies * cost).toFixed(2));
});
