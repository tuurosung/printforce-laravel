<form class="mb-5" id="filterExpenditureFrm">

    <div class="grid grid-cols-12 gap-6 mb-6">

        <div class="col-span-2">
            <x-printforce.inputs.date-input name="start_date" id="start_date" label="Start Date" value="" />
        </div>

        <div class="col-span-2">
            <x-printforce.inputs.date-input name="end_date" id="end_date" label="End Date" value="{{ now()->format('Y-m-d') }}" />
        </div>

        <div class="col-span-3 w-200px me-3">
            @php
                $expenditureAccounts = \App\Enums\Accounts\AccountTypeEnum::Expenditure->accountsArray();
            @endphp
            <x-printforce.inputs.select-input name="account_number" id="filterAccountNumber" label="Account" :options="$expenditureAccounts" />

        </div>

        <div class="col-span-3 grid content-end mb-3">
            <button type="submit" class="btn btn-primary py-3">
                <i class="fi fi-rr-search me-3"></i>
                Filter Expenses
            </button>
        </div>

    </div>

</form>
