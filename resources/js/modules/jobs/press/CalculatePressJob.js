import { GetServiceCost } from "../../print-services/GetServiceCost";

export const CalculatePressJob = {

    selectors: {},

    constructor() {
        this.selectors = {
            $parent: null,
            pressService: '[name="service_id"]',
            qty: '[name="copies"]',
            unitCost: '[name="cost"]',
            total: '[name="total"]'
        }
    },


    initForm($parent) {

        if (!$parent || $parent.length === 0) {
            console.error('Invalid parent container provided');
            return;
        }

        // iniitize selectors
        this.constructor();
        this.selectors.$parent = $parent;

        this.bindEvents($parent);
        this.calculateTotal($parent);
    },


    bindEvents($parent) {

        $parent.on('input', `${this.selectors.qty}`, () => {
            this.calculateTotal($parent);
        })

        $parent.on('change', `${this.selectors.pressService}`,  this.handleServiceChange.bind(this));
    },


    async handleServiceChange(event) {
        event.preventDefault();

        try {

            const service_cost = await GetServiceCost.getServiceCostWithCustomerId(
                $(event.currentTarget).data('fetch_url'),
                $(event.currentTarget).val(),
                $(event.currentTarget).data('customer_id')
            );

            this.selectors.$parent.find(this.selectors.unitCost).val(service_cost);
            const parent = this.selectors.$parent;
            this.calculateTotal(parent);

        } catch (error) {
            console.error('Error handling press service change:', error);
        }
    },


    calculateTotal($parent) {

        const qty = this.getNumericValue($parent, this.selectors.qty);
        const unitCost = this.getNumericValue($parent, this.selectors.unitCost);

        const total = qty * unitCost;

        this.updateFormFields($parent, {
            [this.selectors.total]: total,
        });
    },


    getNumericValue($parent, selector) {

        const $element = $parent.find(selector);
        const value = this.formatCurrency($element.val());

        if (!$element || $element.length === 0) {
            console.error(`Element not found for selector: ${selector}`);
            return 0;
        }

        if (!value || value.trim().length === 0) {
            console.warn(`Invalid numeric value for selector: ${selector}`);
            return 0;
        }

        const parsedValue = parseFloat(value);
        return parsedValue;
    },


    formatCurrency(value) {

        if (isNaN(value) || value === null || value === undefined) {
            console.warn('Invalid value for currency formatting:', value);
            return 0;
        }

        Math.round(value);
        return parseFloat(value).toFixed(2);
    },


    updateFormFields($parent, fieldMap) {
        Object.entries(fieldMap).forEach(([selector, value]) => {
            const formattedValue = this.formatCurrency(value);
            $parent.find(selector).val(formattedValue);
        });
    }
}


$(document).on('shown.bs.modal', '#new_press_job_modal', () => {
    const $parent = $('#new_press_job_modal');
    CalculatePressJob.initForm($parent);
});
