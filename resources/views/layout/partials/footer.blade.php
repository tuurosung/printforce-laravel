
<script type="text/javascript" src="{{ asset('matdash/vendor.min.js') }}"></script>
<script>
    // check the loaded jquery version
    console.log('JQuery version loaded in footer: ' + $.fn.jquery);
</script>


<script type="text/javascript" src="{{ asset('js/printforce/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/printforce/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/printforce/bootbox.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/datatables/datatables.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/printforce/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/printforce/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/printforce/app.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/printforce/modules/chart.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/printforce/toastify.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/printforce/lity.min.js') }}"></script>


<script type="text/javascript" src="{{ asset('matdash/bootstrap.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('matdash/simplebar.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('matdash/app.init.js') }}"></script>
<script type="text/javascript" src="{{ asset('matdash/theme.js') }}"></script>
<script type="text/javascript" src="{{ asset('matdash/app.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('matdash/apexcharts.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('matdash/homepage.js') }}"></script>
<script type="text/javascript" src="{{ asset('matdash/iconify-icon.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('matdash/owl.carousel.min.js') }}"></script>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js" type="text/javascript"></script>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->

<script type="text/javascript">
    window.routes = {
        'getServiceCost' : "{{  route('configuration.print-services.get-service-cost', ':serviceId') }}",
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

<!-- <script type="text/javascript" src="{{-- asset('js/clean-footer.js') --}}"></script>
<script type="text/javascript" src="{{-- asset('js/handle-datatables.js') --}}"></script>
<script type="text/javascript" src="{{-- asset('js/handle-datepickers.js') --}}"></script>
<script type="text/javascript" src="{{-- asset('js/handle-tab-states.js') --}}"></script>
<script type="text/javascript" src="{{-- asset('js/handle-select2.js') --}}"></script> -->

<!-- load the service cost function -->
 <script type="text/javascript" src="{{ asset('assets/js/printforce/print-services/get-service-cost.js') }}"></script>



<!-- if session has message -->
@if (Session::has('success'))
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof Toastify === 'undefined') {
            return;
        }
        Toastify({
        text: " {{ Session::get('success') }} ",
        duration: 3000,
        position: 'center',
        // className: "danger",
        style: {
            // background: "#e6180d",
        },
        offset: {
            x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
            y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
        },
    }).showToast();
}); // End DOMContentLoaded
</script>
@endif

@if (Session::has('error'))
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof Toastify === 'undefined') {
            return;
        }
        Toastify({
        text: "{{ Session::get('error') }}",
        duration: 4000,
        position: 'center',
        // className: "danger",
        style: {
            background: "#e6180d",
        },
        offset: {
            x: 50, // horizontal axis - can be a number or a string indicating unity. eg: '2em'
            y: 90 // vertical axis - can be a number or a string indicating unity. eg: '2em'
        },
    }).showToast();
    }); // End DOMContentLoaded
</script>
@endif


@stack('stacked-scripts')
