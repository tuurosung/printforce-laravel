    <div id="new_account_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-side modal-top-right">
            <div class="modal-content">
                <form id="new_account_frm" autocomplete="off">
                    <div class="modal-body">
                        <h6>New Account</h6>
                        <hr class="hr">


                        <div class="form-group">
                            <label for="">Account Type</label>
                            <select class="custom-select browser-default" name="account_header" required>
                                @foreach ($account_headers as $header)
                                    <option value="{{ $header->sn }}">{{ $header->description }}</option>
                                @endforeach


                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Account Name</label>
                            <input type="text" class="form-control" name="account_name" value="" required>
                        </div>

                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea class="form-control" name="description" rows="2" cols="80"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
