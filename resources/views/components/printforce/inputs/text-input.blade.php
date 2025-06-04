<div class="mb-3">
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    <input
        type="text"
        class="form-control border-elegant"
        name="{{ $name }}"
        id="{{ $id }}"
        placeholder="{{ $placeholder }}"
        value="{{ $value }}"
        {{ $readonly ? 'readonly' : '' }}
        {{ $required ? 'required' : '' }}
    />
</div>
