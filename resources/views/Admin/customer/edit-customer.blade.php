@extends('layout.app')

@section('content')
<div class="d-flex justify-content-center">
    <div class="col-md-4 col-lg-4 col-sm-12">

        <h4 class="fs-30px fw-600 montserrat mb-3">Edit Customer</h4>

        <form autocomplete="off" method="POST" action="{{ route('customer.update') }}">
            @csrf

            <input type="hidden" name="customer_id" id="customer_id" value="{{ $customer->customer_id }}" required>

            <div class="card mb-3">
                <div class="card-body bg-white">

                    <div class="form-group d-none">
                        <label>Customer Name</label>
                        <input type="text" class="form-control" name="customer_id" id="customer_id" value="{{ $customer->customer_id }}" placeholder="Customer ID" readonly>
                    </div>

                    <div class="form-group">
                        <label>Customer Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $customer->name }}" placeholder="Customer's Name" required>
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number" value="{{ $customer->phone }}">
                    </div>

                    <div class="form-group">
                        <label>Customer Category</label>
                        <select class="custom-select browser-default" name="category" id="category">
                            <option value="">--- Category ---</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->category_id }}" {{ $customer->category === $category->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>

            <div class="">
                <div class="text-end">
                    <a href="{{ route('customer_list') }}" type="button" class="btn btn-outline-danger">
                        <i class="fas fa-long-arrow-alt-left mr-3  "></i> Return
                    </a>
                    <button type="submit" class="btn btn-primary m-0"><i class="fas fa-check mr-3  "></i> Update Customer</button>
                </div>
            </div>

        </form>

    </div>
</div>

@endsection

@section('js')
<script type="text/javascript">
    $('#category').select2();
</script>
@endsection