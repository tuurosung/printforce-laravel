<!-- Modal trigger button -->
<div
    class="modal fade"
    id="edit_service_modal"
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
                    Edit Service Information
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-dismiss="modal"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form id="" autocomplete="off" method="POST" action="{{ route('configuration.print-services.update', $printService) }}">
                @csrf
                <div class="modal-body">

                    <input
                        type="hidden"
                        class="form-control d-none"
                        name="service_id"
                        value="{{ $printService->service_id }}"
                        required
                        readonly />


                    <div class="mb-3">
                        <label for="" class="form-label">Service Name</label>
                        <input
                            type="text"
                            class="form-control form-control-sm"
                            name="service_name"
                            id="edit_service_name"
                            value="{{ $printService->service_name }}"
                            required />
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <select
                            class="form-select form-select-sm"
                            name="category_id"
                            id="edit_service_category">

                            <option value="">--- Select Category ---</option>

                            @foreach ($printServiceCategories as $serviceCategory)
                                <option value="{{ $serviceCategory->category_id }}" {{ $serviceCategory->category_id === $printService->category_id ? 'selected' : '' }}>
                                    {{ $serviceCategory->category_name }}
                                </option>
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
                                    value="{{ $printService->artist }}"
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
                                    value="{{ $printService->individual }}"
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
                                    value="{{ $printService->institution }}"
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
