{{-- link name svg prop --}}
@props([
    'url' => '',
    'name' => '',
    'svg' => '',
])
{{-- link name svg prop --}}
<a href="{{ $url }}"
    class="flex h-11 w-11 items-center justify-center rounded-lg bg-primary/10 text-primary outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:bg-navy-600 dark:text-accent-light dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90"
    x-tooltip.placement.right="'{!! $name !!}'">
    <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        {{!! $svg !!}}
    </svg>
</a>
