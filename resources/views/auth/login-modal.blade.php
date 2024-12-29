<div
    class="modal fade"
    id="loginModal"
    tabindex="-1"

    role="dialog"
    aria-labelledby="modalTitleId"
    aria-hidden="true">
    <div
        class="modal-dialog modal-dialog-scrollable modal-dialog-centered"
        role="document">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Modal title
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div> -->
            <div class="modal-body p-5">

                <div class="d-flex justify-content-center mb-5">
                    <img
                        src="{{ asset('assets/img/favicon.png') }}"
                        alt="logo"
                        class="img-fluid w-100px" />
                </div>

                <div class="text-center">
                    <h4>Welcome Back</h4>
                    <p>Please enter your details to log in</p>
                </div>


                <div class="d-flex gap-2">
                    <a
                        href="#"
                        class="btn btn-outline-danger btn-lg"
                        role="button">
                        <i class="fa-brands fa-google me-2"></i>
                        Login with Google
                    </a>
                    <a
                        href="#"
                        class="btn btn-outline-black btn-lg"
                        role="button">
                        <i class="fa-brands fa-apple me-2"></i>
                        Login with Apple
                    </a>
                </div>

                <div class="d-flex align-items-center my-4">
                    <hr class="flex-grow-1">
                    <span class="mx-3">OR</span>
                    <hr class="flex-grow-1">
                </div>
                <form action="{{ route('user-login')  }}" method="POST" name="login_form">
                    @csrf

                    <div class="mb-3">
                        <label for="email_address" class="form-label">Email</label>
                        <input
                            type="email"
                            class="form-control border-r-0 py-3"
                            name="email"
                            id="email_address"
                            placeholder="Enter your email address"
                            required />
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input
                            type="password"
                            class="form-control py-3"
                            name="password"
                            id="password"
                            placeholder="" />
                    </div>

                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="form-check mb-4">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="remember"
                                    id="remember"
                                    value="1" />
                                <label class="form-check-label" for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <div>
                            <a href="#" class="">
                                Forgot Password?
                            </a>
                        </div>
                    </div>



                    <button
                        type="submit"
                        class="btn btn-dark w-100 py-3">
                        <i class="fas fa-lock-open me-3  "></i>
                        Login
                    </button>

                </form>

                <p class="mt-4 text-center">Don't have an account? <a href="#">Sign Up</a></p>

            </div>
        </div>
    </div>
</div>
