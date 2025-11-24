export const InitializeDatepickers = {

    elements: {},

    init: function () {
        this.cachedElements();
        this.initializeDateInputs();
    },


    cachedElements: function () {
        this.elements = {
            $datepickers: $('.datepicker-input'),
        }
    },


    initializeDateInputs: function () {
        this.elements.$datepickers.each(function () {

            if (!$(this).data('datepicker')) {
                $(this).datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    todayHighlight: true
                });
            }

            $(this).datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true
            });

        })
    }
}

$(document).ready(() => {
    InitializeDatepickers.init();
});
