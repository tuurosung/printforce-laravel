@include('layout.partials.header')

<body class="DEFAULT_THEME bg-white dark:bg-dark">

    <div class="container flex min-h-screen items-center justify-center">


        <div class="card shadow-lg border-0 rounded-2 w-[80%]! mx-auto my-auto">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="rounded-2 d-flex align-items-center justify-content-center"
                            style="background-image: url('{{ asset('images/4418684d588ab71d36605d6dd9be6404.jpg') }}'); background-size: cover; background-position: center; height: 100%;">

                            <div class="p-5">
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="app-full-height">
                            <div class="login-content py-5 px-sm-5">
                                @include('layout.errors')
                                <form action="{{ route('user-login')  }}" method="POST" name="login_form" class="px-7">
                                    @csrf

                                    <img src="{{ asset('images/logo.png') }}"
                                        class="img img-fluid mb-8 w-50 mx-auto d-block" />

                                    <p class="lead fw-600 text-primary text-center d-none">Inpired By Design, Built For
                                        Work
                                    </p>

                                    <div class="spacer mb-10"></div>

                                    <h1 class="text-center text-3xl cal-sans fw-500 mb-1">Welcome Back</h1>
                                    <div class="text-muted text-center mb-8">
                                        For your protection, please verify your identity.
                                    </div>

                                    <div class="mb-8">
                                        <label class="form-label">Email Address</label>
                                        <input type="text" name="email" class="form-control"
                                            placeholder="" required>
                                    </div>

                                    <div class="mb-3">
                                        <div class="flex">
                                            <label class="form-label">Password</label>
                                            <a href="#" class="ms-auto text-muted">
                                                Forgot password?
                                            </a>
                                        </div>

                                        <input type="password" name="password" class="form-control"
                                            placeholder="" required>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox"
                                                class="shrink-0 mt-0.5 h-5 w-5 border-bordergray bg-transparent dark:border-darkborder rounded text-warning focus:ring-warning disabled:opacity-50 disabled:pointer-events-none  dark:checked:bg-warning dark:checked:border-warning checked:bg-warning checked:border-warning dark:focus:ring-offset-gray-800"
                                                id="hs-checked-checkbox3" checked="">
                                            <label class="form-check-label border-warning fw-500" for="customCheck1">Remember
                                                me</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary  d-block w-full fw-500 mb-3">Sign
                                        In</button>
                                    <div class="text-center text-muted">
                                        Don't have an account yet? <a href="{{ route('register') }}">Sign
                                            up</a>.
                                    </div>

                                    <p class="text-center text-xs mt-5">
                                        Our friendly support team is just a click away, ready to
                                        lend a hand with any questions or issues.
                                    </p>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('layout.partials.footer')
