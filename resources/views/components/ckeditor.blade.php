@props(['name'])

<textarea name="{{ $name }}" class="ckeditor">

{{ $slot }}

</textarea>
