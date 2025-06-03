<div
    class="modal fade"
    id="new_user_modal"
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
                    Add New User
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-dismiss="modal"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('human-resources.users.store') }}" autocomplete="off">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="" class="form-label">Full Name</label>
                        <input
                            type="text"
                            class="form-control form-control-sm"
                            name="name"
                            id="name"
                            value=""
                            required />
                    </div>

                    <div class="row">
                        <div class="col">

                            <div class="mb-3">
                                <label for="" class="form-label">Phone Number</label>
                                <input
                                    type="text"
                                    class="form-control form-control-sm"
                                    name="phone_number"
                                    id="phone_number"
                                    value=""
                                    required>
                            </div>

                        </div>
                        <div class="col">

                            <div class="mb-3">
                                <label for="" class="form-label">Access Level</label>
                                <select
                                    class="form-select form-select-sm"
                                    name="access_level"
                                    id="access_level"
                                    value="">

                                    @foreach (App\Helpers\UserHelpers::$accessLevels as $key => $value)

                                    <option value="{{ $key }}">{{ $value }}</option>

                                    @endforeach
                                    <option value="administrator">Administrator</option>
                                    <option value="reception">Reception</option>
                                </select>
                            </div>

                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input
                            type="email"
                            class="form-control form-control-sm"
                            name="email"
                            id="email"
                            value=""
                            required />
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input
                                    type="password"
                                    class="form-control form-control-sm"
                                    name="password"
                                    id="password"
                                    value=""
                                    required />
                            </div>
                        </div>

                        <div class="col">

                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    name="confirm_password"
                                    id="confirm_password"
                                    required />
                            </div>

                        </div>



                    </div>

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
                        Create User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
