@include('layout.partials.header')

<style rel="stylesheet">
    @media screen and (min-width: 1400px) {
        .inner-container {
            margin: 0 20rem;
        }
    }

    @media (max-width: 1400px) {

        .inner-container {
            margin: 0 1rem;
        }
    }
</style>

<body class="bg-white">

    <div id="app" class="app app-full-height app-without-header">


        <div class="login inner-container">

            <div class="d-none d-lg-block flex-1">
                <p class="lead fw-600 text-orange">Inpired By Design, Built To Last</p>
                <h1 class="display-3 fw-600 mb-5">Workflow Manager For <span class="text-primary">Digital Print </span> Houses</h1>


                <button
                    type="button"
                    class="btn btn-primary">
                    <i class="fas fa-user me-3  "></i> Create An Account
                </button>

                <button
                    type="button"
                    class="btn btn-warning text-white">
                    <i class="fas fa-envelope me-3  "></i> Contact Us
                </button>

            </div>

            <div class="app-full-height bg-primary">
                <div class="login-content">
                    @include('layout.errors')
                    <div class="card border-0">
                        <div class="card-body">
                            <form action="{{ route('user-login')  }}" method="POST" name="login_form">
                                @csrf
                                <h1 class="text-center">Sign In</h1>
                                <div class="text-muted text-center mb-4">
                                    For your protection, please verify your identity.
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Email Address</label>
                                    <input
                                        type="text"
                                        name="email"
                                        class="form-control form-control-sm"
                                        placeholder="username@address.com">
                                </div>

                                <div class="mb-3">
                                    <div class="d-flex">
                                        <label class="form-label">Password</label>
                                        <a
                                            href="#"
                                            class="ms-auto text-muted">
                                            Forgot password?
                                        </a>
                                    </div>

                                    <input
                                        type="password"
                                        name="password"
                                        class="form-control form-control-sm"
                                        placeholder="Enter your password">
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value id="customCheck1">
                                        <label class="form-check-label fw-500" for="customCheck1">Remember me</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-theme btn-lg d-block w-100 fw-500 mb-3">Sign In</button>
                                <div class="text-center text-muted">
                                    Don't have an account yet? <a href="page_register.html">Sign up</a>.
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </div>

    @include('layout.partials.footer')
