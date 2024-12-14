<form class="mb-5" id="filterExpenditureFrm">

    <div class="d-flex">

        <div class="mb-3 w-200px me-3">
            <label for="" class="form-label">Start Date</label>
            <input type="text" class="form-control form-control-sm" name="start_date" id="start_date" value="{{ now()->format('Y-m-d') }}">
        </div>

        <div class="mb-3 w-200px me-3">
            <label for="" class="form-label">End Date</label>
            <input type="text" class="form-control form-control-sm" name="end_date" id="end_date" value="{{ now()->format('Y-m-d') }}">
        </div>

        <div class="mb-3 w-200px me-3">
            <label for="" class="form-label">Header</label>
            <select class="form-select form-select-sm" name="" id="filterHeader">

                <option value="">-- Select Header --</option>

                @foreach ($all_accounts as $account)
                <option value="{{ $account->account_number }}">{{ $account->account_name }}</option>
                @endforeach

            </select>
        </div>

        <div class="" style="padding-top:27px">
            <button type="submit" class="btn btn-primary"><i class="fa fa-search me-3" aria-hidden="true"></i> Filter Expenses</button>
        </div>

    </div>

</form>
