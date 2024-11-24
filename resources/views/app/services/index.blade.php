@extends('layout.app')

@section('content')
<div class="d-flex justify-content-between mb-5">
    <div>
        <h4 class="fs-30px fw-700 montserrat">Services</h4>
    </div>
    <div>
        <a href="{{ route('new.service') }}" type="button" class="btn btn-outline-primary">
            <i class="fas fa-plus mr-3  "></i> New Service</a>
    </div>
</div>

<!-- tab v2 with card -->
<div class="card">
    <ul class="nav nav-tabs nav-tabs-v2 ps-4 pe-4">
        <!-- <li class="nav-item me-3"><a href="#homev2WithCard" class="nav-link active" data-bs-toggle="tab">Home</a></li>
            <li class="nav-item me-3"><a href="#profilev2WithCard" class="nav-link" data-bs-toggle="tab">Profile</a></li> -->


        <?php
        $k = 1; //
        foreach ($service_categories as $category) : ?>
            <li class="nav-item me-3">
                <a href="#{{ $category->category_id }}" class="nav-link {{ $k++ === 1 ? 'active' : ''; }}" data-bs-toggle="tab">
                    {{ $category->category_name }}
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <div class="tab-content p-4">

        @php
        $k = 1; //
        @endphp

        @foreach ($service_categories as $category)

        <div class="tab-pane fade {{ $k++ === 1 ? 'show active' : ''; }}" id="{{ $category->category_id }}">

            <h5 class="mb-4">{{ $category->category_name }}</h5>

            <table class="table  table-secondary">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Service Name</th>
                        <th class="text-right">Artist</th>
                        <th class="text-right">Individual</th>
                        <th class="text-right">Institution</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach ($category->services as $services )
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $services['service_name']; ?></td>
                        <td class="text-right"><?php echo number_format($services['artist'], 2); ?></td>
                        <td class="text-right"><?php echo number_format($services['individual'], 2); ?></td>
                        <td class="text-right"><?php echo number_format($services['institution'], 2); ?></td>
                        <td class="text-right">

                            <a href="{{ route('edit.service', $services->service_id) }}" style="text-decoration:none">
                                <i class="fas fa-pen text-primary mr-3  "></i>
                            </a>


                            <a href="#" class="delete" style="text-decoration: none;" data-url="{{ route('delete.service', $services->service_id) }}">
                                <i class=" fas fa-trash-alt text-danger "></i>
                            </a>

                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
        @endforeach
    </div>
</div>

@include('layout.deleteFrm')

@endsection


@section('js')
<script type="text/javascript">
    $('.table tbody').on('click', '.delete', function(event) {
        const $this = $(this);
        const url = $this.data('url')

        bootbox.confirm('Are you sure you want to delete this service?', function(confirmed) {
            if (confirmed) {

                $('#deleteFrm').attr('action', url);
                $('#deleteFrm').submit()

            }
        }); //end bootbox
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
