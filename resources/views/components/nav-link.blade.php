@props(['active'])

@php
    $classes = $active ?? false ? 'inline-flex items-center px-1 pt-1 text-sm leading-5 focus:outline-none transition duration-150 ease-in-out text-white font-medium mb-2' : 'inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-300 hover:text-gray-100 focus:outline-none focus:text-gray-100 transition duration-150 ease-in-out hover:scale-125 mb-2 ml-5';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
