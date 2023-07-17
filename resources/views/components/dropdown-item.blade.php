@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center w-full p-2 pl-4 transition duration-75 rounded-lg group bg-blue-600 text-white'
            : 'flex items-center w-full p-2 pl-4 transition duration-75 rounded-lg group text-white hover:bg-gray-600 border border-gray-700';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
