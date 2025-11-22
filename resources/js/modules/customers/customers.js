const HandleCustomers = {

    config: {
        filterCustomersUrl: window.routes.filterCustomers
    },

    elements: {},

    init: function ()  {
        this.cachedElements();
        this.bindEvents();
    },


    cachedElements: function () {
        this.elements = {
            $document: $(document),
            $searchCustomerInput: $('#searchCustomer'),
            $searchCustomerFrm: $('#searchCustomersFrm')
        }
    },

    bindEvents: function () {
        this.elements.$searchCustomerInput.on('input', this.HandleFilterCustomers.bind(this));
        this.elements.$document.on('click', '.table tbody .edit', this.HandleEditBtnClick.bind(this));
        this.elements.$document.on('click', '.table tbody .delete', this.HandleDeleteBtnClick.bind(this));
    },


    async HandleFilterCustomers(event) {
        try {
            const response = await $.get(this.config.filterCustomersUrl, this.elements.$searchCustomerFrm.serialize());
            $('#data_holder').html(response);
        } catch (error) {
            console.error('Error filtering customers:', error);
        }
    },


    async HandleEditBtnClick(event) {
        try {
            const editUrl = $(event.currentTarget).data('url');
            const response = await $.get(editUrl);
            $('#modal_holder').html(response);
            $('#editCustomerModal').modal('show');
        } catch (error) {
            console.error('Error fetching edit customer modal:', error);
            bootbox.alert('Failed to load the edit customer form. Please try again.');
        }
    },

    HandleDeleteBtnClick(event) {
        event.preventDefault();

        const $form = $(event.currentTarget).closest('form');

        bootbox.confirm("Are you sure you want to delete this customer?", function (answer) {
            if (answer) {
                $form.submit();
            }
        });
    }

}


$(document).ready(() => { HandleCustomers.init(); });
