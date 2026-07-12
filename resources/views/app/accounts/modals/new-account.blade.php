    <div
        class="modal fade"
        id="new_account_modal"
        tabindex="-1"

        role="dialog"
        aria-labelledby="modalTitleId"
        aria-hidden="true">
        <div
            class="modal-dialog"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Create New Account
                    </h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('accounting.accounts.store') }}">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="" class="form-label">Account Type</label>
                            <select
                                class="form-control form-select-sm"
                                name="account_header"
                                required>

                                @foreach ($account_types as $type)
                                <optgroup label="{{ $type->description }}">

                                    @foreach ($type->headers as $header)
                                    <option value="{{ $header->sn }}">{{ $header->description }}</option>
                                    @endforeach

                                </optgroup>


                                @endforeach


                            </select>
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">Account Name</label>
                            <input
                                type="text"
                                class="form-control "
                                name="account_name"
                                value=""
                                required />
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">Description</label>
                            <textarea
                                class="form-control "
                                name="description"
                                rows="2"
                                cols="80" required></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-check me-3  "></i>
                            Create Account
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <div id="" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-side modal-top-right">
            <div class="modal-content">
                <form id="new_account_frm" autocomplete="off">
                    <div class="modal-body">
                        <h6>New Account</h6>
                        <hr class="hr">




                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
