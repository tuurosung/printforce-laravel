<form class="mb-5" id="filterExpenditureFrm">

    <div class="d-flex gap-3">

        <x-printforce.inputs.date-input name="start_date" id="start_date" label="Start Date" value="" />

        <x-printforce.inputs.date-input name="end_date" id="end_date" label="End Date" value="{{ now()->format('Y-m-d') }}" />

        <div class="mb-3 w-200px me-3">
            <x-printforce.inputs.select-input name="account_number" id="filterAccountNumber" label="Account" :options="$all_accounts" />

        </div>

        <div class="" style="padding-top:27px">
            <button type="submit" class="btn btn-primary"><i class="fa fa-search me-3" aria-hidden="true"></i> Filter Expenses</button>
        </div>

    </div>

</form>
