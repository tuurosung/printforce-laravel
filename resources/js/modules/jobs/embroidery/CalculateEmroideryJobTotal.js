export const CalculateEmbroideryJobTotal = {

    selectors: {},

    constructor() {
        this.selectors = {
            qty: '[name="qty"]',
            unitCost: '[name="unit_cost"]',
            matUnitCost: '[name="mat_unit_cost"]',
            matSupply: '[name="mat_supply"]',
            embroideryCost: '[name="embroidery_cost"]',
            purchaseCost: '[name="purchase_cost"]',
            total: '[name="total"]'
        };
    },

    initForm($parent) {

        if (!$parent || !$parent.length) {
            console.error('Invalid parent container provided');
            return;
        }

        this.constructor();

        this.bindEvents($parent)
        this.calculateTotal($parent);
    },

    bindEvents: function ($parent) {
        $parent.on('input', `${this.selectors.qty}, ${this.selectors.matUnitCost}`, () => {
            this.calculateTotal($parent);
        })

        $parent.on('change', `${this.selectors.matSupply}`, () => {
            this.handleMatSupplyChange($parent);
            this.calculateTotal($parent)
        })
    },


    calculateTotal($parent) {
        const quantity = this.getNumericValue($parent, this.selectors.qty);
        const unitCost = this.getNumericValue($parent, this.selectors.unitCost);
        const matSupply = $parent.find(this.selectors.matSupply).val();
        const matUnitCost = this.getNumericValue($parent, this.selectors.matUnitCost);

        // calculate Costs
        const embroideryCost = this.calculateEmbroideryCost(quantity, unitCost);
        const purchaseCost = this.calculatePurchaseCost(matSupply, matUnitCost, quantity);
        const totalCost = embroideryCost + purchaseCost;

        this.updateFormFields($parent, {
                [this.selectors.purchaseCost] : purchaseCost,
                [this.selectors.embroideryCost] : embroideryCost,
                [this.selectors.total] : totalCost
            }
        );

        this.logCalculation($parent, {quantity, unitCost, matSupply, matUnitCost, embroideryCost, purchaseCost, totalCost});

    },

    calculateEmbroideryCost(quantity, unitCost) {
        return quantity * unitCost;
    },

    calculatePurchaseCost(matSupply, matUnitCost, quantity) {
       return matSupply === 'yes' ? matUnitCost * quantity : 0;
    },

    getNumericValue($parent, selector) {
        const $element = $parent.find(selector);
        const value = $element.val();

        if (!value || value.trim().length === 0) {
            console.warn(`Invalid or empty numeric value for selector: ${selector}`);
            return 0;
        }

        const parsedValue = parseFloat(value);

        if (isNaN(parsedValue)) {
            console.warn(`Non-numeric value for selector: ${selector} - Value: ${value}`);
            return 0;
        }
        return parsedValue;
    },

    updateFormFields($parent, fieldMap) {
        Object.entries(fieldMap).forEach(([selector, value]) => {
            const formattedValue = this.formatCurrency(value);
            $parent.find(selector).val(formattedValue);
        });
    },

    formatCurrency(value) {
        Math.round(value);
        return value.toFixed(2);
    },

    handleMatSupplyChange($parent) {

        const $matUnitCost = $parent.find(this.selectors.matUnitCost);
        const $matSupply = $parent.find(this.selectors.matSupply).val();

        if ($matSupply === 'yes') {
            $matUnitCost.prop('readonly', false);
            $matUnitCost.focus();
        } else {
            $matUnitCost.val(0).prop('readonly', true);
        }

    },

    logCalculation($parent, data) {
        const formId = $parent.attr('id') || 'unknown';
        console.log(`Embroidery Job Calculation [${formId}]:`, {
            quantity: data.quantity,
            unitCost: data.unitCost,
            embroideryCost: data.embroideryCost,
            purchaseCost: data.purchaseCost,
            total: data.totalCost
        });
    },

    destroy() {
        $parent.off('input change');
    },


}

$(document).ready(() => CalculateEmbroideryJobTotal.initForm($(this)));
