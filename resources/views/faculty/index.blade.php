<x-layout :header=true :footer=true>
    {{-- get total page from pagination --}}
    @php
        $page = request('page');
        if (!$page) {
            $page = 1;
        }
        $page_count = $listings->lastPage();
        $per_page = $listings->perPage();
        $total = $listings->total();

        // create a query array for pagination dont add course, search if they are not in request
        $query = '';
        if (request('course')) {
            $query = http_build_query([
                'course' => request('course'),
            ]);
        }
        if (request('search')) {
            $query = http_build_query([
                'search' => request('search'),
            ]);
        }
        if (request('course') && request('search')) {
            $query = http_build_query([
                'course' => request('course'),
                'search' => request('search'),
            ]);
        }



        $heading = 'All Faculties';

        if (request('course')) {
            $heading = 'Faculties for ' . request('course');
        }
    @endphp
    @include('partials._search', [
        'heading' =>
            'Showing ' .
            max($page * $per_page - $per_page + 1, 1) .
            ' to ' .
            min($page * $per_page, $total) .
            ' of ' .
            $total .
            ' results.',
    ])
    <!-- /container -->


    <!-- Start Section-->
    <section class="md:pb-24 pb-16 pt-8 md:pt-12 bg-base-100 max-w-screen-2xl px-4 mx-auto lg:px-12 w-full">
        <div class="container">

            @if ($total == 0)
                <div class="alert alert-danger" role="alert">
                    @if (request('course'))
                        No results found for {{ request('course') }}
                    @else
                        No results found for {{ request('search') }}
                    @endif
                </div>
            @endif
            <div class="grid xl:grid-cols-5 lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-[30px]">

                @foreach ($listings as $faculty)
                    <x-facultyCard :faculty="$faculty" :facultyCourses="$facultyCourses" />
                @endforeach
            </div>
            <!--end grid-->
        </div>
        <!--end container-->
        <div class="grid md:grid-cols-12 grid-cols-1 mt-8">
            <div class="md:col-span-12 text-center">
                <div class="btn-group">
                    @if ($page != 1)
                        <button class="btn btn-md"><a href="/faculties/?{{ $query }}page={{ $page - 1 }}">
                                «
                            </a></button>
                    @endif
                    @foreach (range(1, $page_count) as $pages)
                        @if ($page == $pages)
                            <button class="btn btn-md"><a
                                    href="/faculties/?{{ $query }}page={{ $pages }}">{{ $pages }}</a></button>
                        @else
                            <button class="btn btn-md"><a
                                    href="/faculties/?{{ $query }}page={{ $pages }}">{{ $pages }}</a></button>
                        @endif
                    @endforeach
                    @if ($page_count != $page)
                        <button class="btn btn-md"><a
                                href="/faculties/?{{ $query }}page={{ $page + 1 }}">»</a></button>
                    @endif
                </div>
            </div>
        </div>

        <div class="py-12 bg-base-100 sm:py-16">
            <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
                <div class="flex items-center justify-center space-x-2">

                    @php
                    // break the query string into array
                    $query = explode('&', $query);
                    // remove page from query string
                    $query = array_filter($query, function ($item) {
                    return !str_contains($item, 'page');
                    });
                    // convert array to string
                    $query = implode('&', $query);
                    // add & to the end of the string if it is not empty
                    if ($query) {
                    $query = $query . '&';
                    }

                    @endphp

                    @if ($page != 1)
                    <a href="/faculties/?{{$query }}page={{ $page - 1 }}"
                        class="inline-flex items-center justify-center text-base-content transition-all duration-200 bg-base-100 border border-neutral-content rounded-md w-9 h-9 hover:bg-base-300">
                        <span class="sr-only">Previous</span>
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </a>
                    @endif


                    @foreach (range(1, $page_count) as $pages)
                        @if ($page == $pages)

                    <a href="/faculties/?{{ $query }}page={{ $pages }}"
                        class="inline-flex items-center justify-center text-base font-semibold ik transition-all duration-200 mh border gh rounded-md sm:text-sm w-9 h-9">
                        {{ $pages }}
                    </a>
                    @else

                    <a href="/faculties/?{{ $query }}page={{ $pages }}"
                        class="inline-flex items-center justify-center text-base font-semibold text-base-content transition-all duration-200 bg-base-100 border border-neutral-content rounded-md sm:text-sm w-9 h-9 hover:bg-base-300">
                        {{ $pages }}
                    </a>
                        @endif
                    @endforeach

                    @if ($page_count != $page)
                    <a href="/faculties/?{{ $query }}page={{ $page + 1 }}"
                        class="inline-flex items-center justify-center text-base-content transition-all duration-200 bg-base-100 border border-neutral-content rounded-md w-9 h-9 hover:bg-base-300">
                        <span class="sr-only">Next</span>
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>

                    @endif

                    {{-- if page is more than 1 then show last page button but dont show if you are already on last page --}}

                    @if ($page_count > 1 && $page != $page_count)
                    <a href="/faculties/?{{ $query }}page={{ $page_count }}"
                        class="inline-flex items-center justify-center text-base-content transition-all duration-200 bg-base-100 border border-neutral-content rounded-md w-9 h-9 hover:bg-base-300">
                        <span class="sr-only">Last</span>
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--end section-->
</x-layout>
