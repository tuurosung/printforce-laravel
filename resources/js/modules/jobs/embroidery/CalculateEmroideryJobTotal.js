export const CalculateEmbroideryJobTotal = {

    config: {},

    elements: {},

    init: function () {
        this.cachedElements();
        this.bindEvents();
    },


    cachedElements: function () {

    },


    bindEvents: function () {

    },

    handleInputChange: function (parent) {

        parent.on('input', '[name="qty"], [name="mat_unit_cost"]', () => {
            this.calculateEmbroideryTotal(parent);
        });
    },


    calculateEmbroideryTotal(parent) {

        const $unitCost = this.getValue(parent, 'unit_cost');
        const $quantity = this.getValue(parent, 'qty');
        const $matSupply = parent.find('[name="mat_supply"]').val();
        const $matUnitCost = this.getValue(parent, 'mat_unit_cost');

        let embroideryCost = $quantity * $unitCost;

        let purchaseCost = 0;

        if ($matSupply === 'yes') {
            purchaseCost = $matUnitCost * $quantity;
        } else if ($matSupply === 'no') {
            purchaseCost = 0;
        }

        const embroideryTotal = embroideryCost + purchaseCost;

        parent.find(
            $('[name="purchase_cost"]').val(
                Math.round(purchaseCost).toFixed(2)
            )
        );

        parent.find(
            $('[name="cost"]').val(
                Math.round(embroideryCost).toFixed(2)
            )
        );

        parent.find(
            $('[name="embroidery_cost"]').val(
                Math.round(embroideryTotal).toFixed(2)
            )
        );

        parent.find(
            $('[name="total"]').val(
                Math.round(embroideryTotal).toFixed(2)
            )
        );
    },


    getValue(parent, selector) {
        const value = parent.find(
            $(`[name="${selector}"]`)
        ).val();

        if (!value || isNaN(value)) {
            return 0;
        }

        return parseFloat(value);
    }

}

$(document).ready(() => CalculateEmbroideryJobTotal.init());
