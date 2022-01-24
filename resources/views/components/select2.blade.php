@props(['name'])

@php
$invalid = $errors->has($name) ? 'is-invalid' : '';
@endphp

<select style="width: 100%;" name="{{ $name }}" {{ $attributes->merge(['class' => "form-control select2 {$invalid}"]) }}>
    {{ $slot }}
</select>

@error($name)
<div class="invalid-feedback">{{ $message }}</div>
@enderror
