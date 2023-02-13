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
                    <a href="/" title="Findoctor"><img src="{{ asset('img/logo.png') }}" alt=""
                            width="163" height="36"></a>
                </div>
            </div>
            <div class="col-lg-9 col-6">
                <nav id="menu" class="main-menu">
                    <ul>
                        <li>
                            <span><a href="/">Home</a></span>
                        </li>
                        <li><span><a href="../faculties">Faculties</a></span></li>
                        @auth
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
