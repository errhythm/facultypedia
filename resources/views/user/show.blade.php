@php
    $facultyCourses = \App\Models\Faculties::where('id', $user->id)->get();
    $courses = \App\Models\Courses::all();
    $faculty = \App\Models\Faculties::where('id', $user->id)->first();
    $page = request('page');
    if (!$page) {
        $page = 1;
    }
@endphp

<x-layout :header=true :footer=true>
    {{-- check for any session variable message --}}
    @if (session('message'))
        {{-- check if alert type mentioned as well if not, default is success --}}
        @if (session('alert-type'))
            {{-- the alert must be dismissable --}}
            <div class="alert alert-{{ session('alert-type') }} alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    @endif
    <div class="flex flex-wrap justify-center">
        <div class="w-5/6 xl:w-4/6 py-4">
            <section class="lg:pt-6">
                <div class="lg:px-8 sm:px-6 px-4 max-w-7xl mx-auto">
                    <div class="md:mt-12 shadow-xl bg-base-100 rounded-xl overflow-hidden max-w-6xl mt-8 mx-auto">
                        <div class="p-6">
                            <div class="flex">
                                <div class="self-center">
                                    <img class="object-cover h-auto mx-auto rounded-xl w-52 sm:mx-0"
                                        src="https://api.dicebear.com/5.x/bottts-neutral/svg?seed={{ md5($user->id . $user->created_at) }}&scale=110"
                                        alt="{{ $user->name }}" />
                                    <div class="mt-5"></div>
                                </div>
                                <div class="mt-6 sm:ml-8 sm:mt-0">
                                    <p class="text-sm font-medium text-base-content">{{ $user->university_id }}</p>
                                    <p class="text-2xl font-bold text-base-content">
                                        {{ $user->name }}
                                    </p>
                                    @if ($user->role == 'faculty')
                                        <x-average-stars :faculty="$faculty" />
                                        <x-faculty-courses :facultyCourses="$facultyCourses" :courses="$courses" />
                                    @endif
                                    <p class="mt-2 text-xs font-bold uppercase tracking-wide text-base-content/70">
                                        Email:
                                    </p>
                                    <p class="mt-1 text-xs font-medium uppercase tracking-wide text-base-content/70">
                                        {{ $user->email }}
                                    </p>

                                    <p class="mt-2 text-xs font-bold uppercase tracking-wide text-base-content/70">
                                        Department:
                                    </p>
                                    <p class="mt-1 text-xs font-medium uppercase tracking-wide text-base-content/70">
                                        {{ $user->department }}
                                    </p>
                                </div>
                                <div class="ml-auto mr-4">
                                    <button type="button"
                                        class="inline-flex items-center p-2 -m-2 text-base-content transition-all duration-200 lg:ml-6 hover:text-info-content"></button>
                                    <a href="#_"
                                        class="box-border relative z-30 inline-flex items-center justify-center w-auto px-3 py-2 overflow-hidden font-bold text-base-100 transition-all duration-300 bg-primary rounded-md cursor-pointer group ring-offset-2 ring-1 ring-primary/30 ring-offset-primary/20 hover:ring-offset-primary/50 ease focus:outline-none">
                                        <span
                                            class="absolute bottom-0 right-0 w-8 h-20 -mb-8 -mr-5 transition-all duration-300 ease-out transform rotate-45 translate-x-1 bg-base-100 opacity-10 group-hover:translate-x-0"></span>
                                        <span
                                            class="absolute top-0 left-0 w-20 h-8 -mt-1 -ml-12 transition-all duration-300 ease-out transform -rotate-45 -translate-x-1 bg-base-100 opacity-10 group-hover:translate-x-0"></span>
                                        <span class="relative z-20 flex items-center text-sm">
                                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                stroke-width="1.5" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z">
                                                </path>
                                            </svg>
                                            <span class="ml-2 hidden md:block">Consult</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end of main content -->
            <!-- start of review content -->
            <section class="pb-6">
                <div class="lg:px-8 sm:px-6 px-4 max-w-7xl mx-auto">
                    <div
                        class="px-3 sm:px-6 py-12 md:mt-12 shadow-xl bg-base-100 rounded-xl overflow-hidden max-w-6xl mt-8 mx-auto">
                        <div class="max-w-3xl mx-auto">
                            @if ($user->role == 'faculty')
                                <x-review-summary :faculty="$faculty" />
                            @endif
                            <hr class="mt-10 border-base-300" />
                            <div class="flow-root mt-10">
                                {{-- Review Box --}}
                                @php
                                    if ($user->role == 'faculty') {
                                        $reviews = \App\Models\Reviews::where('faculty_id', $faculty->id)
                                            ->where('isApproved', 1)
                                            ->orderBy('created_at', 'desc')
                                            ->paginate(5);
                                    } elseif ($user->role == 'student') {
                                        $reviews = \App\Models\Reviews::where('user_id', $user->id)
                                            ->where('isApproved', 1)
                                            ->where('isAnonymous', 0)
                                            ->orderBy('created_at', 'desc')
                                            ->paginate(5);
                                    }
                                @endphp
                                @if ($user->role == 'faculty')
                                    @if ($reviews->count() == 0)
                                        <div class="alert alert-info" role="alert">
                                            No reviews yet! Be the first to review.
                                        </div>
                                    @else
                                        <ul class="divide-y divide-base-300 -my-9 gap-x-16">
                                            @foreach ($reviews as $review)
                                                <x-review-box :review="$review" :role="$user->role" />
                                            @endforeach
                                        </ul>
                                    @endif
                                @elseif ($user->role == 'student')
                                    @if ($reviews->count() == 0)
                                        <div class="alert alert-info" role="alert">
                                            No reviews yet! Be the first to review.
                                        </div>
                                    @else
                                        <ul class="divide-y divide-base-300 -my-9 gap-x-16">
                                            @foreach ($reviews as $review)
                                                <x-review-box :review="$review" :role="$user->role" />
                                            @endforeach
                                        </ul>
                                    @endif
                                @endif
                                <!-- End review-box -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end of review content -->
        </div>
        {{-- if the user role is faculty --}}
        @if ($user->role == 'faculty')
            <div class="w-5/6 xl:w-2/6 py-4">
                <!-- Start of Give Review -->
                <section class="lg:pt-6">
                    <div class="lg:px-8 sm:px-6 px-4 max-w-7xl mx-auto">
                        <div
                            class="px-3 sm:px-6 py-12 md:mt-12 shadow-xl bg-base-100 rounded-xl overflow-hidden max-w-6xl mt-8 mx-auto">
                            <div class="px-3 pt-4 sm:pt-2">
                                <h3 class="text-2xl font-semibold text-center text-base-content">
                                    Drop a Review
                                </h3>

                                <form action="/" method="GET" class="mt-10">
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4">
                                        <div class="lg:col-span-2 2xl:col-span-1">
                                            <label for="" class="text-base font-medium text-base-content">
                                                Course Name
                                            </label>
                                            <div class="mt-2.5 relative">
                                                <!-- course dropdown 1,23,34 -->
                                                <select name="course" id="course"
                                                    class="block w-full px-4 py-4 text-base-content placeholder-base-content/40 transition-all duration-200 bg-base-100 border border-base-300 rounded-md focus:outline-none focus:border-primary caret-primary">
                                                    {{-- get the courses of faculty --}}
                                                    <option value="0" selected disabled>Select a course</option>
                                                    @foreach ($facultyCourses as $facultycourse)
                                                        @php
                                                            $xcourses = explode(',', $facultycourse->courses);
                                                        @endphp
                                                        @foreach ($xcourses as $facultycoursex)
                                                            @foreach ($courses as $course)
                                                                @if ($course->id == $facultycoursex)
                                                                    <option value="{{ $course->id }}">
                                                                        {{ $course->course_code }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="lg:col-span-2 2xl:col-span-1">
                                            <label for="" class="text-base font-medium text-base-content">
                                                Rating
                                            </label>
                                            <div class="mt-2.5 relative">
                                                <!-- half star rating radio input  -->

                                                <div class="rating rating-lg">
                                                    <input type="radio" name="rating" value="0"
                                                        class="bg-warning mask mask-star-2" checked disabled hidden/>
                                                    <input type="radio" name="rating" value="1"
                                                        class="bg-warning mask mask-star-2" />
                                                    <input type="radio" name="rating" value="2"
                                                        class="bg-warning mask mask-star-2" />
                                                    <input type="radio" name="rating" value="3"
                                                        class="bg-warning mask mask-star-2" />
                                                    <input type="radio" name="rating" value="4"
                                                        class="bg-warning mask mask-star-2" />
                                                    <input type="radio" name="rating" value="5"
                                                        class="bg-warning mask mask-star-2" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label for="" class="text-base font-medium text-base-content">
                                                Review
                                            </label>
                                            <div class="mt-2.5 relative">
                                                <textarea name="review" id="review" placeholder=""
                                                    class="block w-full px-4 py-4 text-base-content placeholder-base-content/40 transition-all duration-200 bg-base-100 border border-base-300 rounded-md resize-y focus:outline-none focus:border-primary caret-primary"
                                                    rows="4"></textarea>
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
                </section>
                <!-- End of Give Review -->
            </div>
        @endif
    </div>
</x-layout>
