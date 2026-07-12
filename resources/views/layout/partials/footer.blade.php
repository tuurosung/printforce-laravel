<script>
    // check the loaded jquery version
    console.log('JQuery version loaded in footer: ' + $.fn.jquery);
</script>



<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js" type="text/javascript"></script>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->

<script type="text/javascript">
    window.routes = {
        'getServiceCost' : "{{  route('print-services.cost', ':serviceId') }}",
        'filterDesignJobs' : "{{ route('jobs.design.filter') }}",
        'filterLargeFormatJobs' : "{{ route('jobs.largeformat.filter') }}",
        'filterEmbroideryJobs' : "{{ route('jobs.embroidery.filter') }}",
        'filterPressJobs' : "{{ route('jobs.press.filter') }}",

        'filterCustomers' : "{{ route('customers.filter') }}", //filter the customer list
        'filterCustomersJson' : "{{ route('customers.filter-json') }}", //filter the customer list as json

        'getLargeFormatJobs' : "{{ route('jobs.largeformat.get-data') }}", //filter Large Format Jobs
        'getEmbroideryJobs' : "{{ route('jobs.embroidery.get-data') }}", //filter Embroidery Jobs
    }
</script>



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
