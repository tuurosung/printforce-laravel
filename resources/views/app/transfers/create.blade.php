@extends('layout.app')


@section('content')
<div class="d-flex justify-content-center">

    <div class="col-4">

        <h4 class="montserrat fw-600 fs-30px mb-4">New Transfer</h4>

        @include('layout.errors')

        <form id="" autocomplete="off" method="POST" action="{{ route('create.transfer') }}">

            @csrf

            <div class="card mb-3">
                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6 mb-4 mb-md-0">
                            <div class="form-group">
                                <label for="">Amount</label>
                                <input type="number" step="any" min="1" class="form-control" name="amount" id="amount" value="" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4 mb-md-0">
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="text" class="form-control" name="date" id="date" value="{{ date('Y-m-d') }}" required>
                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-md-6 mb-4 mb-md-0">
                            <div class="form-group">
                                <label for="">Transfer From</label>
                                <select class="browser-default custom-select" name="source" id="transfer_from">

                                    @foreach ($all_accounts as $account)

                                    <option value="{{ $account->account_number }}">
                                        {{ $account->account_name }}
                                    </option>

                                    @endforeach


                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4 mb-md-0">
                            <div class="form-group">
                                <label for="">Transfer To</label>
                                <select class="browser-default custom-select" name="destination" id="transfer_to">

                                    @foreach ($all_accounts as $account)

                                    <option value="{{ $account->account_number }}">
                                        {{ $account->account_name }}
                                    </option>

                                    @endforeach

                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="">Narration</label>
                        <input type="text" class="form-control" name="notes" id="notes" value="" required>
                    </div>

                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('all.transfers') }}" type="button" class="btn btn-outline-danger">
                    <i class="fas fa-long-arrow-alt-left mr-3  "></i> Close</a>

                <button type="submit" class="btn btn-primary mr-0"> <i class="fas fa-check mr-3  "></i> Move Funds</button>
            </div>

        </form>


    </div>

</div>
@endsection

@section('js')
<script type="text/javascript">
    $('#date').datepicker();

    setTimeout(function() {
        $('#amount').focus();
    }, 300)

    $('#transfer_from, #transfer_to').select2();
</script>
@endsection
