@props(['active'])

@php
$classes = ($active ?? false)
//            ? 'inline-flex items-center px-8 pt-1 border-b-2 border-slate-200 text-sm font-medium leading-5 text-slate-100 focus:outline-none focus:border-slate-500 bg-stone-800 transition duration-150 ease-in-out'
//            : 'inline-flex items-center px-8 pt-1 text-sm font-medium leading-5 text-slate-100 hover:text-slate-300 hover:border-slate-300 focus:outline-none focus:text-gray-300 focus:border-gray-300 transition duration-150 ease-in-out';
            ? 'block pl-3 pr-4 py-2 border-l-4 border-slate-200 text-base font-medium text-slate-100 bg-stone-800 focus:outline-none transition duration-150 ease-in-out'
            : 'block pl-3 pr-4 py-2 text-base font-medium text-slate-100 hover:text-slate-300 hover:border-slate-300 focus:outline-none focus:text-gray-300 focus:bg-stone-800 hover:bg-stone-800 hover:border-l-4 hover:border-slate-200 hover:border-gray-300 focus:border-gray-300 transition duration-150 ease-in-out';
            /* ? 'block pl-3 pr-4 py-2 border-l-4 border-indigo-400 text-base font-medium text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out'; */
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
