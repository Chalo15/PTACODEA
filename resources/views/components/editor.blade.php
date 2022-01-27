@props(['name', 'value' => '', 'uuid' => Illuminate\Support\Str::uuid() ])

@php
$invalid = $errors->has($name) ? 'is-invalid' : '';
@endphp

<textarea name="{{ $name }}" id="editor-{{ $uuid }}" {{ $attributes->merge(['class' => "form-control $invalid"]) }}>{{ $value ?? $slot }}</textarea>

@error($name)
<div class="invalid-feedback">{{ ucfirst($message) }}</div>
@enderror

@push('scripts')
<script>
    ClassicEditor
        .create(document.querySelector('#editor-{{ $uuid }}'), {
            removePlugins: ["EasyImage", "ImageUpload", "MediaEmbed"]
        })
        .then(editor => {})
        .catch(error => {});

</script>
@endpush
