export const CalculateLargeFormatJobTotal = {

    /**
     * Handle the dimensional inputs in the edit job modal
     * This will recalculate the total cost when the user changes any of the following inputs:
     *   width
     *   height
     *   copies
     *   cost
     *   premium
     *   measuring unit
     *   discount
     */
    handleDimensionalInputsOnChange(parent) {

        parent.find($('[name="width"]'))

            .add(parent.find($('[name="height"]')))
            .add(parent.find($('[name="copies"]')))
            .add(parent.find($('[name="cost"]')))
            .add(parent.find($('[name="premium"]')))
            .add(parent.find($('[name="measuring_unit"]')))
            .add(parent.find($('[name="discount"]'))

        ).on('input', () => this.calculateLargeFormatTotal(parent))

        this.calculateLargeFormatTotal(parent);
    },


    /**
     * Calculate the total cost of a large format
     * job based on the given width, height, number of copies,
     * cost per unit area, premium and discount.
     * @param {jQuery} parent - The parent element of the form fields.
     */
    calculateLargeFormatTotal(parent) {

        const width = this.getValue(parent, 'width');
        const height = this.getValue(parent, 'height');
        const copies = this.getValue(parent, 'copies');
        const cost = this.getValue(parent, 'cost');
        const premium = this.getValue(parent, 'premium');
        const discount = this.getValue(parent, 'discount');
        const measuringUnit = this.getMeasuringUnit(parent);

        let total = 0;
        let subTotal = this.calculateSubTotal(width, height, measuringUnit, cost, copies);

        parent.find(
            $('[name="sub_total"]').val(
                Math.round(subTotal).toFixed(2)
            )
        );

        if (premium) {
            subTotal += premium;
        }

        if (discount) {
            subTotal -= discount;
        }

        parent.find(
            $('[name="total"]').val(
                Math.round(subTotal).toFixed(2)
            )
        );
    },


    /**
     * Retrieves the value of a input field with the given name selector from the given parent element.
     * If the value is empty or not a number, returns 0.
     * Otherwise, returns the parsed float value.
     *
     * @param {jQuery} parent - The parent element to search for the input field
     * @param {string} selector - The name selector of the input field to retrieve the value from
     * @returns {number} The parsed float value of the input field
     */
    getValue(parent, selector) {

        const value = parent.find(
            $('[name="' + selector + '"]')
        ).val();

        return (value === '' || isNaN(value)) ? 0 : parseFloat(value);
    },




    /**
    * Returns the measuring unit of the job based on the given parent element.
    * @param {jQuery} parent - The parent element of the job.
    * @return {string} The measuring unit of the job. Can be either 'ft' or 'inch'.
    */
    getMeasuringUnit(parent) {
        return parent.find(
            $('[name="measuring_unit"]')
        ).val();
    },



    /**
     * Calculates the subtotal of a large format job based on the width, height, measuring unit, cost, and copies.
     *
     * @param {number} width - The width of the job in the given measuring unit.
     * @param {number} height - The height of the job in the given measuring unit.
     * @param {string} measuring_unit - The measuring unit of the job. Can be either 'ft' or 'inch'.
     * @param {number} cost - The cost of the job per unit area.
     * @param {number} copies - The number of copies of the job.
     * @return {number} The subtotal of the job.
     */
    calculateSubTotal(width, height, measuring_unit, cost, copies) {
        let area = 0;

        if (measuring_unit === 'ft') {

            area = width * height;

        } else if (measuring_unit === 'inch') {

            area = ((width * height) / 144);

        }

        return area * cost * copies;
    }
}
