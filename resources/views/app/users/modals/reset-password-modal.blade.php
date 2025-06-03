<div
    class="modal fade"
    id="reset_password_modal"
    tabindex="-1"
    data-bs-backdrop="static"
    data-bs-keyboard="false"

    role="dialog"
    aria-labelledby="modalTitleId"
    aria-hidden="true"
>
    <div
        class="modal-dialog"
        role="document"
    >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Reset Password
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <form method="POST" action="{{ route('human-resources.users.update-password', $user) }}" autocomplete="off">
                @csrf
            <div class="modal-body">

                <div class="row">
                    <div class="col">
                       <div class="mb-3">
                        <label for="" class="form-label">New Password</label>
                        <input
                            type="password"
                            class="form-control"
                            name="password"
                            id="password"
                            placeholder="password"
                        />
                       </div>

                    </div>
                    <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Retype Password</label>
                        <input
                            type="password"
                            class="form-control"
                            name="confirm_password"
                            id="confirm_password"
                            placeholder="retype password"
                        />
                       </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal"
                >
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Update Password</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Optional: Place to the bottom of scripts -->
<script>
    const myModal = new bootstrap.Modal(
        document.getElementById("modalId"),
        options,
    );
</script>
