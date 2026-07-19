<script type="text/javascript">

    function swalAlert(message, options = {}) {
        Swal.fire({
            title: 'Success!',
            text: message,
            icon: 'success',
            confirmButtonText: 'Okay'
        })
    }

    function swalConfirm(callback, message, options= {}) {
        Swal.fire({
                title: options.title ?? 'Confirm?',
                text: message ?? "You won't be able to revert this!",
                icon: 'warning',
                iconColour: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: options.confirmText ?? 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    callback()
                }
            })
    }

</script>


<!-- if session has message -->
@if (session()->has('success'))
<script type="text/javascript">

    $(document).ready(function() {
        Swal.fire({
            title: 'Success!',
            text: "{{ Session::get('success') }} ",
            icon: 'success',
            confirmButtonText: 'Okay'
        })
    })

</script>
@endif

@if (session()->has('error'))
<script type="text/javascript">
    $(document).ready(function() {
        Swal.fire({
            title: 'Error!',
            text: "{{ Session::get('error') }}",
            icon: 'error',
            confirmButtonText: 'Okay'
        })
    })
</script>
@endif


@stack('stacked-scripts')
