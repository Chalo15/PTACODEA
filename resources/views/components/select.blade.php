{{-- @props(['name', 'label'=>null, 'type','placeholder'=>null])

<label for="{{ $name }}" class="col-md-4 col-form-label text-md-right">{{ $label }}</label>

<div class="col-md-3 selectContainer">
    <select name="{{ $name }}" class="form-select {{ $errors->has($name) ? 'is-invalid' : '' }}" type="{{$type}}" placeholder="{{$placeholder}}">
        {{ $slot }}
    </select>
</div>

@error($name)
<div id="validationServer03Feedback" class="invalid-feedback">
    {{ $message }}
</div>
@enderror --}}

@props(['name'])

@php
$invalid = $errors->has($name) ? 'is-invalid' : '';
@endphp

<select name="{{ $name }}" {{ $attributes->merge(['class' => "form-control {$invalid}"]) }}>
    {{ $slot }}
</select>

@error($name)
<div class="invalid-feedback">{{ ucfirst($message) }}</div>
@enderror
