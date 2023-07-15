@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group bg-blue-600 text-white'
            : 'flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group text-white hover:bg-gray-700';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
