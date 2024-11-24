@include('layout.partials.header')

<body class="">
    <div class="app">
        @include('layout.topnav')
        @include('layout.sidebar')

        <div class="app-content">
            @yield('content')
        </div>

    </div>
</body>

@include('layout.partials.footer')

@yield('js')
