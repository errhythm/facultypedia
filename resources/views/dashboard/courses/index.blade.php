@php
    $page = request()->query('page') ?? 1;

    $page_count = $courses->lastPage();
    $per_page = $courses->perPage();
    $total = $courses->total();
    $query = '';
    // get current route
    $route = Route::currentRouteName();
    if (request('csearch')) {
        $query = http_build_query([
            'csearch' => request('csearch'),
        ]);
    }
    // break the query string into array
    $query = explode('&', $query);
    // remove page from query string
    $query = array_filter($query, function ($item) {
        return !str_contains($item, 'page');
    });
    // convert array to string
    $query = implode('&', $query);
    $query = $query ? $query . '&' : $query;
@endphp
@if ($page != 1 && $courses->isEmpty())
    @php
        header('Location: ' . route($route, $query . 'page=' . $page_count));
        exit();
    @endphp
@endif

<x-dashboard>
    <div class="py-6">
        <div class="px-4 ml-auto mt-8 sm:px-6 md:px-8">
            {{-- Table --}}

            <section class="px-4 py-5 sm:p-6">
                <div class="flex sm:items-center justify-between items-center">
                    <div>
                        <h2 class="text-xl font-bold text-base-content/80">{{ $heading }} - <span>
                                <label for="addCourses" class="text-primary hover:text-primary-focus cursor-pointer">Add
                                    New Course</label>
                            </span></h2>

                    </div>
                    <div
                        class="relative flex items-center lg:w-1/6 w-64 h-12 rounded-lg focus-within:shadow-lg bg-base-200 focus-within:border-primary border overflow-hidden">
                        <div class="grid place-items-center h-full w-12 text-base-content/30">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <form action="{{ route($route) }}" method="get">
                            <input class="peer h-full w-full outline-none text-sm text-base-content/70 bg-base-200 pr-2"
                                type="text" id="rsearch" name="csearch" value="{{ request('csearch') }}"
                                placeholder="Search something.." />
                        </form>
                    </div>
                </div>
                {{-- content --}}

                <div class="flex flex-col mt-6">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden border border-base-content/20  md:rounded-lg">
                                <table id="pending-course" class="min-w-full divide-y divide-base-content/20">
                                    <thead class="bg-base-300">
                                        <tr>
                                            {{-- table header for id --}}
                                            <th scope="col"
                                                class="py-3.5 px-3 text-sm font-normal text-left rtl:text-right text-base-content/50">
                                                <div class="flex items-center gap-x-3">
                                                    <span>ID</span>
                                                </div>
                                            </th>
                                            <th scope="col"
                                                class="py-3.5 px-3 text-sm font-normal text-left rtl:text-right text-base-content/50">
                                                <div class="flex items-center gap-x-3">
                                                    <span>Course Code</span>
                                                </div>
                                            </th>

                                            <th scope="col"
                                                class="px-3 py-3.5 text-sm font-normal text-left rtl:text-right text-base-content/50 whitespace-nowrap">
                                                <div class="flex items-center gap-x-2">
                                                    <span>Course Title</span>
                                                </div>
                                            </th>

                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-base-content/50">
                                                <div class="flex items-center gap-x-2">
                                                    <span>Course Credit</span>
                                                </div>
                                            </th>

                                            <th scope="col" class="relative py-3.5 px-4">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-base-100/50 divide-y divide-base-content/20 ">
                                        @if (count($courses) == 0)
                                            <tr>
                                                <td colspan="4"
                                                    class="px-4 py-20 mx-auto text-sm font-medium text-base-content/70">
                                                    <div class="flex items-center justify-center gap-x-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-8 w-8 text-error" viewBox="0 0 25 25"
                                                            fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M12,16a1,1,0,1,0,1,1A1,1,0,0,0,12,16Zm10.67,1.47-8.05-14a3,3,0,0,0-5.24,0l-8,14A3,3,0,0,0,3.94,22H20.06a3,3,0,0,0,2.61-4.53Zm-1.73,2a1,1,0,0,1-.88.51H3.94a1,1,0,0,1-.88-.51,1,1,0,0,1,0-1l8-14a1,1,0,0,1,1.78,0l8.05,14A1,1,0,0,1,20.94,19.49ZM12,8a1,1,0,0,0-1,1v4a1,1,0,0,0,2,0V9A1,1,0,0,0,12,8Z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <div class="py-2 text-sm font-medium text-base-content/70">
                                                            No courses found!
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($courses as $course)
                                                <tr>
                                                    <td class="pl-4 py-2 text-sm font-medium text-base-content/70">
                                                        {{ $course->id }}
                                                    </td>
                                                    <td class="pr-2 pl-6 py-2 text-sm font-medium text-base-content/70">
                                                        <div class="inline-flex items-center gap-x-3">
                                                            <div class="flex items-center gap-x-2">
                                                                <h2 class="font-medium text-base-content/80">
                                                                    <a id="course-code-{{ $course->id }}"
                                                                        href="{{ route('faculties') }}?course={{ $course->course_code }}">
                                                                        {{ $course->course_code }}
                                                                </h2></a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td id="course-title-{{ $course->id }}"
                                                        class="px-3 py-2 text-sm font-medium text-base-content/70 uppercase">
                                                        {{ $course->course_title }}
                                                    </td>
                                                    <td id="course-credit-{{ $course->id }}"
                                                        class="px-10 py-2 text-sm text-base-content/50">
                                                        {{ $course->course_credit }}
                                                    </td>
                                                    <td class="px-4 py-2 text-sm">
                                                        <div class="flex items-center gap-x-6">
                                                            <label for="edit-course-{{ $course->id }}"
                                                                data-course-id="{{ $course->id }}" id="edit-course"
                                                                class="pb-1.5 text-base-content/50 transition-colors duration-200 cursor-pointer hover:text-warning focus:outline-none">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor"
                                                                    class="w-5 h-5" id="times-circle">
                                                                    <path fill="currentColor"
                                                                        d="M21,12a1,1,0,0,0-1,1v6a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V5A1,1,0,0,1,5,4h6a1,1,0,0,0,0-2H5A3,3,0,0,0,2,5V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V13A1,1,0,0,0,21,12ZM6,12.76V17a1,1,0,0,0,1,1h4.24a1,1,0,0,0,.71-.29l6.92-6.93h0L21.71,8a1,1,0,0,0,0-1.42L17.47,2.29a1,1,0,0,0-1.42,0L13.23,5.12h0L6.29,12.05A1,1,0,0,0,6,12.76ZM16.76,4.41l2.83,2.83L18.17,8.66,15.34,5.83ZM8,13.17l5.93-5.93,2.83,2.83L10.83,16H8Z">
                                                                    </path>
                                                                </svg>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="py-12 bg-base-100 sm:py-16">
                <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
                    <div class="flex items-center justify-center space-x-2">
                        @if ($page != 1)
                            <a href="?{{ $query }}page={{ $page - 1 }}"
                                class="inline-flex items-center justify-center text-base-content transition-all duration-200 bg-base-100 border border-neutral-content rounded-md w-9 h-9 hover:bg-base-300">
                                <span class="sr-only">Previous</span>
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </a>
                        @endif

                        @foreach (range(1, $page_count) as $pages)
                            @if ($page == $pages)
                                <a href="?{{ $query }}page={{ $pages }}"
                                    class="inline-flex items-center justify-center text-base font-semibold ik transition-all duration-200 mh border gh rounded-md sm:text-sm w-9 h-9">
                                    {{ $pages }}
                                </a>
                            @else
                                <a href="?{{ $query }}page={{ $pages }}"
                                    class="inline-flex items-center justify-center text-base font-semibold text-base-content transition-all duration-200 bg-base-100 border border-neutral-content rounded-md sm:text-sm w-9 h-9 hover:bg-base-300">
                                    {{ $pages }}
                                </a>
                            @endif
                        @endforeach

                        @if ($page_count != $page)
                            <a href="?{{ $query }}page={{ $page + 1 }}"
                                class="inline-flex items-center justify-center text-base-content transition-all duration-200 bg-base-100 border border-neutral-content rounded-md w-9 h-9 hover:bg-base-300">
                                <span class="sr-only">Next</span>
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        @endif

                        {{-- if page is more than 1 then show last page button but dont show if you are already on last page --}}

                        @if ($page_count > 1 && $page != $page_count)
                            <a href="?{{ $query }}page={{ $page_count }}"
                                class="inline-flex items-center justify-center text-base-content transition-all duration-200 bg-base-100 border border-neutral-content rounded-md w-9 h-9 hover:bg-base-300">
                                <span class="sr-only">Last</span>
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    <input type="checkbox" id="addCourses" class="modal-toggle" />
    <label for="addCourses" class="modal cursor-pointer">
        <label class="modal-box px-4 sm:px-6 lg:px-8 max-w-4xl" for="">
            <div class="lg:px-8 sm:px-6 px-4 max-w-7xl ">
                <div class="bg-base-100 rounded-xl overflow-hidden max-w-6xl">
                    <div class="px-3 pt-4 sm:pt-2">
                        <h3 class="text-2xl font-semibold text-center text-base-content">
                            Add Courses
                        </h3>

                        <form action="{{ route('addCourse') }}" method="POST" class="mt-10">
                            @csrf
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4">
                                <div class="lg:col-span-2 2xl:col-span-1">
                                    <label for="" class="text-base font-medium text-base-content">
                                        Course Code
                                    </label>
                                    <div class="mt-2.5 relative">
                                        <input name="course_code" id="course_code" required
                                            class="block w-full px-4 py-4 text-base-content placeholder-base-content/40 transition-all duration-200 bg-base-100 border border-base-300 rounded-md focus:outline-none focus:border-primary caret-primary">
                                        </input>
                                    </div>
                                </div>

                                <div class="lg:col-span-2 2xl:col-span-1">
                                    <label for="" class="text-base font-medium text-base-content">
                                        Course Credit
                                    </label>
                                    <div class="mt-2.5 relative">
                                        <input name="course_credit" id="course_credit" required type="number"
                                            min="1"
                                            class="block w-full px-4 py-4 text-base-content placeholder-base-content/40 transition-all duration-200 bg-base-100 border border-base-300 rounded-md focus:outline-none focus:border-primary caret-primary">
                                        </select>
                                    </div>
                                </div>


                                <div class="sm:col-span-2">
                                    <label for="" class="text-base font-medium text-base-content">
                                        Course Title
                                    </label>
                                    <div class="mt-2.5 relative">
                                        <input name="course_title" id="course_title" required
                                            class="block w-full px-4 py-4 text-base-content placeholder-base-content/40 transition-all duration-200 bg-base-100 border border-base-300 rounded-md focus:outline-none focus:border-primary caret-primary">
                                        </input>
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <button type="submit"
                                        class="inline-flex items-center justify-center w-full px-4 py-4 mt-2 text-base font-semibold text-base-100 transition-all duration-200 bg-primary border border-transparent rounded-md focus:outline-none hover:bg-primary focus:bg-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- </section> --}}
        </label>
    </label>

    {{-- modal to edit course --}}
    <script>
        const editCourse = document.querySelectorAll('#edit-course');
        editCourse.forEach((course) => {
            course.addEventListener('click', () => {
                const courseId = course.getAttribute('data-course-id');
                const modal = createModal(courseId);
                document.body.appendChild(modal);
            });
        });

        function createModal(courseId) {
            const modal = document.createElement('div');
            const courseCode = document.querySelector(`#course-code-${courseId}`).innerText;
            const courseTitle = document.querySelector(`#course-title-${courseId}`).innerText;
            const courseCredit = document.querySelector(`#course-credit-${courseId}`).innerText;
            modal.innerHTML = `<input type="checkbox" id="edit-course-${courseId}" class="modal-toggle" />
    <label for="edit-course-${courseId}" class="modal cursor-pointer">
        <label class="modal-box px-4 sm:px-6 lg:px-8 max-w-4xl" for="">
            <div class="lg:px-8 sm:px-6 px-4 max-w-7xl ">
                <div class="bg-base-100 rounded-xl overflow-hidden max-w-6xl">
                    <div class="px-3 pt-4 sm:pt-2">
                        <h3 class="text-2xl font-semibold text-center text-base-content">
                            Edit Course
                        </h3>
                        <form action="{{ route('allCourses') }}/edit/${courseId}" method="POST" class="mt-10">
                            @csrf
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4">
                                <div class="lg:col-span-2 2xl:col-span-1">
                                    <label for="" class="text-base font-medium text-base-content">
                                        Course Code
                                    </label>
                                    <div class="mt-2.5 relative">
                                        <input name="course_code" id="course_code" required value="${courseCode}"
                                            class="block w-full px-4 py-4 text-base-content placeholder-base-content/40 transition-all duration-200 bg-base-100 border border-base-300 rounded-md focus:outline-none focus:border-primary caret-primary">
                                        </input>
                                    </div>
                                </div>

                                <div class="lg:col-span-2 2xl:col-span-1">
                                    <label for="" class="text-base font-medium text-base-content">
                                        Course Credit
                                    </label>
                                    <div class="mt-2.5 relative">
                                        <input name="course_credit" id="course_credit" required type="number" value="${courseCredit}"
                                            min="1"
                                            class="block w-full px-4 py-4 text-base-content placeholder-base-content/40 transition-all duration-200 bg-base-100 border border-base-300 rounded-md focus:outline-none focus:border-primary caret-primary">
                                        </select>
                                    </div>
                                </div>


                                <div class="sm:col-span-2">
                                    <label for="" class="text-base font-medium text-base-content">
                                        Course Title
                                    </label>
                                    <div class="mt-2.5 relative">
                                        <input name="course_title" id="course_title" required value="${courseTitle}"
                                            class="block w-full px-4 py-4 text-base-content placeholder-base-content/40 transition-all duration-200 bg-base-100 border border-base-300 rounded-md focus:outline-none focus:border-primary caret-primary">
                                        </input>
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <button type="submit"
                                        class="inline-flex items-center justify-center w-full px-4 py-4 mt-2 text-base font-semibold text-base-100 transition-all duration-200 bg-primary border border-transparent rounded-md focus:outline-none hover:bg-primary focus:bg-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </label>
    </label>`;
            modal.addEventListener('click', (e) => {
                if (e.target.hasAttribute('data-close-modal')) {
                    modal.remove();
                }
            });
            return modal;
        }
    </script>


</x-dashboard>
