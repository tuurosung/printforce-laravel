@extends('layout.app')

@section('content')
<div class="d-flex justify-content-center mb-3">
    <div class="col-4">

        <h3 class="fw-700 fs-30px montserrat mb-4">Edit Supplier</h3>

        <form id="" method="POST" action="{{ route('update.supplier') }}" autocomplete="off">

            @csrf

            <input type="hidden" name="supplier_id" id="supplier_id" value="{{ $supplier->supplier_id }}">
            <div class="card mb-3">
                <div class="card-body">

                    <div class="form-group">
                        <label for="">Company Name</label>
                        <input type="text" class="form-control" name="supplier_name" id="supplier_name" value="{{ $supplier->supplier_name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="">Phone Number</label>
                        <input type="text" class="form-control" name="supplier_phone" id="supplier_phone" value="{{ $supplier->supplier_phone }}" required>
                    </div>


                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" name="supplier_address" id="supplier_address" value="{{ $supplier->supplier_address }}" required>
                    </div>

                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('all.suppliers') }}" type="button" class="btn btn-outline-danger"><i class="fas fa-long-arrow-alt-left mr-3"></i> Return</a>
                <button type="submit" class="btn btn-primary mr-0"><i class="fas fa-check mr-3"></i> Update Supplier</button>
            </div>

        </form>

    </div>
</div>
@endsection
