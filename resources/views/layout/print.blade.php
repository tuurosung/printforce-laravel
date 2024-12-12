@include('layout.partials.print-header')

<body class="">
    <div class="app app-content-full-height" style="padding-top: 0px !important;">


        <div class="app-content">
            @include('layout.partials.print-letterhead')
            @yield('content')
        </div>

    </div>
</body>

@include('layout.partials.footer')

@yield('js')
