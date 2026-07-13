<!-- Welcome line -->
<div class="lg:col-span-8 md:col-span-12 sm:col-span-12 col-span-12">
    <div class="card bg-white dark:bg-darkprimary mb-0 overflow-hidden">
        <div class="card-body pb-8 pt-8 h-full">
            <div class="grid grid-cols-12">
                <div class="lg:col-span-7 md:col-span-7 sm:col-span-12 col-span-12">
                    <div class="flex gap-3 items-center mb-7">
                        <div class="rounded-full overflow-hidden">
                            <img src="{{ asset('images/user-1.jpg') }}" class="h-10 w-10" alt="">
                        </div>
                        <h5 class="text-lg">
                            Welcome back, {{ auth()->user()->name }}!</h5>
                    </div>
                    <div class="flex gap-6 items-center">
                        <div
                            class="pe-6 rtl:pe-auto rtl:ps-6  border-e border-[#adb0bb] border-opacity-20  dark:border-darkborder">
                            <h3 class="flex items-start mb-0 text-3xl font-cal-sans-regular font-normal">
                                GHS {{ number_format($payment_statistics->todaysTotalPayment, 2) }}
                                <i class="ti ti-arrow-up-right text-base  text-success "></i>
                            </h3>
                            <p class="text-sm mt-1">
                                Today’s Sales
                            </p>
                        </div>
                        <div class="">
                            <h3 class="flex items-start mb-0 text-3xl">
                                0
                                <i class="ti ti-arrow-up-right text-base  text-success "></i>
                            </h3>
                            <p class="text-sm mt-1">
                                Registered Jobs
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
