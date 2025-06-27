@props(['active'])

@php
$classes = ($active ?? false)
    ? 'inline-flex items-center px-3 py-2 rounded-md bg-blue-800 text-white font-medium transition duration-150 ease-in-out'
    : 'inline-flex items-center px-3 py-2 rounded-md text-white hover:bg-blue-600 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
