@props([
    'name' => '',
    'label' => '',
    'type' => '',
    'placeholder' => '',
    'required' => true,
    'readonly' => false,
    'disabled' => false,
    'class' => '',
    'value' => null
])
<div class="mb-3 {{ $class }}">
    {{ $slot }}
    @if($slot == null || $slot == '')
    <label for="{{ $name }}" class="form-label">{{ translate($label) }}</label>
    <input type="{{ $type }}" value="{{ $value }}" class="form-control @error($name) is-invalid  @enderror" id="{{ $name }}" name="{{ $name }}"
        placeholder="{{ translate($placeholder) }}" {{ $required == true ? 'required' : '' }} autofocus>
    @error($name)
        <span class="text-danger d-block mb-2">
            {{ $message }}
        </span>
    @enderror
    @endif
</div>
