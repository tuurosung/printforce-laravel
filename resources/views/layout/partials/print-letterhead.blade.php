<div class="grid grid-cols-12">
    <!-- <div class="col-3"></div> -->
    <div class="lg:col-span-9 md:col-span-9 sm:col-span-12 col-span-12 flex flex-col gap-2">
        <h3 class="text-2xl font-cal-sans-regular font-normal!">{{ auth()->user()->company->company_name }}</h3>
        <h5 class=""><i class="fi fi-sr-map-marker me-1  "></i> {{ auth()->user()->company->company_address }}</h5>

        <d class="flex text-dark">
            <div class="basis-1/2">
                <p>Phone</p>
                <i class="fi fi-sr-phone-call me-2"></i>
                {{ auth()->user()->company->company_phone }}
            </div>
            <div>
                <p>Email</p>
                <i class="fi fi-rr-envelope me-2"></i>
                {{ auth()->user()->company->company_email }}
            </div>
        </d>
    </div>
</div>
<hr class="border-t border-black border my-3">
