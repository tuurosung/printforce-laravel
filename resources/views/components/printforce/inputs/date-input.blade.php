@props([
    'attributes' => ''
])

<div class="mb-3">
    <label for="" class="form-label">{{ $label }}</label>
    <input
        type="date"
        name="{{ $name }}"
        id="{{ $id }}"
        value="{{ $value }}"
        {{ $attributes->merge(['class' => "form-control datepicker-input"]) }} />
        @error('{{ $name }}') <span class="text-error">{{ $message }}</span> @enderror
</div>
