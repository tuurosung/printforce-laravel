<div class="d-flex justify-content-between my-5">
    <div>
        <p class="mb-0">Supplier Name</p>
        <h1 class="h1 mb-3">{{ $supplier->supplier_name }}</h1>

        <div class="d-flex gap-3">
            <span class="border-end pe-3 fs-12px">
                Phone Number
                <p class="fs-12px text-capitalize mb-0">{{ $supplier->supplier_phone }}</p>
            </span>
            <span class="border-end pe-3 fs-12px">
                Date Registered
                <p class="fs-12px text-capitalize mb-0">{{ $supplier->created_at }}</p>
            </span>
            <span>
                Address
                <p class="fs-12px text-capitalize mb-0">{{ $supplier->supplier_address }}</p>
            </span>
        </div>

    </div>
    <div></div>
</div>
