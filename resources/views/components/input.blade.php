@props(['name', 'type'=> 'text'])

@php
$invalid = $errors->has($name) ? 'is-invalid' : '';
@endphp

<input id="{{ $name }}" type="{{ $type }}" name="{{ $name }}" {{ $attributes->merge(['class' => "form-control $invalid"]) }}>

@error($name)
<div class="invalid-feedback">{{ ucfirst($message) }}</div>
@enderror
