@php
    $facultyCourses = \App\Models\Faculties::where('user_id', $user->id)->get();
    $courses = \App\Models\Courses::all();
    // get faculty model by user id
    $faculty = \App\Models\Faculties::where('user_id', $user->id)->first();
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
                                        <img src="https://api.dicebear.com/5.x/bottts-neutral/svg?seed={{ md5($user->id . $user->created_at) }}&rotate=20&scale=110"
                                            alt="{{ $user->name }}" class="img-fluid">
                                    </figure>
                                </div>
                                <div class="col-lg-7 col-md-8">
                                    <small>{{ $user->university_id }}</small>
                                    <h1>{{ $user->name }}</h1>
                                    {{-- if user role is faculty then show a div --}}
                                    @if ($user->role == 'faculty')
                                        <span class="rating">
                                            <i class="icon_star voted"></i>
                                            <i class="icon_star voted"></i>
                                            <i class="icon_star voted"></i>
                                            <i class="icon_star voted"></i>
                                            <i class="icon_star"></i>
                                            <small>(145)</small>
                                            <a href="badges.html" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Badge Level" class="badge_list_1"><img
                                                    src="img/badges/badge_1.svg" width="15" height="15"
                                                    alt=""></a>
                                        </span>
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
                            @endif
                            <!-- /row -->
                            <hr>
                            {{-- Review Box --}}
                            @php
                                // get the list of reviews of the user where faculty_id = user->id and isApproved=1
                                $reviews = \App\Models\Reviews::where('faculty_id', $user->id)->where('isApproved', 1)->get();
                            @endphp
                            {{-- how to show only 5 reviews and ask to load more --}}
                            @foreach ($reviews as $review)
                                <x-review-box :review="$review" />
                            @endforeach

                            <!-- End review-box -->
                        </div>
                        <!-- End review-container -->
                        <hr>
                        <div class="text-end"><a href="submit-review.html" class="btn_1">Submit review</a></div>
                    </div>
                </div>
                <!-- /section_2 -->
            </div>
            <!-- /col -->
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
            <!-- /asdide -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</x-layout>
