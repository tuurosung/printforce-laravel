<div class="mb-3">
    <label for="" class="form-label">{{ $label }}</label>
    <input
        type="number"
        name="{{ $name }}"
        id="{{ $id }}"
        placeholder="{{ $placeholder }}"
        value="{{ $value ?? '' }}"
        min="{{ $min ?? 0 }}"
        step="{{ $step ?? 'any' }}"
        {{ $attributes->whereStartsWith('wire:model') }}
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => 'form-control']) }}

        onkeyup="this.value = this.value.replace(/[^0-9.]/g, '')"

    />
</div>
