@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-white bg-gray-800'
            : 'text-gray-300 hover:text-white hover:bg-gray-800';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
