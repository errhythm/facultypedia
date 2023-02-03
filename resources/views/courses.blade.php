{{-- print all courses --}}
@foreach ($courses as $course)
    <div class="course">
        <h2>{{ $course->course_code }}</h2>
        <p>{{ $course->course_title }}</p>
        <p>{{ $course->course_credit }}</p>
    </div>
@endforeach
