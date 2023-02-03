@props(['faculty' => $faculty])
{{-- add \App\Models\Faculties::all() --}}
@php
    $facultyCourses = \App\Models\Faculties::where('user_id', $faculty->id)->get();
    $courses = \App\Models\Courses::all();
@endphp

<div class="strip_list wow fadeIn">
    <figure>
        <a href="/profile/{{ $faculty->id }}">
            <img src="https://api.dicebear.com/5.x/bottts-neutral/svg?seed={{ md5($faculty->id . $faculty->created_at) }}&rotate=20&scale=110"
                alt="" />
        </a>
    </figure>
    <small>{{ $faculty->university_id }}</small>
    <a href="/profile/{{ $faculty->id }}">
        <h3>{{ $faculty->name }}</h3>
    </a>
    <p>
        <b>Email:</b> {{ $faculty->email }} <br />
        <b>Created at:</b> {{ $faculty->created_at }}
    </p>

    @foreach ($facultyCourses as $facultycourse)
        @foreach (json_decode($facultycourse->courses) as $facultycoursex)
            @foreach ($courses as $course)
                @if ($course->id == $facultycoursex)
                    {{ $course->course_code }}
                @endif
            @endforeach
        @endforeach
    @endforeach

    <span class="rating">
        <i class="icon_star voted"></i>
        <i class="icon_star voted"></i>
        <i class="icon_star voted"></i>
        <i class="icon_star"></i>
        <i class="icon_star"></i>
        <small>(145)</small>
    </span>
    <ul>
        <li>
            <a href="#0" class="btn_listing">View Profile</a>
        </li>
        <li>
            <b>{{ $faculty->department }}</b>
        </li>
        <li><a href="detail-page.html">Book Consultation</a></li>
    </ul>
</div>
