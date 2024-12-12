<div class="row">
    <!-- <div class="col-3"></div> -->
    <div class="col-9">
        <h3 class="h3 mb-2">{{ Auth::user()->company->company_name }}</h3>
        <h5 class="mb-2"><i class="fas fa-location-dot me-1  "></i> {{ Auth::user()->company->company_address }}</h5>

        <d class="d-flex">
            <div class="me-3"><i class="fas fa-phone me-2"></i> {{ Auth::user()->company->company_phone }}</div>
            <div><i class="fas fa-envelope me-2"></i> {{ Auth::user()->company->company_email }}</div>
            <div></div>
        </d>
    </div>
</div>
<hr class="border-top border-black border-2 mb-5">
