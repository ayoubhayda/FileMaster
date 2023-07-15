@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group bg-blue-600 dark:text-white'
            : 'flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
