@props([
    'title' => '',
    'value' => '',
    'svg' => '',
])

<div class="rounded-lg border border-slate-150 p-3 dark:border-navy-700">
    <div class="flex justify-between space-x-1">
        <p class="text-xl font-semibold text-slate-700 dark:text-navy-100">
            {{ $value }}
        </p>
        {{-- link an svg image --}}
        {!! $svg !!}
    </div>
    <p class="mt-1 text-xs+ line-clamp-1">{{ $title }}</p>
</div>
