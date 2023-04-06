@php
    $search = request('search');
    $course = request('course');
@endphp

<!-- start of search section -->
    <section class="pt-10">
      <div class="max-w-screen-2xl px-4 mx-auto lg:px-12 w-full">
        <div class="relative bg-base-300 shadow-md sm:rounded-lg">
          <div
            class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4"
          >
            <div class="w-full md:w-1/2">
              <form class="flex items-center" action="/faculties">
                <label for="simple-search" class="sr-only text-base-content">
                  Search
                </label>
                <div class="relative w-full">
                  <div
                    class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
                  >
                    <svg
                      aria-hidden="true"
                      class="w-5 h-5 text-base-content"
                      fill="currentColor"
                      viewbox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"
                      />
                    </svg>
                  </div>
                  @if ($search)
                  <input
                    type="text"
                    id="simple-search"
                    name="search"
                    class="block w-full p-2 pl-10 text-sm text-base-content border border-base-200 rounded-lg bg-base-200 focus:ring-primary-500 focus:border-primary-500 focus:bg-base-100 focus:outline-none sm:text-sm"
                    placeholder="Search"
                    required=""
                    value="{{ $search }}"
                  />
                  @else
                  <input
                    type="text"
                    name="search"
                    id="simple-search"
                    class="block w-full p-2 pl-10 text-sm text-base-content border border-base-200 rounded-lg bg-base-200 focus:ring-primary-500 focus:border-primary-500 focus:bg-base-100 focus:outline-none sm:text-sm"
                    placeholder="Search"
                    required=""
                  />
                  @endif
                  @if ($course)
                            <input
                    type="hidden"
                    name="course"
                    id="simple-search"
                    class="block w-full p-2 pl-10 text-sm text-base-content border border-base-200 rounded-lg bg-base-200 focus:ring-primary-500 focus:border-primary-500 focus:bg-base-100 focus:outline-none sm:text-sm"
                    placeholder="Search"
                    required=""
                    value="{{ $course }}"
                  />
                        @endif
                </div>
              </form>
            </div>
            <div>
              <!-- make a text with tailwind showing "Showing 5 results out of 50" -->
              <p class="text-base text-base-content">
                {{ $heading }}
            </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end of search section -->
