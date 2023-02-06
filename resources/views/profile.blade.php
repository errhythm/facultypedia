@php
    $facultyCourses = \App\Models\Faculties::where('user_id', $user->id)->get();
    $courses = \App\Models\Courses::all();
    // get faculty model by user id
    $faculty = \App\Models\Faculties::where('user_id', $user->id)->first();
@endphp

@extends('layout')

@section('content')
    <div id="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/faculties">Faculties</a></li>
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
                                        <img src="https://api.dicebear.com/5.x/bottts-neutral/svg?seed={{ md5($faculty->user_id . $faculty->created_at) }}&rotate=20&scale=110"
                                            alt="{{ $faculty->user_id . $faculty->created_at }}" class="img-fluid">
                                    </figure>
                                </div>
                                <div class="col-lg-7 col-md-8">
                                    <small>{{ $user->university_id }}</small>
                                    <h1>{{ $user->name }}</h1>
                                    <span class="rating">
                                        <i class="icon_star voted"></i>
                                        <i class="icon_star voted"></i>
                                        <i class="icon_star voted"></i>
                                        <i class="icon_star voted"></i>
                                        <i class="icon_star"></i>
                                        <small>(145)</small>
                                        <a href="badges.html" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Badge Level" class="badge_list_1"><img src="img/badges/badge_1.svg"
                                                width="15" height="15" alt=""></a>
                                    </span>
                                    <br>
                                    <x-faculty-courses :facultyCourses="$facultyCourses" :courses="$courses" />
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
                            <div class="row">
                                <div class="col-lg-3">
                                    <div id="review_summary">
                                        <strong>4.7</strong>
                                        <div class="rating">
                                            <i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                                class="icon_star voted"></i><i class="icon_star voted"></i><i
                                                class="icon_star"></i>
                                        </div>
                                        <small>Based on 4 reviews</small>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 90%"
                                                    aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3"><small><strong>5 stars</strong></small></div>
                                    </div>
                                    <!-- /row -->
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 95%"
                                                    aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3"><small><strong>4 stars</strong></small></div>
                                    </div>
                                    <!-- /row -->
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 60%"
                                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3"><small><strong>3 stars</strong></small></div>
                                    </div>
                                    <!-- /row -->
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 20%"
                                                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3"><small><strong>2 stars</strong></small></div>
                                    </div>
                                    <!-- /row -->
                                    <div class="row">
                                        <div class="col-lg-10 col-9">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 0"
                                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-3"><small><strong>1 stars</strong></small></div>
                                    </div>
                                    <!-- /row -->
                                </div>
                            </div>
                            <!-- /row -->

                            <hr>

                            <div class="review-box clearfix">
                                <figure class="rev-thumb"><img src="http://via.placeholder.com/150x150.jpg"
                                        alt="">
                                </figure>
                                <div class="rev-content">
                                    <div class="rating">
                                        <i class="icon_star voted"></i><i class="icon_star voted"></i><i
                                            class="icon_star voted"></i><i class="icon_star voted"></i><i
                                            class="icon_star"></i>
                                    </div>
                                    <div class="rev-info">
                                        Admin – April 03, 2016:
                                    </div>
                                    <div class="rev-text">
                                        <p>
                                            Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar
                                            hendrerit. Cum sociis natoque penatibus et magnis dis
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End review-box -->

                            <div class="review-box clearfix">
                                <figure class="rev-thumb"><img src="http://via.placeholder.com/150x150.jpg"
                                        alt="">
                                </figure>
                                <div class="rev-content">
                                    <div class="rating">
                                        <i class="icon-star voted"></i><i class="icon_star voted"></i><i
                                            class="icon_star voted"></i><i class="icon_star voted"></i><i
                                            class="icon_star"></i>
                                    </div>
                                    <div class="rev-info">
                                        Ahsan – April 01, 2016
                                    </div>
                                    <div class="rev-text">
                                        <p>
                                            Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar
                                            hendrerit. Cum sociis natoque penatibus et magnis dis
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End review-box -->

                            <div class="review-box clearfix">
                                <figure class="rev-thumb"><img src="http://via.placeholder.com/150x150.jpg"
                                        alt="">
                                </figure>
                                <div class="rev-content">
                                    <div class="rating">
                                        <i class="icon-star voted"></i><i class="icon_star voted"></i><i
                                            class="icon_star voted"></i><i class="icon_star voted"></i><i
                                            class="icon_star"></i>
                                    </div>
                                    <div class="rev-info">
                                        Sara – March 31, 2016
                                    </div>
                                    <div class="rev-text">
                                        <p>
                                            Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar
                                            hendrerit. Cum sociis natoque penatibus et magnis dis
                                        </p>
                                    </div>
                                </div>
                            </div>
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
@endsection
