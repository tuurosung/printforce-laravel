const PrintServiceCalculator = {

    config: {
        DIMENSIONAL_CATEGORY: '001'
    },

    'elements': {},

    init() {
        this.cachedElements();
        this.bindEvents();
    },

    cachedElements() {
        this.elements = {
            $serviceId: $('#serviceId'),
            $unitCost: $('#unitCost'),
            $serviceCategory: $('#serviceCategoryId'),
            $width: $('#width'),
            $height: $('#height'),
            $quantity: $('#quantity'),
            $subTotal: $('#subTotal'),
            $materialUnitCost: $('#materialUnitCost'),
            $materialTotalCost: $('#materialTotalCost'),
            $total: $('#total'),
        }
    },



    bindEvents() {
        this.elements.$serviceId.on('change', () => this.handleServiceChange());
        this.elements.$width.add(this.elements.$height).add(this.elements.$quantity).add(this.elements.$materialUnitCost)
            .on('input', () => this.calculateJobTotal());
    },

    async handleServiceChange() {
        const serviceId = this.elements.$serviceId.val();

        if (!serviceId) return;

        try {

            const response = await $.ajax({
                url: this.elements.$serviceId.data('fetch-url'),
                method: 'GET',
                data: { serviceId },
                dataType: 'json',
            });

            this.updateServiceDetails(response);

        } catch (error) {

            console.error('Error fetching service details:', error);
            this.showError('Failed to fetch service details.'); // Show an error message.

        }
    },

    updateServiceDetails(data) {

        this.elements.$unitCost.val(data.service_cost ?? '');
        this.elements.$serviceCategory.val(data.service_category ?? '');

        if (data.service_category === this.config.DIMENSIONAL_CATEGORY) {
            this.enableDimensionalInputs();
        } else {
            this.disableDimensionalInputs();
        }

        this.calculateJobTotal();
    },

    enableDimensionalInputs() {
        this.elements.$width.val('').prop('readonly', false);
        this.elements.$height.val('').prop('readonly', false);
        this.elements.$materialUnitCost.val(0).prop('readonly', true);
        this.elements.$width.focus();
    },

    disableDimensionalInputs() {
        this.elements.$width.val(1).prop('readonly', true);
        this.elements.$height.val(1).prop('readonly', true);
        this.elements.$materialUnitCost.val(0).prop('readonly', false);
    },

    calculateJobTotal() {

        const unitCost = this.parseFloat(this.elements.$unitCost.val());
        const width = this.parseFloat(this.elements.$width.val());
        const height = this.parseFloat(this.elements.$height.val());
        const quantity = this.parseFloat(this.elements.$quantity.val());
        const materialUnitCost = this.parseFloat(this.elements.$materialUnitCost.val());

        const subTotal = width * height * unitCost * quantity;
        this.elements.$subTotal.val(subTotal.toFixed(2));

        const materialTotalCost = materialUnitCost * quantity;
        this.elements.$materialTotalCost.val(materialTotalCost.toFixed(2));

        const total = subTotal + materialTotalCost;
        this.elements.$total.val(total.toFixed(2));
    },

    parseFloat(value) {
        const parsed = parseFloat(value);
        return isNaN(parsed) ? 0 : parsed;
    },

    showError(message) {
        bootstrap.show(message);
    }

};

$(document).ready(() => PrintServiceCalculator.init());
