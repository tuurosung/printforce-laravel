<!DOCTYPE html>
<html lang="en" dir="ltr" data-color-theme="Blue_Theme" class="light selected" data-layout="vertical"
    data-boxed-layout="boxed" data-card="shadow">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://cdn.datatables.net/v/dt/dt-3.0.1/datatables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/3.0.1/css/dataTables.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/4.0.1/css/buttons.dataTables.min.css" rel="stylesheet">

    <script src="https://cdn.datatables.net/v/dt/dt-3.0.1/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/4.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/4.0.1/js/buttons.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

    <title>PrintForce - Workflow Manager For Print Businesses</title>

    <style type="text/css">
        @font-face {
            font-family: 'Avante-Md';
            src: url("{{ asset('font/avante/avante-md.otf') }}") format('opentype');
            font-weight: 600;
            font-style: normal;
            font-display: swap;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
