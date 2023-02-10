<header class="static">
    <a href="#menu" class="btn_mobile">
        <div class="hamburger hamburger--spin" id="hamburger">
            <div class="hamburger-box">
                <div class="hamburger-inner"></div>
            </div>
        </div>
    </a>
    <!-- /btn_mobile-->
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div id="logo">
                    <a href="index.html" title="Findoctor"><img src="{{ asset('img/logo.png') }}" alt=""
                            width="163" height="36"></a>
                </div>
            </div>
            <div class="col-lg-9 col-6">
                <nav id="menu" class="main-menu">
                    <ul>
                        <li>
                            <span><a href="#0">Home</a></span>
                            <ul>
                                <li><a href="index.html">Home Default</a></li>
                                <li><a href="index-8.html">KenBurns Slider</a></li>
                                <li><a href="index-2.html">Home Version 2</a></li>
                                <li><a href="index-3.html">Home Version 3</a></li>
                                <li><a href="index-4.html">Home Version 4</a></li>
                                <li><a href="index-7.html">Home with Map</a></li>
                                <li><a href="index-6.html">Revolution Slider</a></li>
                                <li><a href="index-5.html">With Cookie Bar (EU law)</a></li>
                            </ul>
                        </li>
                        {{-- <li>
								<span><a href="#0">Pages</a></span>
								<ul>
									<li>
										<span><a href="#0">List pages</a></span>
										<ul>
											<li><a href="list.html">List page</a></li>
											<li><a href="grid-list.html">List grid page</a></li>
											<li><a href="list-map.html">List map page</a></li>
										</ul>
									</li>
									<li>
										<span><a href="#0">Detail pages</a></span>
										<ul>
											<li><a href="detail-page.html">Detail page</a></li>
											<li><a href="detail-page-2.html">Detail page 2</a></li>
                                    		<li><a href="detail-page-3.html">Detail page 3</a></li>
											<li><a href="detail-page-working-booking.html">Detail working booking</a></li>
										</ul>
									</li>
									<li><a href="submit-review.html">Submit Review</a></li>
									<li><a href="blog-1.html">Blog</a></li>
									<li><a href="badges.html">Badges</a></li>
									<li><a href="login.html">Login</a></li>
									<li><a href="login-2.html">Login 2</a></li>
									<li><a href="register-doctor.html">Register Doctor</a></li>
									<li><a href="register-doctor-working.html">Working doctor register</a></li>
									<li><a href="register.html">Register</a></li>
									<li><a href="about.html">About Us</a></li>
									<li><a href="contacts.html">Contacts</a></li>
								</ul>
							</li>
							<li>
								<span><a href="#0">Extra Elements</a></span>
								<ul>
                                    <li><a href="booking-page.html">Booking page</a></li>
                                    <li><a href="confirm.html">Confirm page</a></li>
                                	<li><a href="faq.html">Faq page</a></li>
                                    <li><a href="coming_soon/index.html">Coming soon</a></li>
									<li>
										<span><a href="#0">Pricing tables</a></span>
										<ul>
											<li><a href="pricing-tables-3.html">Pricing tables 1</a></li>
                                    		<li><a href="pricing-tables.html">Pricing tables 2</a></li>
                                    		<li><a href="pricing-tables-2.html">Pricing tables 3</a></li>
										</ul>
									</li>
									<li><a href="icon-pack-1.html">Icon pack 1</a></li>
									<li><a href="icon-pack-2.html">Icon pack 2</a></li>
									<li><a href="icon-pack-3.html">Icon pack 3</a></li>
									<li><a href="404.html">404 page</a></li>
								</ul>
							</li> --}}
                        <li><span><a href="../faculties">Faculties</a></span></li>
                        @auth
                            {{-- profile --}}
                            <li id="user" class="submenu">
                                <a href="/profile/{{ auth()->user()->id }}">
                                    <figure><img
                                            src="https://api.dicebear.com/5.x/bottts-neutral/svg?seed={{ md5(auth()->user()->id . auth()->user()->created_at) }}&rotate=20&scale=110"
                                            alt=""></figure>
                                    {{ auth()->user()->name }}
                                </a>
                                {{-- create a submenu --}}
                                <ul style="transform: translateY(12px);">
                                    <li><a href="/profile/{{ auth()->user()->id }}">Profile</a></li>
                                    <li><a href="/profile/{{ auth()->user()->id }}/edit">Edit Profile</a></li>
                                    <li><a href="/profile/{{ auth()->user()->id }}/edit/password">Change Password</a></li>
                                    <li><a href="/logout">Logout</a></li>
                                </ul>
                            </li>
                        @else
                            <li><span><a href="/login">Login</a></span></li>
                            <li><span><a href="/register">Register</a></span></li>
                        @endauth
                    </ul>
                </nav>
                <!-- /main-menu -->
            </div>
        </div>
    </div>
    <!-- /container -->
</header>
