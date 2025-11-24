$('#lf_service').select2({
    dropdownParent: $('#new_largeformat_modal'),
});

var service_cost = $('#lf_service').find(":selected").data('cost');
$("#lf_cost").val(service_cost);
$('#width').focus()





// reset the width, height, copies and total when the measuring unit changes
function resetLargeFormatFields() {
    $('#width, #height, #largeformat_copies, #largeformat_total, #largeformat_premium, #largeformat_discount').val('');
    $('#width').focus();
}

$('#measuring_unit').on('change', function (event) {
    event.preventDefault();
    resetLargeFormatFields()
});

$("#largeformat_copies, #largeformat_premium, #largeformat_discount, #height, #width").on('keyup change', function (event) {
    event.preventDefault();
    calculateLargeFormatTotal();
});


/**
 *  Calculates the total cost for a large format job based
 * on the provided dimensions, copies, cost, premium, and discount.
 * @returns
 */
function calculateLargeFormatTotal() {

    const getValue = (selector) => {
        const value = $(selector).val();
        return (value === '' || isNaN(value)) ? 0 : parseFloat(value);
    };

    const width = getValue('#width');
    const height = getValue('#height');
    const copies = getValue('#largeformat_copies');
    const cost = getValue('#largeformat_cost');
    const premium = getValue('#largeformat_premium');
    const discount = getValue('#largeformat_discount');

    const measuringUnit = $('#measuring_unit').val();

    // exit early if any of the required fields are empty or invalid
    if (width <= 0 || height <= 0 || copies <= 0 || cost <= 0) {
        $('#largeformat_total').val('0.00');
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

    var total =  Math.round(baseTotal + premium - discount).toFixed(2);

    $('#largeformat_total').val(total);
    return;
}
