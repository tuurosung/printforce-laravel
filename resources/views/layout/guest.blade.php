@include('layout.partials.header')

<body class="DEFAULT_THEME bg-white dark:bg-dark">

    <div class="container flex min-h-screen items-center justify-center">
        @yield('content')
    </div>
</body>
@include('layout.partials.footer')
