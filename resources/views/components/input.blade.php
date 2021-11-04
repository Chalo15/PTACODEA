@props(['name', 'placeholder','label', 'size' => 'sm', 'type'=> 'text', 'icon' => null])<!--ver si es necesario el icon-->

<label class="col-md-4 col-form-label text-md-right" for="{{ $name }}">{{ $label }}</label>
<div class="col-md-7">
<input class="form-control" value="{{ old($name) }}" placeholder="{{$placeholder}}" type="{{ $type }}" name="{{ $name }}" class="form-control form-control-{{ $size }} {{ $errors->has($name) ? 'is-invalid' : '' }}" id="validationServer03" aria-describedby="validationServer03Feedback">
</div>
@error($name)
<div id="validationServer03Feedback" class="invalid-feedback">
    {{ $message }}
</div>
@enderror