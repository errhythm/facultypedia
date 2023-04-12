@php
    // get total reviews count
    $reviews = \App\Models\Reviews::all();
    $totalReviews = $reviews->count();

    // get total reviews which isapproved is 0
    $isreviews = \App\Models\Reviews::where('isapproved', 0)->get();
    $totalPendingReviews = $isreviews->count();

    // get total users who is student role
    $users = \App\Models\User::all();
    $totalUsers = $users->count();

    // get total users who is student role
    $students = \App\Models\User::where('role', 'student')->get();
    $totalStudents = $students->count();

    // get total users who is faculty role
    $faculties = \App\Models\User::where('role', 'faculty')->get();
    $totalFaculties = $faculties->count();
@endphp

<x-layout :header=true :footer=true>
    <div class="flex flex-1">
        <div class="hidden xl:flex xl:w-64 xl:flex-col border-black">
            <div class="flex flex-col pt-5 overflow-y-auto">
                <div class="flex flex-col justify-between flex-1 h-full px-4">
                    <div class="space-y-4">
                        <nav class="flex-1 space-y-2">
                            <a href="#" title=""
                                class="flex items-center px-4 py-2.5 text-sm font-medium text-base-200/50 transition-all duration-200 bg-indigo-600 rounded-lg group">
                                <svg class="flex-shrink-0 w-5 h-5 mr-4 text-base-200/50"
                                    xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                Dashboard
                            </a>

                            <a href="#"
                                class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 text-gray-900 hover:text-base-200/50 rounded-lg hover:bg-indigo-600 group">
                                <svg class="flex-shrink-0 w-5 h-5 mr-4" xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                                Tickets
                            </a>

                            <a href="#"
                                class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 text-gray-900 hover:text-base-200/50 rounded-lg hover:bg-indigo-600 group">
                                <svg class="flex-shrink-0 w-5 h-5 mr-4" xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Agents
                            </a>

                            <a href="#"
                                class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 text-gray-900 hover:text-base-200/50 rounded-lg hover:bg-indigo-600 group">
                                <svg class="flex-shrink-0 w-5 h-5 mr-4" xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                Customers
                                <svg class="w-4 h-6 ml-auto text-gray-400 group-hover:text-base-200/50"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </a>
                        </nav>

                        <hr class="border-base-content/20" />

                        <nav class="flex-1 space-y-2">
                            <a href="#"
                                class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 text-gray-900 hover:text-base-200/50 rounded-lg hover:bg-indigo-600 group">
                                <svg class="flex-shrink-0 w-5 h-5 mr-4" xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                </svg>
                                Products
                            </a>

                            <a href="#"
                                class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 text-gray-900 hover:text-base-200/50 rounded-lg hover:bg-indigo-600 group">
                                <svg class="flex-shrink-0 w-5 h-5 mr-4" xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                                Orders
                            </a>

                            <a href="#"
                                class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 text-gray-900 hover:text-base-200/50 rounded-lg hover:bg-indigo-600 group">
                                <svg class="flex-shrink-0 w-5 h-5 mr-4" xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                                Analytics
                                <svg class="w-4 h-6 ml-auto text-gray-400 group-hover:text-base-200/50"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </a>
                        </nav>

                        <hr class="border-base-content/20" />

                        <nav class="flex-1 space-y-2">
                            <a href="#"
                                class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 text-gray-900 hover:text-base-200/50 rounded-lg hover:bg-indigo-600 group">
                                <svg class="flex-shrink-0 w-5 h-5 mr-4" xmlns="http://www.w3.org/2000/svg"
                                    class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                Settings
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col flex-1 overflow-x-hidden">
            <main>
                <div class="py-6">
                    <div class="px-4 ml-auto mt-8 sm:px-6 md:px-8">
                        <div class="space-y-5 ">
                            {{-- Row 1 --}}
                            <div class="grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 lg:grid-cols-4">
                                <div class="bg-base-100 border border-base-content rounded-xl">
                                    <div class="px-5 py-4">
                                        <p class="text-xs font-medium tracking-wider text-base-content/80 uppercase">
                                            Pending Reviews
                                        </p>
                                        <div class="flex items-center mt-3">
                                            <p class="text-xl font-bold text-base-content/80">
                                                {{ $totalPendingReviews }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-base-100 border border-base-content rounded-xl">
                                    <div class="px-5 py-4">
                                        <p class="text-xs font-medium tracking-wider text-base-content/80 uppercase">
                                            Total Reviews
                                        </p>
                                        <div class="flex items-center mt-3">
                                            <p class="text-xl font-bold text-base-content/80">
                                                {{ $totalReviews }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-base-100 border border-base-content rounded-xl">
                                    <div class="px-5 py-4">
                                        <p class="text-xs font-medium tracking-wider text-base-content/80 uppercase">
                                            Total Students
                                        </p>
                                        <div class="flex items-center mt-3">
                                            <p class="text-xl font-bold text-base-content/80">
                                                {{ $totalStudents }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-base-100 border border-base-content rounded-xl">
                                    <div class="px-5 py-4">
                                        <p class="text-xs font-medium tracking-wider text-base-content/80 uppercase">
                                            Total Faculties
                                        </p>
                                        <div class="flex items-center mt-3">
                                            <p class="text-xl font-bold text-base-content/80">
                                                {{ $totalFaculties }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- Row 2 --}}
                            <div class="grid grid-cols-1 gap-5 sm:gap-6 lg:grid-cols-6">
                                {{-- column1 --}}
                                @php
                                    // get the pending reviews top 5
                                    $pendingReviews = \App\Models\Reviews::where('isApproved', 0)
                                        ->where('isDeleted', 0)
                                        ->orderBy('id', 'desc')
                                        ->take(3)
                                        ->get();
                                @endphp
                                <div
                                    class="overflow-hidden bg-base-100 border border-base-content/80 rounded-xl lg:col-span-4">
                                    <section class="px-4 py-5 sm:p-6">
                                        <div class="sm:flex sm:items-center sm:justify-between items-center">
                                            <h2 class="text-base font-bold text-base-content/80">Pending Reviews</h2>
                                            <a href="#"><span
                                                    class="px-3 py-1 text-xs text-warning-content bg-warning rounded-full">
                                                    See all
                                                </span></a>
                                        </div>

                                        <div class="flex flex-col mt-6">
                                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                                    <div
                                                        class="overflow-hidden border border-base-content/20  md:rounded-lg">
                                                        <table id="pending-review"
                                                            class="min-w-full divide-y divide-base-content/20">
                                                            <thead class="bg-base-300">
                                                                <tr>
                                                                    <th scope="col"
                                                                        class="py-3.5 px-6 text-sm font-normal text-left rtl:text-right text-base-content/50">
                                                                        <div class="flex items-center gap-x-3">
                                                                            <span>Student Name</span>
                                                                        </div>
                                                                    </th>

                                                                    <th scope="col"
                                                                        class="px-8 py-3.5 text-sm font-normal text-left rtl:text-right text-base-content/50 whitespace-nowrap">
                                                                        <button class="flex items-center gap-x-2">
                                                                            <span>Faculty Name</span>

                                                                            <svg class="h-3" viewBox="0 0 10 11"
                                                                                fill="none"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path
                                                                                    d="M2.13347 0.0999756H2.98516L5.01902 4.79058H3.86226L3.45549 3.79907H1.63772L1.24366 4.79058H0.0996094L2.13347 0.0999756ZM2.54025 1.46012L1.96822 2.92196H3.11227L2.54025 1.46012Z"
                                                                                    fill="currentColor"
                                                                                    stroke="currentColor"
                                                                                    stroke-width="0.1" />
                                                                                <path
                                                                                    d="M0.722656 9.60832L3.09974 6.78633H0.811638V5.87109H4.35819V6.78633L2.01925 9.60832H4.43446V10.5617H0.722656V9.60832Z"
                                                                                    fill="currentColor"
                                                                                    stroke="currentColor"
                                                                                    stroke-width="0.1" />
                                                                                <path
                                                                                    d="M8.45558 7.25664V7.40664H8.60558H9.66065C9.72481 7.40664 9.74667 7.42274 9.75141 7.42691C9.75148 7.42808 9.75146 7.42993 9.75116 7.43262C9.75001 7.44265 9.74458 7.46304 9.72525 7.49314C9.72522 7.4932 9.72518 7.49326 9.72514 7.49332L7.86959 10.3529L7.86924 10.3534C7.83227 10.4109 7.79863 10.418 7.78568 10.418C7.77272 10.418 7.73908 10.4109 7.70211 10.3534L7.70177 10.3529L5.84621 7.49332C5.84617 7.49325 5.84612 7.49318 5.84608 7.49311C5.82677 7.46302 5.82135 7.44264 5.8202 7.43262C5.81989 7.42993 5.81987 7.42808 5.81994 7.42691C5.82469 7.42274 5.84655 7.40664 5.91071 7.40664H6.96578H7.11578V7.25664V0.633865C7.11578 0.42434 7.29014 0.249976 7.49967 0.249976H8.07169C8.28121 0.249976 8.45558 0.42434 8.45558 0.633865V7.25664Z"
                                                                                    fill="currentColor"
                                                                                    stroke="currentColor"
                                                                                    stroke-width="0.3" />
                                                                            </svg>
                                                                        </button>
                                                                    </th>

                                                                    <th scope="col"
                                                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-base-content/50">
                                                                        <button class="flex items-center gap-x-2">
                                                                            <span>Rating</span>

                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 24 24"
                                                                                stroke-width="2" stroke="currentColor"
                                                                                class="w-4 h-4">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                                                            </svg>
                                                                        </button>
                                                                    </th>

                                                                    <th scope="col"
                                                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-base-content/50">
                                                                        Review</th>

                                                                    <th scope="col" class="relative py-3.5 px-4">
                                                                        <span class="sr-only">Edit</span>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody
                                                                class="bg-base-100/50 divide-y divide-base-content/20 ">
                                                                {{-- print in pending reviews in each row --}}

                                                                {{-- if pendingReviews is 0, then show a big table row with a check sign in middle and next line You have no pending reviews --}}
                                                                @if (count($pendingReviews) == 0)
                                                                    <tr>
                                                                        <td colspan="4"
                                                                            class="px-4 py-20 mx-auto text-sm font-medium text-base-content/70">
                                                                            <div
                                                                                class="flex items-center justify-center gap-x-3">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    class="h-10 w-10 text-green-500"
                                                                                    viewBox="0 0 20 20"
                                                                                    fill="currentColor">
                                                                                    <path fill-rule="evenodd"
                                                                                        d="M5.172 10a5 5 0 1110 0 5 5 0 01-10 0zm1.768 0a3 3 0 105.656 0 3 3 0 00-5.656 0zM3.757 3.757a1 1 0 011.414 0L8 6.586l2.828-2.829a1 1 0 111.415 1.415L9.415 8l2.829 2.828a1 1 0 01-1.415 1.415L8 9.415l-2.828 2.829a1 1 0 01-1.415-1.415L6.585 8 3.757 5.172a1 1 0 010-1.415z"
                                                                                        clip-rule="evenodd" />
                                                                                </svg>
                                                                                <div
                                                                                    class="py-2
                                                                                    text-sm font-medium
                                                                                    text-base-content/70">
                                                                                    You have no pending reviews
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @else
                                                                    @foreach ($pendingReviews as $review)
                                                                        @php
                                                                            // get faculty name from the $review->faculty_id by searching the faculty model with the id
                                                                            $faculty = App\Models\User::find($review->faculty_id);
                                                                            $student = App\Models\User::find($review->user_id);
                                                                        @endphp
                                                                        <tr>
                                                                            <td
                                                                                class="px-4 py-2 text-sm font-medium text-base-content/70">
                                                                                <div
                                                                                    class="inline-flex items-center gap-x-3">
                                                                                    <div
                                                                                        class="flex items-center gap-x-2">
                                                                                        <img class="object-cover w-10 h-10 rounded-full"
                                                                                            src="https://api.dicebear.com/5.x/bottts-neutral/svg?seed={{ md5($student->id . $student->created_at) }}&scale=110"
                                                                                            alt="{{ $student->name }}>
                                                                                    <div
                                                                                        class="py-2
                                                                                            text-sm font-medium
                                                                                            text-base-content/70">
                                                                                        <h2
                                                                                            class="font-medium text-base-content/80">
                                                                                            {{ $student->name }}</h2>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td
                                                                                class="px-8 py-2 text-sm font-medium text-base-content/70">
                                                                                {{ $faculty->name }}
                                                                            </td>
                                                                            <td
                                                                                class="px-4 py-2 text-sm text-center text-base-content/50 ">
                                                                                {{ $review->rating }}</td>
                                                                            <td
                                                                                class="px-4 py-2 text-sm text-base-content/50 ">
                                                                                {{ $review->review }}</td>
                                                                            <td class="px-4 py-2 text-sm">
                                                                                <div class="flex items-center gap-x-6">
                                                                                    <button
                                                                                        class="text-base-content/50 transition-colors duration-200   hover:text-error focus:outline-none">

                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            viewBox="0 0 24 24"
                                                                                            class="w-5 h-5"
                                                                                            stroke="currentColor"
                                                                                            id="check-circle">
                                                                                            <path fill="currentColor"
                                                                                                d="M14.72,8.79l-4.29,4.3L8.78,11.44a1,1,0,1,0-1.41,1.41l2.35,2.36a1,1,0,0,0,.71.29,1,1,0,0,0,.7-.29l5-5a1,1,0,0,0,0-1.42A1,1,0,0,0,14.72,8.79ZM12,2A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8,8,0,0,1,12,20Z">
                                                                                            </path>
                                                                                        </svg>
                                                                                    </button>

                                                                                    <button
                                                                                        class="text-base-content/50 transition-colors duration-200   hover:text-warning focus:outline-none">

                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            fill="none"
                                                                                            viewBox="0 0 24 24"
                                                                                            stroke="currentColor"
                                                                                            class="w-5 h-5"
                                                                                            id="times-circle">
                                                                                            <path fill="currentColor"
                                                                                                d="M15.71,8.29a1,1,0,0,0-1.42,0L12,10.59,9.71,8.29A1,1,0,0,0,8.29,9.71L10.59,12l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l2.29,2.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L13.41,12l2.3-2.29A1,1,0,0,0,15.71,8.29Zm3.36-3.36A10,10,0,1,0,4.93,19.07,10,10,0,1,0,19.07,4.93ZM17.66,17.66A8,8,0,1,1,20,12,7.95,7.95,0,0,1,17.66,17.66Z">
                                                                                            </path>
                                                                                        </svg>
                                                                                    </button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                @endif

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>

                                {{-- column 2 --}}
                                @php
                                    $faculties = App\Models\Faculties::all();
                                    $reviews = App\Models\Reviews::all();

                                    $topFaculty = DB::table('reviews')
                                        ->join('users', 'reviews.faculty_id', '=', 'users.id')
                                        ->select('reviews.faculty_id', 'users.name', DB::raw('count(*) as total'))
                                        ->groupBy('reviews.faculty_id', 'users.name')
                                        ->orderByDesc('total')
                                        ->take(5)
                                        ->get();

                                @endphp
                                <div
                                    class="overflow-hidden bg-base-100 border border-base-content/80 rounded-xl lg:col-span-2">
                                    <div class="px-4 py-5 sm:p-6">
                                        <div class="sm:flex sm:items-center sm:justify-between items-center">
                                            <p class="text-base font-bold text-base-content/80">Top Reviewed Faculties
                                            </p>
                                        </div>
                                        <div class="mt-8 space-y-3">
                                            @foreach ($topFaculty as $faculty)
                                                @php
                                                    // get the total number of reviews of this faculty where rating value is more than 3
                                                    $posReviews = DB::table('reviews')
                                                        ->where('faculty_id', $faculty->faculty_id)
                                                        ->where('rating', '>', 3)
                                                        ->count();
                                                    // get the total number of reviews of this faculty where rating value is less than 3
                                                    $negReviews = DB::table('reviews')
                                                        ->where('faculty_id', $faculty->faculty_id)
                                                        ->where('rating', '<', 3)
                                                        ->count();
                                                    // get the total number of reviews of this faculty
                                                    $totalReviews = DB::table('reviews')
                                                        ->where('faculty_id', $faculty->faculty_id)
                                                        ->count();
                                                    // calculate the percentage of positive reviews
                                                    $posrevpercentage = round(($posReviews / $totalReviews) * 100, 0);

                                                    // calculate the percentage of negative reviews
                                                    $negrevpercentage = round(($negReviews / $totalReviews) * 100, 0);

                                                @endphp
                                                <div class="flex items-center justify-between">
                                                    <a href="/profile/{{ $faculty->faculty_id }}">
                                                        <p class="text-sm font-medium text-base-content/80">
                                                            {{ $faculty->name }}
                                                        </p>
                                                    </a>
                                                    <p class="text-sm font-medium text-base-content/80">
                                                        {{ $faculty->total }}
                                                    </p>
                                                </div>
                                                <div class="mt-1 bg-warning h-1.5 rounded-full relative">
                                                    <div class="absolute inset-y-0 left-0 bg-success rounded-full"
                                                        style="width: {{ $posrevpercentage }}%;">
                                                    </div>
                                                    <div class="absolute inset-y-0 right-0 bg-error rounded-full"
                                                        style="width: {{ $negrevpercentage }}%;">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- row 3 --}}
                        <div class="grid grid-cols-1 gap-5 sm:gap-6 lg:grid-cols-6">
                            {{-- column1 --}}
                            <div
                                class="overflow-hidden bg-base-100 border border-base-content/80 rounded-xl lg:col-span-4">
                            </div>
                            {{-- column 2 --}}
                            <div
                                class="overflow-hidden bg-base-100 border border-base-content/80 rounded-xl lg:col-span-2">
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </main>
    </div>
    </div>
</x-layout>
