@include('layout.partials.header')

<body class="pace-done">
    <div class="app" id="app">
        @include('layout.topnav')
        @include('layout.sidebar')

        <div class="app-content" id="content">
            <div class="container-fluid">

                @yield('content')

            </div>
        </div>

    </div>
</body>

@include('layout.partials.footer')

@yield('js')
