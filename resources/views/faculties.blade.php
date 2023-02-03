@extends('layout')

@section('content')
    @if (count($listings) == 0)
        <script>
            window.location = "/404";
        </script>
    @endif

    @include('partials._search', ['heading' => 'All Faculties'])

    <div class="container margin_60_35">
        <div class="row">
            <div class="col-lg-12">
                @foreach ($listings as $faculty)
                    <x-facultyCard :faculty="$faculty" :facultyCourses="$facultyCourses" />
                @endforeach
                <!-- /strip_list -->

                <nav aria-label="" class="add_top_20">
                    <ul class="pagination pagination-sm">
                        @if ($page != 1)
                            <li class="page-item">
                                <a class="page-link" href="/faculties/{{ $page - 1 }}">Previous</a>
                            </li>
                        @endif
                        @foreach (range(1, $page_count) as $pages)
                            @if ($page == $pages)
                                <li class="page-item active">
                                    <a class="page-link" href="/faculties/{{ $pages }}">{{ $pages }}</a>
                                </li>
                            @else
                                <li class="page-item"><a class="page-link"
                                        href="/faculties/{{ $pages }}">{{ $pages }}</a></li>
                            @endif
                        @endforeach
                        @if ($page_count != $page)
                            <li class="page-item">
                                <a class="page-link" href="/faculties/{{ $page + 1 }}">Next</a>
                            </li>
                        @endif
                    </ul>
                    <p class="text-center">Showing {{ $page * 8 - 7 }} to {{ min($page * 8, $total) }} of
                        {{ $total }}
                        results</p>
                </nav>
                <!-- /pagination -->
            </div>
            <!-- /col -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
@endsection
