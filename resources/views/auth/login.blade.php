@include('layout.partials.header')

<style rel="stylesheet">
@media screen and (min-width: 1400px) {
    .inner-container {
        margin: 0 25%;
    }
}

@media (max-width: 1400px) {

    .inner-container {
        margin: 0 1rem;
    }
}

.login .login-content {
    max-width: 26rem;
    ;
}
</style>

<body class="bg-white">

    <div id="app" class="app app-full-height app-without-header">


        <div class="login inner-container">

            <div class="card shadow-lg border-0 w-100 rounded-2">
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
                                    <form action="{{ route('user-login')  }}" method="POST" name="login_form">
                                        @csrf

                                        <img src="{{ asset('images/logo.png') }}" class="img img-fluid mb-5 w-75 mx-auto d-block" />

                                        <p class="lead fw-600 text-primary text-center d-none">Inpired By Design, Built For Work
                                        </p>


                                        <h1 class="text-center cal-sans fw-500 mb-1">Welcome Back</h1>
                                        <div class="text-muted text-center mb-5">
                                            For your protection, please verify your identity.
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Email Address</label>
                                            <input type="text" name="email" class="form-control form-control-sm"
                                                placeholder="username@address.com">
                                        </div>

                                        <div class="mb-3">
                                            <div class="d-flex">
                                                <label class="form-label">Password</label>
                                                <a href="#" class="ms-auto text-muted">
                                                    Forgot password?
                                                </a>
                                            </div>

                                            <input type="password" name="password" class="form-control form-control-sm"
                                                placeholder="Enter your password">
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value id="customCheck1">
                                                <label class="form-check-label fw-500" for="customCheck1">Remember
                                                    me</label>
                                            </div>
                                        </div>
                                        <button type="submit"
                                            class="btn btn-theme btn-lg d-block w-100 fw-500 mb-3">Sign
                                            In</button>
                                        <div class="text-center text-muted">
                                            Don't have an account yet? <a href="{{ route('register') }}">Sign
                                                up</a>.
                                        </div>

                                        <p class="text-center mt-5">
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

    </div>

    @include('layout.partials.footer')
