@extends('layout.app')

@section('content')

<div class="d-flex justify-content-center">
    <div class="col-md-4 col-lg-4 col-sm-12">

        <h4 class="fs-30px fw-600 montserrat mb-3">New Customer</h4>

        <form id="" autocomplete="off" method="POST" action="{{ route('create-customer') }}">
            @csrf
            <div class="card mb-3">
                <div class="card-body bg-white">



                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name" value="" placeholder="Customer's Name" required>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number" value="">
                    </div>

                    <div class="form-group">
                        <select class="custom-select browser-default" name="category" id="category">
                            <option value="">--- Category ---</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
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
                    <button type="submit" class="btn btn-primary m-0"><i class="fas fa-check mr-3  "></i> Save Customer</button>
                </div>
            </div>

        </form>

    </div>
</div>



@endsection


@section('js')
<script type="text/javascript">
    $('#category').select2();

    $(document).ready(function() {

        // set active sidebar
        $('.list-group-item').removeClass('active')
        $('#customers_nav').addClass('active')




        /**
         * ValidatePhone - Validate phone number
         * @param {phone} phone Number to validate
         */
        function ValidatePhone(phone) {
            // check for length of phone number
            if (phone.length !== 10)
                return 'invalid';

            var valid_phone = new RegExp('[0-9]');
            if (valid_phone.test(phone)) {
                prefix = phone.substring(0, 3)

                if (
                    prefix === '024' ||
                    prefix === '054' ||
                    prefix === '055' ||
                    prefix === '020' ||
                    prefix === '050' ||
                    prefix === '026' ||
                    prefix === '056' ||
                    prefix === '027' ||
                    prefix === '057' ||
                    prefix === '053' ||
                    prefix === '023'
                ) {
                    return 'valid';
                } else {
                    return 'invalid';
                }
            }
        }
    });
</script>
@endsection