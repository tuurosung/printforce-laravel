@extends('layout.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <div>
        <h4 class="h2">Services</h4>
    </div>
    <div>
        <button
            type="button"
            class="btn btn-primary"
            data-toggle="modal"
            data-target="#new_service_modal">

            <i class="fas fa-plus me-3  "></i>
            New Service
        </button>
    </div>
</div>

@include('layout.errors')

<ul class="nav nav-pills nav-tabs-v2 mb-4">
    <!-- <li class="nav-item me-3"><a href="#homev2WithCard" class="nav-link active" data-bs-toggle="tab">Home</a></li>
            <li class="nav-item me-3"><a href="#profilev2WithCard" class="nav-link" data-bs-toggle="tab">Profile</a></li> -->

    @php
    $k = 1;
    @endphp

    @foreach ($serviceCategories as $category)
    <li class="nav-item me-3">
        <a href="#{{ $category->category_id }}" class="nav-link {{ $k++ === 1 ? 'active' : '' }}" data-toggle="tab">
            {{ $category->category_name }}
        </a>
    </li>
    @endforeach


</ul>
<div class="tab-content">

    @php
    $k = 1; //
    @endphp


    @foreach ($serviceCategories as $category)

    <div class="tab-pane fade {{ $k++ === 1 ? 'show active' : '' }}" id="{{ $category->category_id }}">

        <div class="card border-0" style="min-height: 70vh;">
            <div class="card-body">

                <h5 class="h5 mb-5">{{ $category->category_name }}</h5>

                <table class="table table-sm table-hover datatables">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Service Name</th>
                            <th class="text-end">Artist</th>
                            <th class="text-end">Individual</th>
                            <th class="text-end">Institution</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($category->services as $service )
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $service['service_name']; ?></td>
                            <td class="text-end pe-20px"><?php echo number_format($service['artist'], 2); ?></td>
                            <td class="text-end pe-20px"><?php echo number_format($service['individual'], 2); ?></td>
                            <td class="text-end pe-20px"><?php echo number_format($service['institution'], 2); ?></td>
                            <td class="text-end">

                                <a
                                    href="#"
                                    class="edit_service text-primary me-3"
                                    data-url="{{ route('edit-service', $service->service_id) }}">
                                    <i class="fas fa-pen text-primary"></i>
                                    Edit
                                </a>

                                <form class="d-inline-block" method="POST" action="{{ route('delete-service', $service) }}">
                                    @csrf
                                    @method ('delete')
                                    <a
                                        href="#"
                                        class="delete_service text-danger">
                                        <i class=" fas fa-trash-alt text-danger "></i>
                                        Delete
                                    </a>
                                </form>

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>



    </div>
    @endforeach
</div>


<div id="modal_holder"></div>

@include('layout.deleteFrm')
@include('app.services.modals.new-service-modal')

@endsection


@section('js')
<script type="text/javascript">
    $('#new_service_modal').on('shown.bs.modal', function() {
        $('#service_name').focus();
        $('#service_category').select2({
            dropdownParent: $('#new_service_modal'),
        })
    });

    $('.table tbody').on('click', '.edit_service', function(event) {

        const url = $(this).data('url')
        $.get(url, function(msg) {
            $('#modal_holder').html(msg)
            $('#edit_service_modal').modal('show')

            $('#edit_service_modal').on('shown.bs.modal', function() {
                $('#service_name').focus();
                $('#edit_service_category').select2({
                    dropdownParent: $('#edit_service_modal'),
                })
            });
        })
    })


    $('.table tbody').on('click', '.delete_service', function(event) {

        const $this = $(this);

        new swal("Confirm", "Are you sure you want to delete this service?", "warning", {
            buttons: {
                cancel: "Cancel",
                catch: {
                    text: "Yes! Delete it!",
                    value: "catch",
                }
            }
        })
        .then((value) => {
            switch (value) {
                case "cancel":
                    break;
                case "catch":
                    $this.closest('form').submit();
                    break;

                default:
                    break;
            }
        });
        

    })


    $('#new_service_frm').on('submit', function(event) {
        event.preventDefault();
        // var customer_id=$('#customer_id').val();
        $.ajax({
            url: '../serverscripts/admin/new_service_frm.php',
            type: 'POST',
            data: $('#new_service_frm').serialize(),
            success: function(msg) {
                if (msg === 'save_successful') {
                    bootbox.alert("Service registration successful", function() {
                        window.location.reload()
                    })
                } else {
                    bootbox.alert(msg)
                }
            }
        })
    });
</script>
@endsection
