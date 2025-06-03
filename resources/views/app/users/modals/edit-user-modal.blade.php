<div
    class="modal fade"
    id="edit_user_modal"
    tabindex="-1"

    role="dialog"
    aria-labelledby="modalTitleId"
    aria-hidden="true">
    <div
        class="modal-dialog"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Edit New User
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-dismiss="modal"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('human-resources.users.update', $user) }}" autocomplete="off">
                @csrf
                <div class="modal-body">

                    <x-printforce.inputs.text-input name="name" id="name" label="Full Name" :value="$user->name" required />


                    <div class="row">
                        <div class="col">
                            <x-printforce.inputs.text-input name="phone_number" id="phone_number" label="Phone Number" :value="$user->phone_number" required />

                        </div>
                        <div class="col">
                            <x-printforce.inputs.select-input
                                name="access_level"
                                id="access_level"
                                label="Access Level"
                                :options="\App\Facades\UserManager::getAccessLevels()"
                                :selected="$user->access_level" />

                        </div>
                    </div>

                    <x-printforce.inputs.text-input
                        name="email"
                        id="email"
                        label="Email"
                        :value="$user->email"
                        type="email"
                        required
                        readonly />

                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal"
                        data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-check me-3  "></i>
                        Update User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
