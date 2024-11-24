<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootbox.js') }}"></script>
<script src="{{ asset('assets/datatables/datatables.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>

<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-modal.js') }}"></script>
<script src="{{ asset('assets/js/modules/chart.js') }}"></script>
<script src="{{ asset('assets/js/toastify.min.js') }}"></script>
<script src="{{ asset('assets/js/lity.min.js') }}"></script>
<script src="{{ asset('assets/js/printThis.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js" type="text/javascript"></script>


<script type="text/javascript">

    $('a[data-toggle="pill"], a[data-toggle="tab"], a[data-bs-toggle="pill"], a[data-bs-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });

    var activeTab = localStorage.getItem('activeTab');

    if (activeTab) {
        $('.nav a[href="' + activeTab + '"]').tab('show');
    }


    $('.datatable').DataTable({
        'sorting': false,
        'paging': false,
        'searching': false,
        'stateSave': true,
        language: {
            search: ""
        },
        responsive: true,
        buttons: [{
                extend: 'print',
                className: 'btn btn-default'
            },
            {
                extend: 'csv',
                className: 'btn btn-default'
            }
        ]
    })

    $('.datatables').DataTable({
        'sorting': false,
        'paging': true,
        'stateSave': true,
        pageLength: 10,
        responsive: true,
        buttons: [{
                extend: 'print',
                className: 'btn btn-default'
            },
            {
                extend: 'csv',
                className: 'btn btn-default'
            }
        ],
        language: {
            search: '',
            searchPlaceholder: "Search..."
        },
    })

    $('#start_date,#end_date').datepicker()

    $('#start_date,#end_date').on('change', function(event) {
        event.preventDefault();
        $(this).datepicker('hide')
    });

    // ! function($) {
    //     $(document).on("click", "ul.nav li.parent > a > span.icon", function() {
    //         $(this).find('em:first').toggleClass("glyphicon-minus");
    //     });
    //     $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    // }(window.jQuery);

    $(function() {

        $('a[data-toggle="pill"]').on('shown.bs.tab', function(e) {
            localStorage.setItem('lastTab', $(this).attr('href'));
        });
        var lastTab = localStorage.getItem('lastTab');

        if (lastTab) {
            $('[href="' + lastTab + '"]').tab('show');
        }

    });

    $(window).on('resize', function() {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function() {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })


    // $('.datatables').DataTable({
    //     'paging': false,
    //     'sort': false
    // })
    $('#start_date,#end_date,.datepicker').datepicker()
    $('#start_date,#end_date,.datepicker').on('change', function(event) {
        event.preventDefault();
        $(this).datepicker('hide')
    });

    function popup(url) {
        window.open(url, 'popUpWindow', 'height=1900,width=800,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes')
    }
</script>

<script type="text/javascript">
    $.fn.modal.Constructor.prototype._enforceFocus = function() {};

    $(function() {

        $('a[data-toggle="pill"]').on('shown.bs.tab', function(e) {
            localStorage.setItem('lastTab', $(this).attr('href'));
        });
        var lastTab = localStorage.getItem('lastTab');

        if (lastTab) {
            $('[href="' + lastTab + '"]').tab('show');
        }

    });

    $(function() {

        $('a[data-toggle="tab"], a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
            localStorage.setItem('lastTab', $(this).attr('href'));
        });
        var lastTab = localStorage.getItem('lastTab');

        if (lastTab) {
            $('[href="' + lastTab + '"]').tab('show');
        }

    });

    $('#start_date,#end_date,.datepicker').datepicker()

    $('#start_date,#end_date,.datepicker').on('change', function(event) {
        event.preventDefault();
        $(this).datepicker('hide')
    });

    function print_popup(id) {
        window.open(id, "popupWindow", "width=620,height=600,scrollbars=yes");
    }

    $('#activity_type').on('change', function(event) {
        event.preventDefault();
        if ($(this).val() === 'break' || $(this).val() === 'leave') {
            $('#destination').prop('readonly', false)
        } else if ($(this).val() === 'attendance') {
            $('#destination').prop('readonly', true)
            $('#destination').val('N/A')
        }
    });

    $('#clock_in_frm').on('submit', function(event) {
        event.preventDefault();
        bootbox.confirm("Record Attendance?", function(r) {
            if (r === true) {

                $.ajax({
                    url: '../serverscripts/admin/Employees/clock_in_frm.php',
                    type: 'GET',
                    data: $('#clock_in_frm').serialize(),
                    success: function(msg) {
                        if (msg === 'save_successful') {
                            bootbox.alert("Attendance recorded successfully", function() {
                                window.location.reload()
                            })
                        } else {
                            bootbox.alert(msg)
                        }
                    }
                }) //end ajax

            }
        })
    }); //end submit


    $('#activity_log_frm').one('submit', function(event) {
        event.preventDefault()
        bootbox.confirm("Log this activity?", function(r) {
            if (r === true) {
                $.ajax({
                    url: '../serverscripts/admin/activity_log_frm.php',
                    type: 'GET',
                    data: $('#activity_log_frm').serialize(),
                    success: function(msg) {
                        if (msg === 'save_successful') {
                            bootbox.alert('Activity logged successfully', function() {
                                window.location.reload()
                            })
                        } else {
                            bootbox.alert(msg)
                        }
                    }
                })
            }
        })
    });
</script>

<!-- if session has message -->
@if (Session::has('success'))
<script type="text/javascript">
    Toastify({
        text: " {{ Session::get('success') }} ",
        duration: 3000,
        position: 'center',
        // className: "danger",
        style: {
            // background: "#e6180d",
        },
        offset: {
            x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
            y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
        },
    }).showToast();
</script>
@endif

@if (Session::has('error'))
<script type="text/javascript">
    Toastify({
        text: "{{ Session::get('error') }}",
        duration: 4000,
        position: 'center',
        // className: "danger",
        style: {
            background: "#e6180d",
        },
        offset: {
            x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
            y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
        },
    }).showToast();
</script>
@endif
