@props([
'attributes' => ''
])
<div class="mb-3">
    <label for="{{ $id }}" class="form-label text-black mb-2">{{ $label }}</label>

    <input
        type="text"
        name="{{ $name }}"
        placeholder="{{ $placeholder }}"
        value="{{ $value }}"
        {{ $readonly ? 'readonly' : '' }}
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => 'form-control border-elegant mb-1']) }} />

    @error($name)
    <span class="text-danger">
        {{ $message }}
    </span>
    @enderror
</div>
