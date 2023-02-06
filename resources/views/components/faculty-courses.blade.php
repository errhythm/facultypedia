@props(['facultyCourses', 'courses'])

@foreach ($facultyCourses as $facultycourse)
    @foreach (json_decode($facultycourse->courses) as $facultycoursex)
        @foreach ($courses as $course)
            @if ($course->id == $facultycoursex)
                <a href="/faculties?course={{ $course->course_code }}" class="btn_1 outline" style="padding: 1px 5px;">
                    {{ $course->course_code }}
                </a>
            @endif
        @endforeach
    @endforeach
@endforeach
