@props(['active'])

@php
$classes = ($active ?? false)
            ? 'nav-link text-primary fw-bold'
            : 'nav-link';
@endphp

<a wire:navigate {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>