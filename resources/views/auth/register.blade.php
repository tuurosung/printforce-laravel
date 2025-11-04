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
    max-width: 26rem;;
}

</style>

<body class="bg-white">

    <div id="app" class="app app-full-height app-without-header">


        <div class="login inner-container">

            <div class="card shadow-lg border-0 w-100 h-50">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="rounded-2"
                                style="background-image: url('{{ asset('images/paintbackground.jpg') }}'); background-size: cover; background-position: center; height: 100%;">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="app-full-height">
                                <div class="login-content">
                                    @include('layout.errors')

                                    <div class="py-5">
                                        <form action="{{ route('register-subscriber')  }}" method="POST" name="login_form">
                                            @csrf
                                            <h1 class="text-center cal-sans fw-400">Signup to PrintForce</h1>
                                            <div class="text-muted text-center mb-5">
                                                For your protection, please verify your identity.
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">First Name</label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            name="firstname"
                                                            id="firstname"
                                                            placeholder="your first name"
                                                            required
                                                        />
                                                    </div>

                                                </div>
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Last Name</label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            name="lastname"
                                                            id="lastname"
                                                            placeholder="your last name"
                                                            required
                                                        />
                                                    </div>

                                                </div>
                                            </div>




                                            <div class="mb-3">
                                                <label for="" class="form-label">Company Name</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    name="company_name"
                                                    id="company_name"
                                                    placeholder="company name"
                                                />
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Address</label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            name="address"
                                                            id="address"
                                                            placeholder="company address"
                                                            required
                                                        />
                                                    </div>

                                                </div>
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Phone Number</label>
                                                        <input
                                                            type="text"
                                                            class="form-control"
                                                            name="phone_number"
                                                            id="phone_number"
                                                            aria-describedby="helpId"
                                                            placeholder="phone number"
                                                            required
                                                        />
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Your Email Address</label>
                                                <input
                                                    type="email"
                                                    name="email"
                                                    class="form-control form-control-sm"
                                                    placeholder="username@address.com"
                                                    required
                                                />
                                            </div>


                                            <div class="mb-3">
                                                <div class="d-flex">
                                                    <label class="form-label">Password</label>

                                                </div>

                                                <input type="password" name="password"
                                                    class="form-control form-control-sm"
                                                    placeholder="Enter your password" required>
                                            </div>
                                            <button type="submit"
                                                class="btn btn-theme btn-lg d-block w-100 fw-500 mb-3 mt-4">Create Account</button>
                                            <div class="text-center text-muted">
                                                Already have an account? <a href="{{ route('login') }}">Sign In</a>.
                                            </div>
                                        </form>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>

                </div>
            </div>






        </div>

    </div>

    @include('layout.partials.footer')
