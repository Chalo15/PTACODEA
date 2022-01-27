@props(['name', 'value'=>null])

@php
$invalid = $errors->has($name) ? 'is-invalid' : '';
@endphp

<textarea name="{{ $name }}" id="{{ $name }}" {{ $attributes->merge(['class' => "form-control $invalid"]) }}>{{ $value ?? $slot }}</textarea>

@error($name)
<div class="invalid-feedback">{{ $message }}</div>
@enderror
