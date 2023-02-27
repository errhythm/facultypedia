<x-layout>
		<div class="hero_home version_2">
			<div class="content">
				<h3>{{$heading}}</h3>
				<p>
					{{$subheading}}
				</p>
				<form method="GET" action="/faculties">
					<div id="custom-search-input">
						<div class="input-group">
							<input type="text" class=" search-query" placeholder="Ex. Initial, Department, Name..." name="search">
							<input type="submit" class="btn_search" value="Search">
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- /Hero -->

		<div class="container margin_120_95">
			<div class="main_title">
				<h2>Discover the <strong>online</strong> consultation!</h2>
                <p></p>
			</div>
			<div class="row add_bottom_30">
				<div class="col-lg-4">
					<div class="box_feat" id="icon_1">
						<span></span>
						<h3>Find your Faculty</h3>
						<p>Find your faculty with their initials, department, name or e-mail.</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="box_feat" id="icon_2">
						<span></span>
						<h3>View profile</h3>
                        <p>View the profile of your faculty and their information.</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="box_feat" id="icon_3">
						<h3>Book a consultation</h3>
                        <p>Book a consultation with your faculty easily and consult with them.</p>
					</div>
				</div>
			</div>
			<!-- End row -->
			<p class="text-center"><a href="list.html" class="btn_1 medium">Find your Faculty</a></p>
		</div>
		<!-- End container -->

		<div class="bg_color_1">
			<div class="container margin_120_95">
				<div class="main_title">
					<h2>Most Reviewed faculties</h2>
					<p>Consult with the most reviewed faculties trusted by other students.
                    </p>
				</div>
				<div id="reccomended" class="owl-carousel owl-theme">
                    {{-- get most reviewed faculties from reviews model and use the faculty_id to get details from faculty model --}}
                    <?php
                    $reviews = DB::table('reviews')->select('faculty_id', DB::raw('count(*) as total'))->groupBy('faculty_id')->orderBy('total', 'desc')->take(5)->get();
                    ?>
                    @foreach ($reviews as $review)
                    <?php
                    $faculty = DB::table('faculties')->where('id', $review->faculty_id)->first();
                    // use faculty->id to get info from users table
                    $user = DB::table('users')->where('id', $faculty->id)->first();
                    ?>
					<div class="item">

						<a href="detail-page.html">
							<div class="views"><i class="icon-comment-6"></i>{{$review->total}}</div>
							<div class="title">
								<h4>{{$user->name}}<em>{{$user->department}}</em></h4>
							</div><img src="https://api.dicebear.com/5.x/bottts-neutral/svg?seed={{ md5($user->id . $user->created_at) }}&scale=110" alt="">
						</a>
					</div>
                    @endforeach
				</div>
				<!-- /carousel -->
			</div>
			<!-- /container -->
		</div>
		<!-- /white_bg -->

		<div class="container margin_120_95">
			<div class="main_title">
				<h2>Find by Top Courses</h2>
			</div>
            {{-- get top reviewed courses from reviews table and then get the information of that course from courses table --}}
            <?php
            $reviews = DB::table('reviews')->select('course_id', DB::raw('count(*) as total'))->groupBy('course_id')->orderBy('total', 'desc')->take(8)->get();
            ?>
			<div class="row">
                @foreach ($reviews as $review)
                <?php
                $course = DB::table('courses')->where('id', $review->course_id)->first();
                ?>
				<div class="col-lg-3 col-md-6">
					<a href="list.html" class="box_cat_home">
						<i class="icon-info-4"></i>
                        <h1 style="color: #0072BC;padding: 0.25em;">{{$course->course_code}}</h1>
                        <h3>{{$course->course_title}}</h3>
						<ul class="clearfix">
                            {{-- get how many faculties on this course and how many reviews --}}
                            <?php
                            // check for faculties where courses field contains the course id
                            $faculties = DB::table('faculties')->where('courses', 'like', '%'.$course->id.'%')->get();
                            $reviews = DB::table('reviews')->where('course_id', $course->id)->get();
                            ?>
                            <li><strong>{{count($faculties)}}</strong>Faculties</li>
                            <li><strong>{{count($reviews)}}</strong>Reviews</li>
						</ul>
					</a>
				</div>
                @endforeach
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->

		<div id="app_section">
			<div class="container">
				<div class="row justify-content-around">
					<div class="col-md-5">
						<p><img src="img/app_img.svg" alt="" class="img-fluid" width="500" height="433"></p>
					</div>
					<div class="col-md-6">
						<small>Application</small>
						<h3>Download <strong>Findoctor App</strong> Now!</h3>
						<p class="lead">Tota omittantur necessitatibus mei ei. Quo paulo perfecto eu, errem percipit ponderum no eos. Has eu mazim sensibus. Ad nonumes dissentiunt qui, ei menandri electram eos. Nam iisque consequuntur cu.</p>
						<div class="app_buttons wow" data-wow-offset="100">
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 43.1 85.9" style="enable-background:new 0 0 43.1 85.9;" xml:space="preserve">
							<path stroke-linecap="round" stroke-linejoin="round" class="st0 draw-arrow" d="M11.3,2.5c-5.8,5-8.7,12.7-9,20.3s2,15.1,5.3,22c6.7,14,18,25.8,31.7,33.1" />
							<path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-1" d="M40.6,78.1C39,71.3,37.2,64.6,35.2,58" />
							<path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-2" d="M39.8,78.5c-7.2,1.7-14.3,3.3-21.5,4.9" />
						</svg>
							<a href="#0" class="fadeIn"><img src="img/apple_app.png" alt="" width="150" height="50" data-retina="true"></a>
							<a href="#0" class="fadeIn"><img src="img/google_play_app.png" alt="" width="150" height="50" data-retina="true"></a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /app_section -->
</x-layout>
