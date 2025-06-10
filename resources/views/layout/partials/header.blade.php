<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PrintForce - Workflow Manager For Print Businesses </title>

    <!-- set favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <link href="{{ asset('assets/fontawesome/css/all.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/datatables/datatables.css') }}" rel="stylesheet" media="all">

    <link href="{{ asset('assets/css/ui.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('assets/css/uix.css') }}" rel="stylesheet" media="all">

    <link href="{{ asset('assets/css/datepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/toastify.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lity.min.css') }}" rel="stylesheet">

    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-chubby/css/uicons-regular-chubby.css'>

    <!-- Only load vite in local environment -->
    @if (app()->environment('local'))
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @endif



    <style media="screen">
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

    @font-face {
        font-family: 'CalSans';
        font-weight: 400;
        src: url('{{ asset("assets/font/CalSans/CalSans-Regular.ttf") }}') format('truetype');
    }


    .urbanist {
        font-family: 'Urbanist', sans-serif;
    }

    .Avante {
        font-family: 'Avante' !important;
    }

    .cal-sans {
        font-family: 'CalSans', sans-serif !important;
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

    .table>tbody>tr>td {
        padding-right: 20px;
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

    .glass {
        filter: blur(9px) !important;
    }

    .form-control-sm {
        padding: .6rem .5rem;
    }

    #sidebar .list-group-item.active {
        font-weight: bold;
        color: #fff;
        background-color: #0d47a1;
        border: none;
        border-left: none;
        border-right: none;
    }

    hr {
        opacity: 1 !important;
    }

    .nav-pills .nav-link {
        border-radius: 35px !important;
    }

    .form-control,
    .form-select,
    .select2-container .select2-selection--single {
        border: 1px solid #ececec;
        border-top-color: rgb(236, 236, 236);
        border-right-color: rgb(236, 236, 236);
        border-bottom-color: rgb(236, 236, 236);
        border-left-color: rgb(236, 236, 236);
        border-radius: 5px;
        height: 40px;
        /* box-shadow: none; */
        /* padding-left: 20px; */
        font-size: 14px;
        width: 100%;

        --bs-border-opacity: 1;
        border-color: rgba(var(--bs-gray-300-rgb), var(--bs-border-opacity)) !important;

        box-shadow: 0 .125rem .25rem rgba(var(--bs-black-rgb), .075) !important;
    }

    .form-control:focus {
        outline: none !important;
        border-color: var(--primary-color) !important;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1) !important;
    }


    .app-sidebar .menu .menu-item.active:not(.has-sub)>.menu-link {
        color: var(--bs-app-sidebar-menu-link-active-color);
        font-weight: var(--bs-app-sidebar-menu-link-active-font-weight);
    }
    </style>

</head>
