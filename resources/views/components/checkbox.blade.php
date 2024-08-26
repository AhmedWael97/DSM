@props([
    'name' => '',
    'label' => '',
    'required' => true,
    'class' => '',
    'value' => null,
    'input_class' => '',
    'checked' => false,
])

<div class="form-check {{ $class }}">
    <input name="{{ $name }}" {{ $checked ? 'checked' : '' }} class="form-check-input {{ $input_class }} " type="checkbox"
        value="{{ $value }}" />
    <label class="form-check-label">
        {{ $label }}
    </label>
    @error($name)
        <span class="text-danger d-block mb-2"> {{ $message }} </span>
    @enderror
</div>
