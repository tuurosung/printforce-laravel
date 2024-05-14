<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PrintForce - Workflow Manager For Print Businesses </title>

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/DataTables/datatables.min.css') }}" rel="stylesheet">


    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/xmedici.css') }}" rel="stylesheet">
    <!-- <link href="../mdb/css/dropzone.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="" href="{{ asset('assets/fontawesome/css/all.css') }}">
    <!-- <link rel="stylesheet" type="" href="../fontawesome/css/regular.css"> -->
    <!-- <link rel="stylesheet" type="" href="../fontawesome/css/solid.css"> -->
    <link href="{{ asset('assets/css/mdb.min.css') }}" rel="stylesheet">





    <link href="{{ asset('assets/css/datepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/ui.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/uix.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/toastify.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/select2.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/printforce.css') }}" rel="stylesheet">




    <style media="screen">
        /* Load Google Fonts Locally */


        @font-face {
            font-family: 'Montserrat';
            font-weight: 600;
            src: url("{{ asset('assets/font/googlefonts/Montserrat/static/Montserrat-SemiBold.ttf') }}");
        }

        @font-face {
            font-family: 'Montserrat';
            font-weight: 700;
            src: url("{{ asset('assets/font/googlefonts/Montserrat/static/Montserrat-Bold.ttf') }}");
        }

        @font-face {
            font-family: 'Montserrat';
            font-weight: 800;
            src: url(" {{ asset('assets/font/googlefonts/Montserrat/static/Montserrat-ExtraBold.ttf') }} ");
        }

        @font-face {
            font-family: 'Poppins';
            font-weight: 400;
            src: url(" {{ asset('assets/font/googlefonts/Poppins/Poppins-Regular.ttf') }}");
        }

        @font-face {
            font-family: 'Poppins';
            font-weight: 500;
            src: url(" {{ asset('assets/font/googlefonts/Poppins/Poppins-Medium.ttf') }} ");
        }



        @font-face {
            font-family: 'Axiforma';
            font-weight: 300;
            src: url(" {{ asset('assets/font/Axiforma/Axiforma-Light.otf') }} ");
        }

        @font-face {
            font-family: 'Axiforma';
            font-weight: 400;
            src: url(" {{ asset('assets/font/Axiforma/Axiforma-Regular.otf') }}");
        }

        @font-face {
            font-family: 'Axiforma';
            font-weight: 500;
            src: url(" {{ asset('assets/font/Axiforma/Axiforma-SemiBold.otf') }} ");
        }

        @font-face {
            font-family: 'Axiforma';
            font-weight: 600;
            src: url(" {{ asset('assets/font/Axiforma/Axiforma-Bold.otf') }} ");
        }

        @font-face {
            font-family: 'Hurme';
            font-weight: 600;
            src: url(" asset('assets/font/Hurme/Hurme-Bold.otf') }} ");
        }

        @font-face {
            font-family: 'Hurme';
            font-weight: 500;
            src: url(" {{ asset('assets/font/Hurme/Hurme-SemiBold.otf') }} ");
        }

        @font-face {
            font-family: 'Hurme';
            font-weight: 400;
            src: url(" {{ asset('assets/font/Hurme/Hurme-Regular.otf') }}");
        }

        @font-face {
            font-family: 'Hurme';
            font-weight: 300;
            src: url("{{ asset('assets/font/Hurme/Hurme-Light.otf') }}");
        }

        .montserrat {
            font-family: 'Montserrat';
        }

        .poppins {
            font-family: 'Poppins';
        }

        .OpenSans {
            font-family: 'Open Sans', sans-serif;
        }

        .Axiforma {
            font-family: 'Axiforma';
        }

        .Hurme {
            font-family: 'Hurme';
        }

        body {
            font-family: 'Poppins';
        }

        @media (min-width: 1200px) {
            .collapse.dont-collapse-sm {
                display: block;
                height: auto !important;
                visibility: visible;
                height: 100vh !important;
            }

            #topnav {
                visibility: hidden;
            }
        }

        @media (min-width: 1200px) {
            .navbar-toggler {
                visibility: hidden;
            }

        }

        @media (max-width:1200px) {
            .mobileadjust {
                margin-bottom: 30px !important;
            }

            .main {
                padding-top: 90px !important;
            }

            .titles {
                font-size: 20px;
            }
        }

        label {
            font-family: 'Poppins', sans-serif !important;
            font-weight: 400;
        }


        #sidebar .list-group-item.active {
            font-weight: bold;
            color: #fff;
            background-color: #0d47a1;
            border: none;
            border-left: none;
            border-right: none;
        }
    </style>

</head>

<body class="">
    <div class="app">
        @include('layout.topnav')
        @include('layout.sidebar')

        <div class="app-content">
            @yield('content')
        </div>

    </div>
</body>


<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/mdb.min.js') }}"></script>
<script src="{{ asset('assets/js/printThis.js') }}"></script>
<script src="{{ asset('assets/js/toastify.min.js') }}"></script>
<script src="{{ asset('assets/js/modules/chart.js') }}"></script>
<script src="{{ asset('assets/js/select2.js') }}"></script>
<script src="{{ asset('assets/js/bootbox.all.min.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>

<script src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('assets/DataTables/datatables.min.js') }}"></script>

<script>
    ! function($) {
        $(document).on("click", "ul.nav li.parent > a > span.icon", function() {
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

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


    $('.datatables').DataTable({
        'paging': false,
        'sort': false
    })
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

session()->forget('hasMsg');
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

session()->forget('hasErr')
@endif


@yield('js')
