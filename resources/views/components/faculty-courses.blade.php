@props(['facultyCourses', 'courses'])

@foreach ($facultyCourses as $facultycourse)
    @php
        $xcourses = explode(',', $facultycourse->courses);
    @endphp
    @foreach ($xcourses as $facultycoursex)
        @foreach ($courses as $course)
            @if ($course->id == $facultycoursex)
                <a href="/faculties?course={{ $course->course_code }}"
                    class="bg-primary-focus/10 hover:bg-primary-content hover:text-base-100 text-info-content text-sm font-medium px-3 py-1 rounded-lg h-[24px] inline-block m-1">
                    {{ $course->course_code }}
                </a>
            @endif
        @endforeach
    @endforeach
@endforeach
