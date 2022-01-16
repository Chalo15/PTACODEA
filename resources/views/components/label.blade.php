@props(['title'])

<label {{ $attributes->merge(['class' => 'col-sm-2 col-form-label']) }}>
    {{ $title ?? $slot }}
</label>
