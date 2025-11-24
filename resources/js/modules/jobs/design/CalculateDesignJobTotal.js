import { GetServiceCost } from "../../print-services/GetServiceCost";

export const CalculateDesignJobTotal = {

    selectors: {},

    constructor() {
        this.selectors = {
            $parent: null,
            designService: '[name="service_id"]',
            unitCost: '[name="unit_cost"]',
            qty: '[name="copies"]',
            subTotal: '[name="sub_total"]',
            premium: '[name="premium"]',
            discount: '[name="discount"]',
            total: '[name="total"]'
        }
    },

    initForm($parent) {

        if (!$parent || $parent.length === 0) {
            console.error('Invalid parent container provided');
            return;
        }

        this.constructor();

        this.selectors.$parent = $parent;

        this.bindEvents();
        this.calculateTotal();
    },


    bindEvents() {
        const $parent = this.selectors.$parent;

        $parent.on('input', `${this.selectors.unitCost}, ${this.selectors.qty}, ${this.selectors.premium}, ${this.selectors.discount}`, () => {
            this.calculateTotal()
        })

        $parent.on('change', `${this.selectors.designService}`, this.handleServiceChange.bind(this));
    },


    async handleServiceChange(event) {
        // event.preventDefault();

        try {

            var service_cost = await GetServiceCost.getServiceCostWithCustomerId(
                $(event.currentTarget).data('fetch_url'),
                $(event.currentTarget).val(),
                $(event.currentTarget).data('customer_id')
            )

            this.selectors.$parent.find(this.selectors.unitCost).val(service_cost);
            this.calculateTotal();

        } catch (error) {
            console.error('Error handling design service change:', error);
        }
    },

    calculateTotal() {

        const $parent = this.selectors.$parent;

        const unitCost = this.getNumericValue($parent, this.selectors.unitCost);
        const qty = this.getNumericValue($parent, this.selectors.qty);
        const premium = this.getNumericValue($parent, this.selectors.premium)
        const discount = this.getNumericValue($parent, this.selectors.discount)

        const designCost = this.calculateDesignCost(unitCost, qty);

        const total = designCost + premium - discount;

        this.updateFormFields($parent, {
            [this.selectors.subTotal]: designCost,
            [this.selectors.total]: total
        })
    },

    calculateDesignCost(unitCost, qty) {
        return unitCost * qty;
    },

    applyPremium(designCost, premium) {
        return designCost + premium;
    },

    applyDiscount(designCost, discount) {
        return designCost - discount;
    },

    formatCurrency(value) {
        Math.round(value);
        return value.toFixed(2);
    },

    getNumericValue($parent, selector) {

        const $element = $parent.find(selector);
        const value = $element.val();

        console.log('Getting numeric value for selector:', selector, 'Value:', value);

        if (!value || value.trim().length === 0) {
            console.warn(`Invalid or empty numeric value for selector: ${selector}`);
            return 0;
        }

        const parsedValue = parseFloat(value);
        return parsedValue;
    },


    updateFormFields($parent, fieldMap) {
        Object.entries(fieldMap).forEach(([selector, value]) => {
            const formattedValue = this.formatCurrency(value);
            $parent.find(selector).val(formattedValue);
        });
    },


    destroy() {
        const $parent = this.selectors.$parent;
        $parent.off('input', `${this.selectors.unitCost}, ${this.selectors.qty}, ${this.selectors.premium}, ${this.selectors.discount}`);
        $parent.off('change', `${this.selectors.designService}`);
    }



}


$(document).on('shown.bs.modal', '#new_design_job_modal', () => {
    const parent = $('#new_design_job_modal');
    CalculateDesignJobTotal.initForm(parent);
});
