<?php
$search = request('search');
$course = request('course');
?>
    <nav class="sticky top-0 z-50 border-b-base-content/5 border-b">
      <div class="navbar bg-accent py-4 px-8 text-base-content">
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
              class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-300 rounded-box w-52"
            >
              <li><a href="/search.html">Search</a></li>
              <li tabindex="0">
                <a class="justify-between">
                  Parent
                  <svg
                    class="fill-current"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                  >
                    <path
                      d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z"
                    />
                  </svg>
                </a>
                <ul class="p-2">
                  <li>
                    <a>Submenu 1</a>
                  </li>
                  <li><a>Submenu 2</a></li>
                </ul>
              </li>
              <li><a>Item 3</a></li>
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
            <li><a href="/search.html">Search</a></li>
            <li tabindex="0">
              <a>
                Parent
                <svg
                  class="fill-current"
                  xmlns="http://www.w3.org/2000/svg"
                  width="20"
                  height="20"
                  viewBox="0 0 24 24"
                >
                  <path
                    d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"
                  />
                </svg>
              </a>
              <ul class="p-2 bg-base-100">
                <li><a>Submenu 1</a></li>
                <li><a>Submenu 2</a></li>
              </ul>
            </li>
            <li><a>Item 3</a></li>
          </ul>
        </div>
        <div class="navbar-end">
          <!-- dont show this in mobile menu -->
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

          <div class="dropdown dropdown-end">
            <label tabindex="0" class="btn btn-ghost btn-circle avatar">
              <div class="w-10 rounded-full">
                <img src="https://api.dicebear.com/5.x/bottts-neutral/png" />
              </div>
            </label>
            <ul
              tabindex="0"
              class="mt-3 p-2 shadow menu menu-compact dropdown-content bg-base-100 rounded-box w-52 text-base-content"
            >
              <li>
                <a class="justify-between">
                  <div class="pr-4 py-3 text-sm">
                    <div>Bonnie Green</div>
                    <div class="font-medium truncate">name@flowbite.com</div>
                  </div>
                </a>
              </li>
              <li>
                <a class="justify-between">
                  Profile
                  <span class="badge">New</span>
                </a>
              </li>
              <li><a>Settings</a></li>
              <li><a>Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
