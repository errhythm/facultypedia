<?php
$search = request('search');
$course = request('course');
?>
    <nav class="sticky top-0 z-50 border-b-base-content/5 border-b shadow-md">
      <div class="navbar bg-base-100 py-4 px-8 text-base-content">
        <div class="navbar-start">
          <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost lg:hidden">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h8m-8 6h16"
                />
              </svg>
            </label>
            <ul
              tabindex="0"
              class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52"
            >
             <x-menumain :mode=0/>
            </ul>
          </div>
          <a
            class="btn btn-ghost normal-case text-xl text-base-content hover:bg-transparent" href="/"
          >
            FacultyPedia
          </a>
        </div>
        <div class="navbar-center hidden lg:flex">
          <ul class="menu menu-horizontal px-1 font-medium">
             <x-menumain :mode=1/>
          </ul>
        </div>
        <div class="navbar-end">
          <div class="hidden lg:flex">
            <div
              class="form-control flex-1 block max-w-xs px-8 ml-auto text-base-content"
            >
            <form action="/faculties">
              <label for class="sr-only">Search</label>
              <div class="relative">
                <div
                  id="search-icon"
                  class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
                >
                  <svg
                    class="w-5 h-5 text-zinc-400"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                    ></path>
                  </svg>
                </div>
                @if ($search)
                <input
                  id="search-bar"
                  name="search"
                  type="search"
                  class="block w-full py-2 pl-10 text-base-content placeholder-neutral bg-base-200 border-info-content rounded-lg focus:ring-info focus:border-primary-content text-sm"
                  placeholder="Search"
                    value="{{ $search }}"
                />
                  @else
                <input
                  id="search-bar"
                  name="search"
                  type="search"
                  class="block w-full py-2 pl-10 text-base-content placeholder-neutral bg-base-200 border-info-content rounded-lg focus:ring-info focus:border-primary-content text-sm"
                  placeholder="Search"
                />
                  @endif
                   @if ($course)
                <input
                    type="hidden"
                  id="search-bar"
                  name="course"
                  type="search"
                  class="block w-full py-2 pl-10 text-base-content placeholder-neutral bg-base-200 border-info-content rounded-lg focus:ring-info focus:border-primary-content text-sm"
                  placeholder="Search"
                    value="{{ $course }}"
                />
                        @endif
              </div>
              </form>
            </div>
          </div>

          {{-- check if user is logged in --}}
          @auth
            @if (Auth::check())
          @endauth
          <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost btn-circle avatar">
              <div class="w-10 rounded-full">
                <img src="https://api.dicebear.com/5.x/bottts-neutral/svg?seed={{ md5(Auth::user()->id . Auth::user()->created_at) }}&scale=110"
                alt="{{Auth::user()->name}}">
              </div>
            </label>
            <ul
              tabindex="0"
              class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-52 text-base-content overflow-auto"
            >
              <li class="shadow-none">
                <a class="justify-between">
                    <label tabindex="0" class="btn btn-ghost btn-circle avatar">
              <div class="w-10 rounded-full">
                <img src="https://api.dicebear.com/5.x/bottts-neutral/svg?seed={{ md5(Auth::user()->id . Auth::user()->created_at) }}&scale=110"
                alt="{{Auth::user()->name}}">
              </div>
            </label>
                  <div class="pr-4 py-3 text-base font-bold">

                    <div>{{Auth::user()->name}}</div>
                  </div>
                </a>
              </li>
              <li>
                <a href="/profile" class="justify-between">
                  Profile
                </a>
              </li>
              <li><a>Settings</a></li>
              <li><a href="/logout">Logout</a></li>
            </ul>
          </div>
          @else
          <ul class="hidden lg:menu lg:menu-horizontal px-1 font-medium">
            <li>
              <a
                class="btn btn-ghost hover:bg-transparent"
                href="/login"
              >
                Login
              </a>
            </li>
            <li>
              <a
                class="btn btn-ghost hover:bg-transparent"
                href="/register"
              >
                Register
              </a>
            </li>
          </ul>
            @endif
        </div>
      </div>
    </nav>
