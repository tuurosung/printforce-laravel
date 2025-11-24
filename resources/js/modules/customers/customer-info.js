import { InitializeDatepickers } from "../initializeDatepickers";
import { InitializeSelect2 } from "../initializeSelect2";
import { InitializeDataTables } from "../initializeDataTables";


import { GetServiceCost } from "../print-services/GetServiceCost.js";
import { CalculateLargeFormatJobTotal } from "../jobs/largeformat/CalculateLargeFormatTotal.js";
import { CalculateEmbroideryJobTotal } from "../jobs/embroidery/CalculateEmroideryJobTotal.js";
import { CalculateDesignJobTotal } from "../jobs/design/CalculateDesignJobTotal.js";
import { CalculatePressJob } from "../jobs/press/CalculatePressJob.js";


const HandleCustomerInfo = {

    config: {},

    elements: {},

    init: function() {
        this.cacheElements();
        this.bindEvents();
    },


    cacheElements: function() {
        this.elements = {
            $document: $(document),
            $customerInfoSection: $('#customer-info-section'),
            $largeFormatModal: $('#new_largeformat_modal'),
            $embroideryModal: $('#new_embroidery_modal'),
            $designModal: $('#new_design_modal'),

            $largeFormatServiceSelect: $('#largeformat_service_id'),
            $embroideryServiceSelect: $('#embroidery_service_id'),
            $designServiceSelect: $('#design_service_id'),
        }
    },

    bindEvents: function () {
        this.elements.$largeFormatServiceSelect.on('change', this.handleLargeFormatServiceChange.bind(this));
        this.elements.$largeFormatModal.on('shown.bs.modal', this.resetLargeFormatFields.bind(this));

        this.elements.$embroideryServiceSelect.on('change', this.handleEmbroideryServiceChange.bind(this));
        this.elements.$designServiceSelect.on('change', this.handleDesignServiceChange.bind(this));
    },


    async handleLargeFormatServiceChange(event) {
        event.preventDefault();

        try {

            var service_cost = await GetServiceCost.getServiceCostWithCustomerId(
                $(event.currentTarget).data('fetch_url'),
                $(event.currentTarget).val(),
                $(event.currentTarget).data('customer_id')
            );

            $('#largeformat_cost').val(service_cost);
            const parent = this.elements.$largeFormatModal;
            CalculateLargeFormatJobTotal.handleDimensionalInputsOnChange(parent);

        } catch (error) {
            console.error('Error handling large format service change:', error);
        }
    },

    resetLargeFormatFields: function() {
        $('#width, #height, #largeformat_copies, #largeformat_total, #largeformat_premium, #largeformat_discount').val('');
        // $('#width').focus();
        $('#largeformat_service_id').focus();
    },


    async handleEmbroideryServiceChange(event) {
        try {

            var service_cost = await GetServiceCost.getServiceCostWithCustomerId(
                $(event.currentTarget).data('fetch_url'),
                $(event.currentTarget).val(),
                $(event.currentTarget).data('customer_id')
            );

            // update the service cost and total fields in the edit modal
            $('#embroidery_unit_cost').val(service_cost);

            const parent = this.elements.$embroideryModal;
            CalculateEmbroideryJobTotal.initForm(parent);

        } catch (error) {
            console.error('Error handling embroidery service change:', error);
        }
    },

    async handleDesignServiceChange(event) {

    }

}


$(document).ready(() => {
    HandleCustomerInfo.init();
});
