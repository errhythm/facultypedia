@extends('layout')

@section('content')



{{-- if there is no lisintgs found redirect to 404 page --}}
@if (count($listings) == 0)
    <script>window.location = "/404";</script>
@endif

        <div id="results">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <h4>
                  All faculties
                </h4>
              </div>
              <div class="col-md-6">
                <div class="search_bar_list">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Ex. Initial, Department, Name..."
                  />
                  <input type="submit" value="Search" />
                </div>
              </div>
            </div>
            <!-- /row -->
          </div>
          <!-- /container -->
        </div>
        <!-- /results -->

        <div class="container margin_60_35">
          <div class="row">
            <div class="col-lg-12">


            @foreach ($listings as $faculty)

              <div class="strip_list wow fadeIn">
                {{-- <a href="/profile/{{$faculty->id}}" class="wish_bt"></a> --}}
                <figure>
                  <a href="/profile/{{$faculty->id}}">
                    <img src="https://api.dicebear.com/5.x/bottts-neutral/svg?seed={{md5($faculty->id.$faculty->created_at)}}&rotate=20&scale=110" alt="" />
                  </a>
                </figure>
                <small>{{$faculty->university_id}}</small>
                <a href="/profile/{{$faculty->id}}"><h3>{{$faculty->name}}</h3></a>
                <p>
                  <b>Email:</b> {{$faculty->email}} <br />
                  <b>Created at:</b> {{$faculty->created_at}}
                </p>
                <span class="rating">
                  <i class="icon_star voted"></i>
                  <i class="icon_star voted"></i>
                  <i class="icon_star voted"></i>
                  <i class="icon_star"></i>
                  <i class="icon_star"></i>
                  <small>(145)</small>
                </span>
                <ul>
                  <li>
                    {{-- write department --}}
                    <a href="#0" class="btn_listing">View Profile</a>
                  </li>
                  <li>
                    <b>{{$faculty->department}}</b>
                  </li>
                  <li><a href="detail-page.html">Book Consultation</a></li>
                </ul>
              </div>
            @endforeach
              <!-- /strip_list -->

              <nav aria-label="" class="add_top_20">
                <ul class="pagination pagination-sm">
                    {{-- if it is not first page, show previous button --}}

                    @if ($page != 1)
                        <li class="page-item">
                            <a class="page-link" href="{{$page-1}}">Previous</a>
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
