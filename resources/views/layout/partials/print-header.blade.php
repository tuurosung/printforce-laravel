<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PrintForce - Workflow Manager For Print Businesses </title>

    <!-- set favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">


    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">


    <link href="{{ asset('assets/fontawesome/css/all.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/datatables/datatables.css') }}" rel="stylesheet" media="all">

    <link href="{{ asset('assets/css/ui.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/css/uix.css') }}" rel="stylesheet" media="all">

    <link href="{{ asset('assets/css/datepicker.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/css/toastify.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lity.min.css') }}" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])


    <style media="all">
        /* Load Google Fonts Locally */


        @font-face {
            font-family: 'Avante';
            font-weight: 700;
            src: url('{{ asset("assets/font/Avante/ITCAvantGardePro-Bold.otf") }}');
        }

        @font-face {
            font-family: 'Avante';
            font-weight: 600;
            src: url('{{ asset("assets/font/Avante/ITCAvantGardePro-Demi.otf") }}');
        }

        @font-face {
            font-family: 'Avante';
            font-weight: 500;
            src: url('{{ asset("assets/font/Avante/ITCAvantGardePro-Md.otf") }}');
        }

        @font-face {
            font-family: 'Avante';
            font-weight: 400;
            src: url('{{ asset("assets/font/Avante/ITCAvantGardePro-Bk.otf") }}');
        }

        @font-face {
            font-family: 'Avante';
            font-weight: 300;
            src: url('{{ asset("assets/font/Avante/ITCAvantGardePro-XLt.otf") }}');
        }


        .urbanist {
            font-family: 'Urbanist', sans-serif;
        }

        .Avante {
            font-family: 'Avante' !important;
        }

        body {
            font-family: 'Poppins', sans-serif !important;
            font-size: 13px;
            font-weight: 400;
        }

        .btn {
            font-family: 'Poppins', sans-serif !important;
            /* font-size: 13px !important; */
            text-transform: capitalize !important;
        }


        div.dataTables_wrapper div.dataTables_length select {
            width: 100px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 38px;
            width: 100% !important;
            display: block !important;
        }

        .select2-container .select2-selection--single,
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 40px;
            font-size: 0.8rem;
        }

        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #aaa;
            border-radius: 4px;
        }

        .select2-container {
            display: block !important;
            width: 100% !important;
        }

        a {
            color: var(--bs-black);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .btn {
            padding: 0.6rem 2.14rem;
            font-size: 12px;
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.765625rem;
            border-radius: 3px;
        }

        .bootbox-body {
            font-size: 18px;
        }

        .bootbox .modal-header {
            display: none;
        }

        .form-select {
            padding: .575rem .75rem;
        }

        .dropdown-item {
            font-size: 12px;
            font-weight: 500;
        }

        body {
            font-family: 'Avante' !important;
            font-weight: 500;
            /* background-color: #fff; */
        }

        .profile .profile-header .profile-header-cover::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: none;
        }

        .table>thead>tr>th {
            font-weight: 500;
        }

        .table>tbody>tr>td {
            font-weight: 500;
        }

        .badge {
            display: inline-block;
            padding: .35em .65em;
            font-size: .75em;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
        }

        hr {
            opacity: 1 ;
        }

    </style>

</head>
