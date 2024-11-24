
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
