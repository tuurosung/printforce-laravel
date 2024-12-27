<!-- New Payment Modal -->
<div class="modal fade" id="new_payment_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="" autocomplete="off" action="{{ route('create.purchase.payment') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <input class="form-control d-none" type="text" name="supplier_id" value="{{ $supplier->supplier_id }}">

                    <div class="form-group d-none">
                        <label for="">Supplier ID</label>
                        <input type="text" class="form-control" name="supplier_id" id="supplier_id" value="{{ $supplier->supplier_id }}" readonly>
                    </div>

                    <div class="row">

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Amount Paid</label>
                                <input type="text" class="form-control" name="amount_paid" id="amount_paid" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Cheque # / Reference</label>
                                <input type="text" class="form-control" name="reference" id="reference">
                            </div>
                        </div>

                    </div>



                    <div class="row">

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Payment Date</label>
                                <input type="text" class="form-control" name="date" id="date" value="{{ $today }}" required>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Account Number</label>
                                <select class="browser-default custom-select" name="account_number" id="account_number" required>
                                    <option value="">--- Select Account ---</option>

                                    @foreach ($operating_accounts as $account)
                                    <option value="{{ $account->account_number }}">{{ $account->account_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="">Notes</label>
                        <textarea rows="" cols="2" class="form-control" name="notes"></textarea>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-check me-3  "></i> Record Payment</button>
                </div>
            </form>
        </div>
    </div>
</div>
