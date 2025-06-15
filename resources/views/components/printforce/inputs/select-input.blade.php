<div class="mb-3">
    <label for="" class="form-label">{{ $label }}</label>
    <select class="form-select select2-input"
        name="{{ $name }}"
        id="{{ $id }}">
        <option value="">--- Select Option ---</option>

        @foreach ($options as $key => $value)
            <option value="{{ $key }}" {{ $selected == $key ? 'selected' : '' }}>{{ $value }}</option>
        @endforeach
    </select>
</div>
