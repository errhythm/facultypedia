@props(['mode' => $mode])


@php
    $arrow = '';
    if ($mode == 0) {
        $arrow = 'M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z';
    }
    else {
        $arrow = 'M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z';
    }

@endphp


<li><a href="{{ route('faculties') }}">Search Faculties</a></li>
<li tabindex="0">
    <a class="justify-between">
        Parent
        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path d="{{ $arrow }}" />
        </svg>
    </a>
    <ul class="p-2 bg-base-100 shadow-md">
        <li>
            <a>Submenu 1</a>
        </li>
        <li><a>Submenu 2</a></li>
    </ul>
</li>
<li><a href="{{ route('dashboard') }}" >Dashboard</a></li>
@if ($mode == 0)
<li><a href="/login">Login</a></li>
<li><a href="/register">Register</a></li>
@endif
