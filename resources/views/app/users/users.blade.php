@extends('layout.app')

@section('content')

<div class="d-flex justify-content-between mb-5">
    <div>
        <h2 class="h2">Registered Users</h2>
    </div>
    <div>
        <button
            type="button"
            class="btn btn-primary"
            data-toggle="modal"
            data-target="#new_user_modal">
            <i class="fas fa-plus me-3"></i>
            New User
        </button>
    </div>
</div>


@include('layout.errors')

<div class="card border-0">
    <div class="card-body">


        <table class="table table-sm datatables">
            <thead class="">
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Access Level</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = 1;
                @endphp

                @foreach ($users as $user)
                <tr class="">
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $user['user_id']; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['phone_number']; ?></td>
                    <td><?php echo $user['access_level']; ?></td>
                    <td class="text-end">

                        <a
                            href="#"
                            data-url="{{ route('edit-user', $user) }}"
                            class="me-3 text-primary edit_user">

                            <i class="fas fa-pen"></i>
                            Edit

                        </a>
                        <a
                            href="#"
                            class="delete_user text-danger">

                            <i class="fas fa-trash-alt"></i>
                            Delete

                        </a>

                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>

    </div>
</div>


<div class="" id="modal_holder"></div>

@include('app.users.modals.new-user-modal')

@endsection


@section('js')

<script type="text/javascript">
    $('#access_level').select2({
        dropdownParent: $('#new_user_modal'),
    })

    $('.table tbody').on('click', '.edit_user', function() {

        const url = $(this).data('url')
        showEditModal(url)
    });

    $('.table tbody').on('click', '.delete', function(event) {
        event.preventDefault();
        const deleteKey = $(this).data('url');

        bootbox.confirm("This would permanently remove the user. Proceed?", function(r) {
            if (r === true) {
                window.location = deleteKey;
            } //end if
        })

    });

    const showEditModal = (url) => {
        $.get(url, (msg) => {
            $('#modal_holder').html(msg);
            new bootstrap.Modal(document.getElementById('edit_user_modal')).show();
        })
    }

    confirmDelete = (user) => {

        new swal("Confirm", "Are you sure you want to delete this user?", "warning", {
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
                    user.closest('form').submit();
                    break;
            }
        });
    }
</script>

@endsection
