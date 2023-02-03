@extends('layout')

@section('content')

@if (count($listings) == 0)
    <script>window.location = "/404";</script>
@endif

@include('partials._search', ['heading' => 'All Faculties'])

        <div class="container margin_60_35">
          <div class="row">
            <div class="col-lg-12">


            @foreach ($listings as $faculty)
                @include('partials._facultyCard')
            @endforeach
              <!-- /strip_list -->

              <nav aria-label="" class="add_top_20">
                <ul class="pagination pagination-sm">
                    {{-- if it is not first page, show previous button --}}

                    @if ($page != 1)
                        <li class="page-item">
                            <a class="page-link" href="/faculties/{{$page-1}}">Previous</a>
                        </li>
                    @endif
                  @foreach (range(1,$page_count) as $pages)
                    @if ($page == $pages)
                        <li class="page-item active">
                            <a class="page-link" href="{{$pages}}">{{$pages}}</a>
                        </li>
                    @else
                    <li class="page-item"><a class="page-link" href="{{$pages}}">{{$pages}}</a></li>
                    @endif
                    {{-- if it is not last page, show next button --}}
                  @endforeach
                    @if ($page_count != $page)
                        <li class="page-item">
                            <a class="page-link" href="{{$pages+1}}">Next</a>
                        </li>
                    @endif
                </ul>
              </nav>
              <!-- /pagination -->
            </div>
            <!-- /col -->
          </div>
          <!-- /row -->
        </div>
        <!-- /container -->

@endsection
