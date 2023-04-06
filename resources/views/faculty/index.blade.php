<x-layout>
    {{-- get total page from pagination --}}
    @php
        $page = request('page');
        if (!$page) {
            $page = 1;
        }
        $page_count = $listings->lastPage();
        $per_page = $listings->perPage();
        $total = $listings->total();
        $query = request()->query();
        $query = http_build_query($query);
        // check if query contains page
        if (strpos($query, 'page') !== false) {
            $query = preg_replace('/&page=\d+/', '', $query);
        }
        if ($query) {
            $query = $query . '&';
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
    </section>
    <!--end section-->
</x-layout>
