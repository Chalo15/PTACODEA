@props(['name'])

@php
$invalid = $errors->has($name) ? 'is-invalid' : '';
@endphp

<textarea name="{{ $name }}" {{ $attributes->merge(['class' => "form-control $invalid"]) }}>
{{ $slot }}
</textarea>

@error($name)
<div class="invalid-feedback">{{ $message }}</div>
@enderror
