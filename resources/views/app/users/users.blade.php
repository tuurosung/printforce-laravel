@extends('layout.app')

@section('content')

<x-printforce.headers.page-header title="Registered Users">

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_user_modal">
        <i class="fas fa-plus me-3"></i>
        New User
    </button>

</x-printforce.headers.page-header>

@include('layout.errors')

<div class="card border-0">
    <div class="card-body">


        <table class="table table-sm datatables">
            <thead class="">
                <tr>
                    <th>#</th>
                    <th>Date Created</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Access Level</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                <tr class="">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>{{ $user->access_level_name }}</td>
                    <td class="text-end">
                        @can('administrator')

                        <a href="#" class="text-primary reset_password me-3" data-bs-toggle="tooltip"
                            title="Reset Password"
                            data-url="{{ route('human-resources.users.reset-password', $user) }}">

                            <i class="fa fa-key" aria-hidden="true"></i> Reset Password
                        </a>
                        @endcan


                        <a href="#" data-url="{{ route('human-resources.users.edit', $user) }}"
                            class="me-3 text-primary edit_user">

                            <i class="fas fa-pen"></i>
                            Edit

                        </a>
                        <form action="{{ route('human-resources.users.delete', $user) }}"
                            method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <a href="#" class="delete_user text-danger">

                            <i class="fas fa-trash-alt"></i>
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

$('.table tbody').on('click', '.delete_user', function(event) {
    event.preventDefault();
    var form = $(this).closest('form');

    bootbox.confirm("This would permanently remove the user. Proceed?", function(answer) {
        if (answer) {
            form.submit();
        }
    })
});

$('.table tbody').on('click', '.reset_password', function(event) {
    event.preventDefault();
    const url = $(this).data('url');

    $.get(url, (msg) => {
        $('#modal_holder').html(msg);
        new bootstrap.Modal(document.getElementById('reset_password_modal')).show();
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
