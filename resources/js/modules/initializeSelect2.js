export const InitializeSelect2 = {

    elements: {},

    init: function () {
        this.cacheElements();
        this.initializeSelect2Inputs();
    },

    cacheElements: function () {
        this.elements = {
            $select2Inputs: $('.select2-input'),
        }
    },

    initializeSelect2Inputs: function () {
        this.elements.$select2Inputs.each(function () {
            if (!$(this).data('select2')) {
                $(this).select2({
                    // placeholder: 'Select an option',
                    dropdownParent: $(this).parent(),
                });
            }
        })
    }

}

$(document).ready(() => {
    InitializeSelect2.init();
});
