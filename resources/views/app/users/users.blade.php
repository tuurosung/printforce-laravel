@extends('layout.app')

@section('content')

<x-headers.page-header pageTitle="Registered Users">
    <button type="button" class="btn btn-primary" data-hs-overlay="#new-user-modal">
        <i class="fi fi-rr-plus me-3"></i>
        New User
    </button>
</x-headers.page-header>



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
                    <th>Email</th>
                    <th>Access Level</th>
                    <th class="text-end">Options</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                <tr class="">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{$user->created_at?->format('d M Y | H:i') }}</td>
                    <td class="text-capitalize">{{ $user->name }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->access_level->label()}}</td>
                    <td class="text-end">
                        @can('administrator')

                        <div class="hs-dropdown relative inline-flex">
                            <button id="hs-dropdown-default" type="button" class="hs-dropdown-toggle inline-flex items-center gap-x-2 text-sm cursor-pointer">
                                <span class="leading-tight">Options</span>
                                <i class="fi fi-rr-angle-down leading-tight font-medium hs-dropdown-open:rotate-180"></i>
                            </button>

                            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-md p-2 mt-2 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full z-10" aria-labelledby="hs-dropdown-default" role="menu">
                                <x-dropdowns.dropdown-item label="Edit" icon="edit" iconColour="primary" href="#" class="edit_user" data-url="{{ route('hr.users.edit', $user) }}" />
                                <form action="{{ route('hr.users.destroy', $user) }}"
                                    method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <x-dropdowns.dropdown-item label="Delete" icon="trash" iconColour="danger" href="#" class="delete_user" />
                                </form>
                                <x-dropdowns.dropdown-item label="Reset Password" icon="lock" iconColour="info" href="#" class="reset_password" data-url="{{ route('hr.users.password.reset', $user) }}" />

                            </div>
                        </div>

                        @endcan

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
