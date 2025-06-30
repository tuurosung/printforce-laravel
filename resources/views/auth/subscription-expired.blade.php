@include('layout.partials.header')
@include('layout.topnav')

<div class="app-content-full-height bg-white" style="padding-top: 90px !important;">
    <div class="container d-flex justify-content-center align-items-center" style="height: 90vh;">


        <div class="container">

            <h1 class="cal-sans fw-500 fs-56px text-center mb-5">We've Got A Plan For You <br />Choose From Our Flexible
                Plans </h1>

            <div class="mx-auto d-flex justify-content-center mb-5">
                <div class="bg-primary rounded-5 me-2" style="height:6px; width:20%"></div>
                <div class="bg-dark rounded-5" style="height:6px; width:5%"></div>
            </div>


            <div class="row justify-content-center gap-4 mb-5">
                <div class="col-md-3">
                    <div class="card bg-light border-0 h-100 rounded-5" style="height:390px">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">

                            <button class="btn btn-outline-dark btn-sm rounded-5 px-3">Basic</button>

                            <h1 class="Urbanist fw-600 fs-72px" style="margin-top:50px; margin-bottom:50px">
                                <sup>&cent;</sup>99
                            </h1>

                            <p class="text-center">
                                Designed for individuals and small teams, this plan offers essential features to
                                get you started.
                            </p>

                            <button class="btn btn-dark"><i class="fas fa-check me-3  "></i> Renew</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card border-0 rounded-5" style="background-color: #ffdb00; height: 390px;">
                        <div class="card-body  d-flex flex-column justify-content-center align-items-center">

                            <button class="btn btn-outline-dark btn-sm rounded-5 px-3">Premium</button>

                            <h1 class="Urbanist fw-600 mb-6  fs-72px" style="margin-top:50px; margin-bottom:50px">
                                <sup>&cent;</sup>149
                            </h1>

                            <p class="text-center">
                                Crafted for growing teams, this plan includes advanced features and priority
                                support.
                            </p>

                            <button class="btn btn-dark"><i class="fas fa-check me-3  "></i> Renew</button>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-dark border-0  rounded-5" style="height:390px">
                        <div class="card-body  d-flex flex-column justify-content-center align-items-center pb-0">

                            <button class="btn btn-outline-white btn-sm rounded-5 px-3">Business</button>

                            <h1 class="Urbanist text-white fw-600 mb-6  fs-72px"
                                style="margin-top:50px; margin-bottom:50px"><sup>&cent;</sup>199</h1>

                            <p class="text-white text-center fs-12px">
                                Designed for businesses, this plan offers advanced features and enterprise-grade
                                security.
                            </p>

                            <button class="btn btn-white"><i class="fas fa-check me-3  "></i> Renew</button>
                        </div>
                    </div>
                </div>
            </div>

            <p class="text-center w-50 mx-auto">We're committed to making your subscription experience seamless. While we work on integrating
                secure online payment options, please make your renewals directly to the account number below. Thank you for your
                patience and understanding.</p>
            <div class="text-center mb-3 d-flex justify-content-center align-items-center">
                <img src="{{ asset('images/momo-logo.webp') }}" alt="" class="w-70px me-3">
                <p class="m-0 fs-24px">Account#: <span class="fw-600">0246173282</span></p>
            </div>

        </div>


    </div>
</div>
