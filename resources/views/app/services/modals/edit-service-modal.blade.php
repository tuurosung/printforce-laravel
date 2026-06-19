<x-modals.modal modalId="edit-service-modal">

    <x-modals.modal-header modalId="edit-service-modal" modalTitle="Edit Service Information" />

    <form id="" autocomplete="off" method="POST" action="{{ route('print-services.update', $printService) }}">
        @csrf
        @method("PATCH")
        <div class="p-6">

            <input
                type="hidden"
                class="form-control d-none"
                name="service_id"
                value="{{ $printService->service_id }}"
                required
                readonly />

            <div class="grid grid-cols-12 gap-6">

                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12 mb-8">
                    <label for="" class="form-label">Service Name</label>
                    <input
                        type="text"
                        class="form-control"
                        name="service_name"
                        id="edit_service_name"
                        value="{{ $printService->service_name }}"
                        required />
                </div>

                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <label for="" class="form-label">Category</label>
                    <select
                        class="form-control form-select-sm"
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

                <div class="lg:col-span-4 md:col-span-4 sm:col-span-12 col-span-12 mb-4">
                    <div class="mb-3">
                        <label for="" class="form-label">Artist/Photo</label>
                        <input
                            type="number"
                            step="any"
                            class="form-control"
                            name="artist"
                            id="artist"
                            value="{{ $printService->artist }}"
                            required />
                    </div>
                </div>
                <div class="lg:col-span-4 md:col-span-4 sm:col-span-12 col-span-12">
                    <div class="mb-3">
                        <label for="" class="form-label">Individual</label>
                        <input
                            type="number"
                            step="any"
                            class="form-control"
                            name="individual"
                            id="individual"
                            value="{{ $printService->individual }}"
                            required />
                    </div>
                </div>
                <div class="lg:col-span-4 md:col-span-4 sm:col-span-12 col-span-12">
                    <div class="mb-3">
                        <label for="" class="form-label">Institution</label>
                        <input
                            type="number"
                            step="any"
                            class="form-control"
                            name="institution"
                            id="institution"
                            value="{{ $printService->institution }}"
                            required />
                    </div>
                </div>
            </div>

        </div>

        <x-modals.modal-footer modalId="edit-service-modal" btnLabel="Update Service Information" />
    </form>
</x-modals.modal>
