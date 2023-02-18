@php
    $facultyCourses = \App\Models\Faculties::where('id', $user->id)->get();
    $courses = \App\Models\Courses::all();
    $faculty = \App\Models\Faculties::where('id', $user->id)->first();
    $page = request('page');
    if (!$page) {
        $page = 1;
    }
@endphp

<x-layout>
    <div id="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="/">Home</a></li>
                @if ($user->role == 'faculty')
                    <li><a href="/faculties">Faculties</a></li>
                @endif
                <li>{{ $user->name }}</li>
            </ul>
        </div>
    </div>
    <!-- /breadcrumb -->

    <div class="container margin_60">
        <div class="row">
            <div class="col-xl-8 col-lg-8">
                <nav id="secondary_nav">
                    <div class="container">
                        <ul class="clearfix">
                            <li><a href="#profile" class="active">General info</a></li>
                            <li><a href="#reviews">Reviews</a></li>
                            <li><a href="#sidebar">Booking</a></li>
                        </ul>
                    </div>
                </nav>
                <div id="profile">
                    <div class="box_general_3">
                        <div class="profile">
                            <div class="row">
                                <div class="col-lg-5 col-md-4">
                                    <figure>
                                        <img src="https://api.dicebear.com/5.x/bottts-neutral/svg?seed={{ md5($user->id . $user->created_at) }}&scale=110"
                                            alt="{{ $user->name }}" class="img-fluid">
                                    </figure>
                                </div>
                                <div class="col-lg-7 col-md-8">
                                    <small>{{ $user->university_id }}</small>
                                    <h1>{{ $user->name }}</h1>
                                    {{-- if user role is faculty then show a div --}}
                                    @if ($user->role == 'faculty')
                                        <x-average-stars :faculty="$faculty" />
                                        <br>
                                        <x-faculty-courses :facultyCourses="$facultyCourses" :courses="$courses" />
                                    @endif
                                    <ul class="contacts">
                                        <li>
                                            <h6>Email</h6>
                                            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                        </li>
                                        <li>
                                            <h6>Department</h6> {{ $user->department }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /profile -->
                    </div>
                    <!-- /section_1 -->
                </div>
                <!-- /box_general -->

                <div id="reviews">
                    <div class="box_general_3">
                        <div class="reviews-container">
                            @if ($user->role == 'faculty')
                                {{-- Review Summary --}}
                                <x-review-summary :faculty="$faculty" />
                            <hr>
                            @endif
                            <!-- /row -->
                            {{-- Review Box --}}
                            @php
                                if ($user->role == 'faculty') {
                                    $reviews = \App\Models\Reviews::where('faculty_id', $faculty->id)
                                        ->where('isApproved', 1)
                                        ->orderBy('created_at', 'desc')
                                        ->paginate(5);
                                    }
                                    elseif ($user->role == 'student') {
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
                                    @foreach ($reviews as $review)
                                        <x-review-box :review="$review" />
                                    @endforeach
                                @endif
                            @elseif ($user->role == 'student')
                                    @if ($reviews->count() == 0)
                                        <div class="alert alert-info" role="alert">
                                            No reviews yet! Be the first to review.
                                        </div>
                                    @else
                                        @foreach ($reviews as $review)
                                            <x-review-box :review="$review" />
                                        @endforeach
                                    @endif
                            @endif
                            <!-- End review-box -->
                        </div>
                        @php
                            if ($user->role == 'faculty') {
                                $totalreviews = \App\Models\Reviews::where('faculty_id', $faculty->id)->where('isApproved', 1)->count();
                            }
                        @endphp
                        @if ($user->role == 'faculty')
                            @if ($totalreviews > 5)
                            <div class="d-flex justify-content-center">
                                @php
                                    $page = request('page');
                                        if (!$page) {
                                            $page = 1;
                                        }
                                $page_count = $reviews->lastPage();
                                $per_page = $reviews->perPage();
                                $total = $reviews->total();
                                $query = request()->query();
                                $query = http_build_query($query);
                                // check if query contains page
                                if (strpos($query, 'page') !== false) {
                                    $query = preg_replace('/page=\d+/', '', $query);
                                }
                                if ($query) {
                                    $query = $query . '&';
                                }
                                @endphp
                                <nav aria-label="" class="add_top_20">
                                    <ul class="pagination pagination-sm">
                                        @if ($page != 1)
                                            <li class="page-item">
                                                <a class="page-link"
                                                    href="?{{ $query }}page={{ $page - 1 }}">Previous</a>
                                            </li>
                                        @endif
                                        @foreach (range(1, $page_count) as $pages)
                                            @if ($page == $pages)
                                                <li class="page-item active">
                                                    <a class="page-link"
                                                        href="?{{ $query }}page={{ $pages }}">{{ $pages }}</a>
                                                </li>
                                            @else
                                                <li class="page-item"><a class="page-link"
                                                        href="?{{ $query }}page={{ $pages }}">{{ $pages }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                        @if ($page_count != $page)
                                            <li class="page-item">
                                                <a class="page-link"
                                                    href="?{{ $query }}page={{ $page + 1 }}">Next</a>
                                            </li>
                                        @endif
                                    </ul>
                                    {{-- if search result is 0 --}}
                                    @if ($total != 0)
                                    <p class="text-center">Showing {{ max($page * $per_page - $per_page + 1, 1) }} to
                                        {{ min($page * $per_page, $total) }} of
                                        {{ $total }}
                                        reviews
                                    </p>
                                    @endif
                                </nav>
                            </div>
                            @endif
                        @endif
                        <!-- End review-container -->
                    </div>
                    {{-- if the user is logged in and a student role --}}

                    @if ($user->role == 'faculty')
                        @if (Auth::check() && Auth::user()->role == 'student')
                        <div class="box_general_3 write_review">
                            <h1>Write a review for {{ $user->name }}</h1>
                            <div class="rating_submit">
                                <div class="form-group">
                                <label class="d-block">Overall rating</label>
                                <span class="rating">
                                    <input type="radio" class="rating-input" id="5_star" name="rating-input" value="5 Stars"><label for="5_star" class="rating-star"></label>
                                    <input type="radio" class="rating-input" id="4_star" name="rating-input" value="4 Stars"><label for="4_star" class="rating-star"></label>
                                    <input type="radio" class="rating-input" id="3_star" name="rating-input" value="3 Stars"><label for="3_star" class="rating-star"></label>
                                    <input type="radio" class="rating-input" id="2_star" name="rating-input" value="2 Stars"><label for="2_star" class="rating-star"></label>
                                    <input type="radio" class="rating-input" id="1_star" name="rating-input" value="1 Star"><label for="1_star" class="rating-star"></label>
                                </span>
                                </div>
                            </div
                            <div class="form-group">
                                <label>Your review</label>
                                <textarea class="form-control" style="height: 180px;" placeholder="Write your review here ..."></textarea>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="checkboxes add_bottom_30 add_top_15">
                                    <label class="container_check">I accept <a href="#0">terms and conditions and general policy</a>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <a href="#0" class="btn_1">Submit review</a>
                        @endif
                    @endif
                </div>
                <!-- /section_2 -->
            </div>
            <!-- /col -->

            @if ($user->role == 'faculty')
            <aside class="col-xl-4 col-lg-4" id="sidebar">
                <div class="box_general_3 booking">
                    <form>
                        <div class="title">
                            <h3>Book a Visit</h3>
                            <small>Monday to Friday 09.00am-06.00pm</small>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" id="booking_date" data-lang="en"
                                        data-min-year="2020" data-max-year="2024"
                                        data-disabled-days="10/17/2017,11/18/2017">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" id="booking_time" value="9:00 am">
                                </div>
                            </div>
                        </div>
                        <!-- /row -->
                        <ul class="treatments clearfix">
                            <li>
                                <div class="checkbox">
                                    <input type="checkbox" class="css-checkbox" id="visit1" name="visit1">
                                    <label for="visit1" class="css-label">Back Pain visit
                                        <strong>$55</strong></label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <input type="checkbox" class="css-checkbox" id="visit2" name="visit2">
                                    <label for="visit2" class="css-label">Cardiovascular screen
                                        <strong>$55</strong></label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <input type="checkbox" class="css-checkbox" id="visit3" name="visit3">
                                    <label for="visit3" class="css-label">Diabetes consultation
                                        <strong>$55</strong></label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <input type="checkbox" class="css-checkbox" id="visit4" name="visit4">
                                    <label for="visit4" class="css-label">General visit <strong>$55</strong></label>
                                </div>
                            </li>
                        </ul>
                        <hr>
                        <a href="booking-page.html" class="btn_1 full-width">Book Now</a>
                    </form>
                </div>
                <!-- /box_general -->
            </aside>
            @endif
            <!-- /asdide -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</x-layout>
