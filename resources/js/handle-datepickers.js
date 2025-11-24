document.addEventListener('DOMContentLoaded', function () {

  

    $('#start_date,#end_date,.datepicker').datepicker()
    $('#start_date,#end_date,.datepicker').on('change', function (event) {
        event.preventDefault();
        $(this).datepicker('hide')
    });

    $('#start_date,#end_date').datepicker()

    $('#start_date,#end_date').on('change', function (event) {
        event.preventDefault();
        $(this).datepicker('hide')
    });


    initializeDatepickers();

    /**
     * Initialize datepickers for elements with the class 'datepicker
     *
     * @return void
     */
    function initializeDatepickers() {
        $('.datepicker-input').each(function () {
            if (!$(this).data('datepicker')) {
                $(this).datepicker({
                    format: 'yyyy-mm-dd',
                    autoclose: true,
                    todayHighlight: true
                });
            }
        })
    }

});
