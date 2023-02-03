@extends('layout')

@section('content')

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
                    placeholder="Ex. Specialist, Name, Doctor..."
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
                @if ($loop->iteration > 8)
                    @break
                @endif
              <div class="strip_list wow fadeIn">
                {{-- <a href="/profile/{{$faculty->id}}" class="wish_bt"></a> --}}
                <figure>
                  <a href="/profile/{{$faculty->id}}">
                    <img src="http://via.placeholder.com/565x565.jpg" alt="" />
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
                  <li><a href="detail-page.html">Book now</a></li>
                </ul>
              </div>
            @endforeach
              <!-- /strip_list -->

              <nav aria-label="" class="add_top_20">
                <ul class="pagination pagination-sm">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                  </li>
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
