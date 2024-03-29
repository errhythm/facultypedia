<x-layout :header=true :footer=true>
    <!-- start of hero section -->
    <section class="bg-base-200 bg-opacity-30 py-10 sm:py-16 lg:py-24">
      <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="grid items-center grid-cols-1 gap-12 lg:grid-cols-2">
          <div>
            <p
              class="text-base font-semibold tracking-wider text-base-content uppercase"
            >
              Welcome to FacultyPedia
            </p>
            <h1
              class="mt-4 text-4xl font-bold text-base-content lg:mt-8 sm:text-6xl xl:text-8xl"
            >
              Review & Consult your faculty
            </h1>
            <p class="mt-4 text-base text-base-content lg:mt-8 sm:text-xl">
              Get help from your faculty and review them to help others.
            </p>

            <a
              href="{{ route('register') }}"
              title=""
              class="inline-flex items-center px-6 py-4 mt-8 font-semibold text-secondary-content transition-all duration-200 bg-secondary/80 rounded-full lg:mt-16 hover:bg-secondary focus:bg-secondary"
              role="button"
            >
              Join for free
              <svg
                class="w-6 h-6 ml-8 -mr-2"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="1.5"
                  d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z"
                />
              </svg>
            </a>

            <p class="mt-5 text-base-content">
              Already joined us?
              <a
                href="{{ route('login') }}"
                title=""
                class="text-base-content transition-all duration-200 hover:underline"
              >
                Log in
              </a>
            </p>
          </div>
          <div>
            <!-- svg start -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 575.69 583.56">
              <path
                class="fill-base-content"
                d="M421.74,367.25,318,366.93c-9.47-.19-34.31-2-58-19.56A105.51,105.51,0,0,1,218.78,260c1.84-35.78,22.94-59,27.65-63.92,23.16-24.32,51.6-29.76,65.22-31A101.54,101.54,0,0,1,350,168.67c32.82,10,50.24,34.48,55.83,43.31a105.91,105.91,0,0,1,15.65,45.13Q421.62,312.17,421.74,367.25Z"
                transform="translate(-13 -132.53)"
              />
              <path
                d="M13.19,384.28c1.26,11.52,1.63,57.41,0,168.65a61.88,61.88,0,0,0,3,9c1.32,3.13,3.19,7.62,6.26,11.35C27,578.82,32.81,581,36.3,582.35c6.68,2.49,10,1.78,32.94,1.79,11.92,0,12.15.19,17.35,0a231.14,231.14,0,0,0,23.18-2.34c37-6,68.45-27.27,68.45-27.27a178.14,178.14,0,0,0,49.3-50.87c5.76-9,18.26-28.8,23.87-56.74,3.31-16.46,3.68-33,3.91-43.43s-.06-18.92-.39-25a39.07,39.07,0,0,0-4.69-14.09c-6.33-11.19-16.84-15.9-21.52-18a56,56,0,0,0-23.48-4.69c-23,0-79,0-153.79.78a45.16,45.16,0,0,0-16.82,5.48c-1.2.68-19.39,11.34-21.42,29.74A29.18,29.18,0,0,0,13.19,384.28Z"
                transform="translate(-13 -132.53)"
                class="fill-info"
              />
              <path
                d="M185.65,716.09h93.52a89.6,89.6,0,0,0,44-12.9,91.28,91.28,0,0,0,19.17-16,92.4,92.4,0,0,0,9.39-111.33,89.87,89.87,0,0,0-28.17-27.19,91.43,91.43,0,0,0-40.31-13.11c-7.15-.57-33.39-1.81-58.69,15.46a90,90,0,0,0-39.13,69.65Z"
                transform="translate(-13 -132.53)"
                class="fill-success/70"
              />
              <path
                d="M588.7,210.41c-2.84-38.15-34.82-67.91-72.53-68.09-38.54-.18-71.23,30.6-73.3,69.66V338c5.77,35.17,35.62,61.43,70.43,62.61,36.43,1.23,69.06-25.3,75.4-62.09Z"
                transform="translate(-13 -132.53)"
                class="fill-secondary"
              />
              <path
                d="M404,523.19c-1.72-9.2-1.78-55.63,0-119,.83-2.92,3.62-11.37,10.17-13.31,1.59-.47,3.23-.4,6.53-.26,1.92.08,5.28.33,12.78,2.09,2.89.68,6.41,1.5,10.69,2.87a126.43,126.43,0,0,1,25.57,11.74,133,133,0,0,1,18.52,12.52,134.71,134.71,0,0,1,17.22,17,127.91,127.91,0,0,1,14.09,18.52,125.2,125.2,0,0,1,8.6,16.95c7.19,16.95,11,34.15,13.05,46.44.16.81,1.42,7.88-3.65,13.56a16.2,16.2,0,0,1-11.48,5.22h-107a17.93,17.93,0,0,1-10.43-4.69A17.73,17.73,0,0,1,404,523.19Z"
                transform="translate(-13 -132.53)"
                class="fill-warning"
              />
              <path
                d="M384.43,604.19c.55-24.81,21-45,45.4-45.39,25.87-.42,47.71,21.53,46.95,47.74-.74,25.89-23.25,46.51-48.91,45C403.41,650.1,383.89,629,384.43,604.19Z"
                transform="translate(-13 -132.53)"
                class="fill-error"
              />
              <path
                d="M26.78,228.54c2.11-46.1,40.65-83.56,86.09-84.13,49.66-.62,91.26,43,88.43,93.13-2.69,47.78-44.89,86.43-93.52,83C60.57,317.13,24.64,275.28,26.78,228.54Z"
                transform="translate(-13 -132.53)"
                class="fill-warning"
              />
              <polygon
                points="365.66 557.27 381.7 553.26 369.96 540.15 365.66 557.27"
                class="stroke-base-content"
                style="fill: none; stroke-width: 3px;"
              />
              <polygon
                points="308.5 380.17 321.87 343 336.15 356.04 325.84 333.34 367.13 336.67 329.56 321.21 344.63 305.56 325.84 313.97 322.52 272.69 310 311.63 294.54 295.97 303.74 317.69 262.86 317.89 300.41 331.78 286.52 345.67 306.47 336.47 308.5 380.17"
                class="stroke-base-content"
                style="
                  fill: none;
                  stroke-linecap: round;
                  stroke-linejoin: round;
                  stroke-width: 3px;
                "
              />
              <path
                d="M198.17,146.47a12.38,12.38,0,1,1,12.92,11.83A12.4,12.4,0,0,1,198.17,146.47Z"
                transform="translate(-13 -132.53)"
                class="stroke-base-content"
                style="fill: none; stroke-width: 3px;"
              />
            </svg>
            <!-- svg end -->
          </div>
        </div>
      </div>
    </section>
    <!-- end of hero section -->
    <!-- start of feature section -->
    <div class="bg-base-100 py-24 sm:py-32">
      <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0">
          <h2
            class="text-3xl font-bold tracking-tight text-base-content sm:text-4xl"
          >
            Schedule your Consultations
          </h2>
          <p class="mt-6 text-lg leading-8 text-base-content">
            Schedule your consultation with your desired Faculty very easily!
          </p>
        </div>
        <div class="mx-auto mt-16 max-w-2xl sm:mt-20 lg:mt-24 lg:max-w-none">
          <dl
            class="grid max-w-xl grid-cols-1 gap-x-8 gap-y-16 lg:max-w-none lg:grid-cols-3"
          >
            <div class="flex flex-col">
              <dt class="text-base font-semibold leading-7 text-base-content">
                <div
                  class="mb-6 flex h-10 w-10 items-center justify-center rounded-lg bg-info"
                >
                  <!-- Heroicon name: outline/inbox -->
                  <svg
                    class="h-6 w-6 text-white"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    aria-hidden="true"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M15.75 15.75l-2.489-2.489m0 0a3.375 3.375 0 10-4.773-4.773 3.375 3.375 0 004.774 4.774zM21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                    />
                  </svg>
                </div>
                Faculty Profile & Search System
              </dt>
              <dd
                class="mt-1 flex flex-auto flex-col text-base leading-7 text-base-content"
              >
                <p class="flex-auto">
                  Find and view faculty profiles based on criteria such as course, department, initials, etc.
                </p>
              </dd>
            </div>

            <div class="flex flex-col">
              <dt class="text-base font-semibold leading-7 text-base-content">
                <div
                  class="mb-6 flex h-10 w-10 items-center justify-center rounded-lg bg-info"
                >
                  <!-- Heroicon name: outline/users -->
                  <svg
                    class="h-6 w-6 text-white"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    aria-hidden="true"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"
                    />
                  </svg>
                </div>
                Faculty Review System
              </dt>
              <dd
                class="mt-1 flex flex-auto flex-col text-base leading-7 text-base-content"
              >
                <p class="flex-auto">
                  Leave feedback on faculty and can also mark the review as anonymous (with admin approval).
                </p>
              </dd>
            </div>

            <div class="flex flex-col">
              <dt class="text-base font-semibold leading-7 text-base-content">
                <div
                  class="mb-6 flex h-10 w-10 items-center justify-center rounded-lg bg-info"
                >
                  <!-- Heroicon name: outline/trash -->
                  <svg
                    class="h-6 w-6 text-white"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    aria-hidden="true"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z"
                    />
                  </svg>
                </div>
                Consultation Management System
              </dt>
              <dd
                class="mt-1 flex flex-auto flex-col text-base leading-7 text-base-content"
              >
                <p class="flex-auto">
                  Request consultations with faculty and receive video conference links for approved consultations.
                </p>
              </dd>
            </div>
          </dl>
        </div>
      </div>
    </div>
    <!-- end of feature section -->
    <!-- start of stats section -->
    <div class="bg-base-100">
      <div class="mx-auto max-w-7xl py-12 px-6 text-center lg:px-8 lg:py-24">
        <div class="space-y-8 sm:space-y-12">
          <div
            class="space-y-5 sm:mx-auto sm:max-w-xl sm:space-y-4 lg:max-w-5xl"
          >
            <h2 class="text-3xl font-bold tracking-tight sm:text-4xl">
              Our Faculties
            </h2>
            <p class="text-xl text-base-content">
              Here are some top reviewed faculties of FacultyPedia.
            </p>
          </div>
          @php
        //   get 10 top reviewed faculties
                        $faculties = App\Models\Faculties::all();
                        $reviews = App\Models\Reviews::all();

                        $topFaculty = DB::table('reviews')
                            ->join('users', 'reviews.faculty_id', '=', 'users.id')
                            ->select('reviews.faculty_id', 'users.name', 'users.created_at', 'users.university_id', DB::raw('count(*) as total'))
                            ->groupBy('reviews.faculty_id', 'users.name')
                            ->orderByDesc('total')
                            ->take(6)
                            ->get();
          @endphp
          <ul
            role="list"
            class="mx-auto grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-4 md:gap-x-6 lg:max-w-5xl lg:gap-x-8 lg:gap-y-12 xl:grid-cols-6"
          >
          @foreach ($topFaculty as $faculty)
            <li>
              <div class="space-y-4">
                <a href="{{ route('profile', $faculty->faculty_id) }}">
                <img
                  class="mx-auto h-20 w-20 rounded-full lg:h-24 lg:w-24"
                  src="https://api.dicebear.com/5.x/bottts-neutral/svg?seed={{ md5($faculty->faculty_id . $faculty->created_at) }}&scale=110"
                alt="{{ $faculty->name }}"
                />
                <div class="space-y-2">
                  <div class="text-xs font-medium pt-2 lg:text-sm">
                    <h3>{{ $faculty->name }}</h3>
                    <p class="text-info">{{ $faculty->university_id }}</p>
                  </div>
                </div>
                </a>
              </div>
            </li>
          @endforeach

            <!-- More people... -->
          </ul>
        </div>
      </div>
    </div>
    <!-- end of stats section -->
</x-layout>
