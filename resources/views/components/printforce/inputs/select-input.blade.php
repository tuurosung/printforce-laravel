@props([
'attributes' => ''
])
<div class="mb-3">
    <label for="" class="form-label">{{ $label }}</label>
    <select class="form-control"
        name="{{ $name }}"
        id="{{ $id }}" {{ $attributes }}>
        <option value="">--- Select Option ---</option>

        @foreach ($options ?? [] as $key => $value)
        <option value="{{ $key }}" {{ $selected == $key ? 'selected' : '' }}>{{ $value }}</option>
        @endforeach
    </select>

    @error($name)
    <span class="text-danger">
        {{ $message }}
    </span>
    @enderror

</div>
