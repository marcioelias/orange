@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-8 pt-1 border-b-2 border-slate-200 text-sm font-medium leading-5 text-slate-100 focus:outline-none focus:border-slate-500 bg-stone-800 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-8 pt-1 text-sm font-medium leading-5 text-slate-100 hover:text-slate-300 hover:border-slate-300 focus:outline-none focus:text-gray-300 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
