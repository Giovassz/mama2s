@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-[#FFC107]'
            : 'text-white hover:text-[#FFC107]';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
