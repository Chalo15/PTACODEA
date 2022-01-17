@props(['color' => 'success', 'title' => null, 'message' => null])

@php
$icons = [

'danger' => 'icon fas fa-ban',
'info' => 'icon fas fa-info',
'warning' => 'icon fas fa-exclamation-triangle',
'success' => 'icon fas fa-check'

];
@endphp

<div class="alert alert-{{ $color }} alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

    @if($title)
    <h5><i class="{{ $icons[$color] }}"></i> {{ $title }}</h5>
    @endif

    {{ $message ?? $slot }}

</div>
