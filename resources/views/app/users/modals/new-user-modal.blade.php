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

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">First Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="firstname"
                                    id="firstname"
                                    placeholder="your first name"
                                    required
                                />
                            </div>

                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="lastname"
                                    id="lastname"
                                    aria-describedby="helpId"
                                    placeholder="your last name"
                                    required
                                />
                            </div>

                        </div>
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

                                    @foreach (config('printforce.users.access_levels') as $key => $value)

                                    <option value="{{ $key }}">{{ $value }}</option>

                                    @endforeach
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

                    @use(Lunaweb\RecaptchaV3\Facades\RecaptchaV3)


                    {!! RecaptchaV3::field('create') !!}

                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal"
                        data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary" value="create">
                        <i class="fas fa-check me-3  "></i>
                        Create User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
