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
    @include('partials._search', ['heading' => $heading])


    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-12">
                {{-- check if no result found --}}
                @if ($total == 0)
                    <div class="alert alert-danger" role="alert">
                        @if (request('course'))
                            No results found for {{ request('course') }}
                        @else
                            No results found for {{ request('search') }}
                        @endif
                    </div>
                @endif
                @foreach ($listings as $faculty)
                    <x-facultyCard :faculty="$faculty" :facultyCourses="$facultyCourses" />
                @endforeach
                <!-- /strip_list -->
                <nav aria-label="" class="add_top_20">
                    <ul class="pagination pagination-sm">
                        @if ($page != 1)
                            <li class="page-item">
                                <a class="page-link"
                                    href="/faculties/?{{ $query }}page={{ $page - 1 }}">Previous</a>
                            </li>
                        @endif
                        @foreach (range(1, $page_count) as $pages)
                            @if ($page == $pages)
                                <li class="page-item active">
                                    <a class="page-link"
                                        href="/faculties/?{{ $query }}page={{ $pages }}">{{ $pages }}</a>
                                </li>
                            @else
                                <li class="page-item"><a class="page-link"
                                        href="/faculties/?{{ $query }}page={{ $pages }}">{{ $pages }}</a>
                                </li>
                            @endif
                        @endforeach
                        @if ($page_count != $page)
                            <li class="page-item">
                                <a class="page-link"
                                    href="/faculties/?{{ $query }}page={{ $page + 1 }}">Next</a>
                            </li>
                        @endif
                    </ul>
                    {{-- if search result is 0 --}}
                    @if ($total == 0)
                        <p class="text-center">No Results Found</p>
                        @else

                    <p class="text-center">Showing {{ max($page * $per_page - $per_page + 1, 1) }} to
                        {{ min($page * $per_page, $total) }} of
                        {{ $total }}
                        results
                    </p>
                    @endif

                </nav>
                <!-- /pagination -->
            </div>
            <!-- /col -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</x-layout>
