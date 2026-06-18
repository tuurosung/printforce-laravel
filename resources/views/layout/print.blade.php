@include('layout.partials.header')

<body class="">
    <div class="container p-[30px]" >


        <div class="">
            @include('layout.partials.print-letterhead')
            @yield('content')
        </div>

    </div>
</body>

@include('layout.partials.footer')

@yield('js')
