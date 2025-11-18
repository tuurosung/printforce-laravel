$('#em_services').on('change', function () {
    const serviceId = $(this).val();

    const service_cost = getServiceCost(serviceId);

    service_cost.then(function (cost){
        $('#embroidery_unit_cost').val(cost)
        calculateEmbroideryTotal()
    }).catch(function (error) {
        console.error('Error fetching service cost:', error);
        $('#embroidery_unit_cost').val(0);
        $('#embroidery_total').val(0);
    });
});


$('#embroidery_qty, #mat_supply').on('keyup change', function (event) {

    // if mat_supply is changed to yes, then set the mat_unit_cost to 0.00 and readonly
    if ($('#mat_supply').val() === 'yes') {

        $('#mat_unit_cost').prop('readonly', false);
        $('#mat_unit_cost').focus();

    } else if ($('#mat_supply').val() === 'no') {

        // if mat_supply is changed to no, then set the mat_unit_cost to 0.00 and readonly
        $('#mat_unit_cost').val('0.00').prop('readonly', true);

    }

    calculateEmbroideryTotal();
})


$('#mat_unit_cost').on('keyup change', function (event) {
    calculateEmbroideryTotal();
})



function calculateEmbroideryTotal() {

    const getValue = (selector) => {
        const value = $(selector).val();
        return (value === '' || isNaN(value)) ? 0 : parseFloat(value);
    }

    const qty = getValue('#embroidery_qty');
    const cost = getValue('#embroidery_unit_cost');

    let embroideryCost = qty * cost;
    let purchaseCost = 0;

    const matSupply = $('#mat_supply').val();

    if (matSupply === 'yes') {

        const matUnitCost = getValue('#mat_unit_cost');
        purchaseCost = matUnitCost * qty;

    } else if (matSupply === 'no') {

        // set material unit cost to 0.00 if not supplying material and trigger readonly state
        $('#mat_unit_cost').val('0.00').prop('readonly', true);
        purchaseCost = 0;

    } else {
    }

    const embroideryTotal = embroideryCost + purchaseCost;

    $('#embroidery_purchase_cost').val(Math.round(purchaseCost).toFixed(2));
    $('#embroidery_cost').val(Math.round(embroideryCost).toFixed(2));
    $('#embroidery_total').val(Math.round(embroideryTotal).toFixed(2))
}
