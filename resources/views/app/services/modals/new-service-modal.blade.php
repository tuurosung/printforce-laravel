<!-- Modal trigger button -->
<div
    class="modal fade"
    id="new_service_modal"
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
                    Add New Service
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-dismiss="modal"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form id="" autocomplete="off" method="POST" action="{{ route('create-service') }}">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="" class="form-label">Service Name</label>
                        <input
                            type="text"
                            class="form-control form-control-sm"
                            name="service_name"
                            id="service_name"
                            value=""
                            required />
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <select
                            class="form-select form-select-sm"
                            name="category_id"
                            id="service_category">

                            <option value="">--- Select Category ---</option>

                            @foreach ($serviceCategories as $serviceCategory)
                            <option value="{{ $serviceCategory->category_id }}">{{ $serviceCategory->category_name }}</option>
                            @endforeach


                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="" class="form-label">Artist/Photo</label>
                                <input
                                    type="number"
                                    step="any"
                                    class="form-control form-control-sm"
                                    name="artist"
                                    id="artist"
                                    value=""
                                    required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="" class="form-label">Individual</label>
                                <input
                                    type="number"
                                    step="any"
                                    class="form-control form-control-sm"
                                    name="individual"
                                    id="individual"
                                    value=""
                                    required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="" class="form-label">Institution</label>
                                <input
                                    type="number"
                                    step="any"
                                    class="form-control form-control-sm"
                                    name="institution"
                                    id="institution"
                                    value=""
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
                        Create Service
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
