<x-modals.modal modalId="new-service-modal">
    <x-modals.modal-header modalId="new-service-modal" modalTitle="Add New Service" />

    <form id="" autocomplete="off" method="POST" action="{{ route('print-services.store') }}">
        @csrf
        <div class="p-6">

            <div class="grid grid-cols-12 gap-6">

                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <label for="" class="form-label">Service Name</label>
                    <input type="text" class="form-control" name="service_name" id="service_name" value="" required />
                </div>


                <div class="lg:col-span-6 md:col-span-6 sm:col-span-12 col-span-12">
                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <select class="form-control form-select-sm" name="category_id" id="service_category">

                            <option value="">--- Select Category ---</option>

                            @foreach ($printServiceCategories as $serviceCategory)
                            <option value="{{ $serviceCategory->category_id }}">{{ $serviceCategory->category_name }}</option>
                            @endforeach


                        </select>
                    </div>
                </div>

                <div class="lg:col-span-4 md:col-span-4 sm:col-span-12 col-span-12">
                    <div class="mb-3">
                        <label for="" class="form-label">Artist/Photo</label>
                        <input type="number" step="any" class="form-control" name="artist" id="artist" value="" required />
                    </div>
                </div>
                <div class="lg:col-span-4 md:col-span-4 sm:col-span-12 col-span-12">
                    <div class="mb-3">
                        <label for="" class="form-label">Individual</label>
                        <input type="number" step="any" class="form-control" name="individual" id="individual" value=""
                            required />
                    </div>
                </div>
                <div class="lg:col-span-4 md:col-span-4 sm:col-span-12 col-span-12">
                    <div class="mb-3">
                        <label for="" class="form-label">Institution</label>
                        <input type="number" step="any" class="form-control" name="institution" id="institution" value=""
                            required />
                    </div>
                </div>

            </div>

            </div>


        <x-modals.modal-footer modalId="new-service-modal" btnLabel="Create Service" />
    </form>
</x-modals.modal>
