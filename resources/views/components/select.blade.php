@props([
    'name' => '',
    'label' => '',
    'type' => '',
    'multiple' => false,
    'required' => true,
    'readonly' => false,
    'disabled' => false,
    'class' => ''
])
<div class="mb-3 {{ $class }}">
    <label for="{{ $name }}" class="form-label">{{ translate($label) }}</label>
    <select {{ $multiple == true ? 'multiple' : '' }} {{ $required == true ? 'required' : '' }} class="form-select @error($name) is-invalid  @enderror" id="{{ $name }}" name="{{ $name }}">
        {{ $slot }}
    </select>
    @error($name)
        <span class="text-danger d-block mb-2">
            {{ $message }}
        </span>
    @enderror
</div>
