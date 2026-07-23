@extends('layout.guest')

@section('content')

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

                        <form action="{{ route('password.update')  }}" method="POST" name="" class="px-7">
                            @csrf
                            <!-- Hidden Token & Email -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <img src="{{ asset('images/logo.png') }}"
                                class="img img-fluid mb-8 w-50 mx-auto d-block" />

                            <p class="lead fw-600 text-primary text-center d-none">Inpired By Design, Built For
                                Work
                            </p>

                            <div class="spacer mb-10"></div>

                            <h1 class="text-center text-3xl cal-sans fw-500 mb-1">Set New Password</h1>
                            <div class="text-muted text-center mb-8">
                                Password recovery has never been this easy
                            </div>

                            @include('layout.errors')

                            <div class="mb-8">
                                <label class="form-label">Email Address</label>
                                <input type="text" name="email" class="form-control"
                                    value="{{ $request->email }}" readonly>
                            </div>

                            <div class="mb-8">
                                <label for="">New Password</label>
                                <input type="password" name="password" class="form-control" required />
                            </div>

                            <div class="mb-8">
                                <label for="">Re-type Password</label>
                                <input type="password" name="password_confirmation" class="form-control" required />
                            </div>

                            <button type="submit" class="btn btn-primary py-3  d-block w-full fw-500 mb-3">
                                Update Password
                            </button>
                            <div class="text-center text-muted">
                                Don't have an account yet? <a href="{{ route('register') }}">Sign
                                    up</a>.
                            </div>

                            <!-- <p class="text-center text-xs mt-5">
                                Our friendly support team is just a click away, ready to
                                lend a hand with any questions or issues.
                            </p> -->
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection
