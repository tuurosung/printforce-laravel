@use(Lunaweb\RecaptchaV3\Facades\RecaptchaV3)

<x-modals.modal modalId="new-user-modal">
    <x-modals.modal-header modalId="new-user-modal" modalTitle="Create New User" />

    <form method="POST" action="{{ route('hr.users.store') }}" autocomplete="off">
        @csrf

        <div class="p-6">

            <div class="grid grid-cols-12 gap-6">

                <div class="lg:col-span-6 md:span-6 sm:col-span-12 col-span-12">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">First Name</label>
                        <input
                            type="text"
                            class="form-control"
                            name="firstname"
                            id="firstname"
                            placeholder=""
                            required />
                    </div>
                </div>

                <div class="lg:col-span-6 md:span-6 sm:col-span-12 col-span-12">
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input
                            type="text"
                            class="form-control"
                            name="lastname"
                            id="lastname"
                            aria-describedby="helpId"
                            placeholder=""
                            required />
                    </div>
                </div>
                <div class="lg:col-span-6 md:span-6 sm:col-span-12 col-span-12">
                    <label for="" class="form-label">Phone Number</label>
                    <input
                        type="text"
                        class="form-control"
                        name="phone_number"
                        id="phone_number"
                        value=""
                        required>
                </div>
                <div class="lg:col-span-6 md:span-6 sm:col-span-12 col-span-12">
                    <label for="" class="form-label">Access Level</label>
                    <select
                        class="form-control"
                        name="access_level"
                        id="access_level"
                        value="">

                        @foreach (\App\Enums\Users\AccessLevelEnum::options() as $key => $value)

                        <option value="{{ $key }}">{{ $value }}</option>

                        @endforeach
                    </select>
                </div>
                <div class="lg:col-span-12 md:span-12 sm:col-span-12 col-span-12">
                    <label for="" class="form-label">Email</label>
                    <input
                        type="email"
                        class="form-control"
                        name="email"
                        id="email"
                        value=""
                        required />
                </div>
                <div class="lg:col-span-6 md:span-6 sm:col-span-12 col-span-12">
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input
                            type="password"
                            class="form-control"
                            name="password"
                            id="password"
                            value=""
                            required />
                    </div>
                </div>
                <div class="lg:col-span-6 md:span-6 sm:col-span-12 col-span-12">
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


        {!! \RecaptchaV3::field('create') !!}


        <x-modals.modal-footer modalId="new-user-modal" btnLabel="Create User" />

    </form>
</x-modals.modal>

