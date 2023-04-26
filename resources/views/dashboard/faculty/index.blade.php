@php
    // get total reviews of the logged in faculty
    $totalReviews = \App\Models\Reviews::where('faculty_id', Auth::user()->id)
        ->where('isApproved', 1)
        ->where('isDeleted', 0)
        ->get()
        ->count();

    // get current rating of the logged in faculty
    $currentRating = \App\Models\Reviews::where('faculty_id', Auth::user()->id)
        ->where('isApproved', 1)
        ->where('isDeleted', 0)
        ->get()
        ->avg('rating');

    // floor the current rating upto 2 decimal
    $currentRating = floor($currentRating * 100) / 100;

    // get total reviews which isapproved is 0 and isdeleted is 0
    $isreviews = \App\Models\Reviews::where('isApproved', 0)
        ->where('isDeleted', 0)
        ->get();
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

    // get the pending consultation requests of the logged in faculty
    $pendingConsultationRequests = \App\Models\Consultations::where('faculty_id', Auth::user()->id)
        ->where('is_approved', 'Pending')
        ->orderBy('complete_time', 'asc')
        ->count();

    // get the Approved consultation requests of the logged in faculty
    $approvedConsultationRequests = \App\Models\Consultations::where('faculty_id', Auth::user()->id)
        ->where('is_approved', 'Approved')
        ->orderBy('complete_time', 'asc')
        ->count();

    // check if the faculty has any consultation slot in ConsultationSlots model
    $consultationSlots = \App\Models\ConsultationSlots::where('faculty_id', Auth::user()->id)
        ->get()
        ->count();
@endphp

<x-dashboard>
    <div class="py-6">
        <div class="px-4 ml-auto mt-8 sm:px-6 md:px-8">
            <div class="space-y-5 ">
                {{-- if the faculty has no consultation slot show this message --}}
                {{-- Row 1 --}}
                <div class="grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 lg:grid-cols-4 row-span-2">
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
                                Current Rating
                            </p>
                            <div class="flex items-center mt-3">
                                <p class="text-xl font-bold text-base-content/80">
                                    {{ $currentRating }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-base-100 border border-base-content rounded-xl">
                        <div class="px-5 py-4">
                            <p class="text-xs font-medium tracking-wider text-base-content/80 uppercase">
                                Upcoming Consultations
                            </p>
                            <div class="flex items-center mt-3">
                                <p class="text-xl font-bold text-base-content/80">
                                    {{ $approvedConsultationRequests }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-base-100 border border-base-content rounded-xl">
                        <div class="px-5 py-4">
                            <p class="text-xs font-medium tracking-wider text-base-content/80 uppercase">
                                Pending Consultations
                            </p>
                            <div class="flex items-center mt-3">
                                <p class="text-xl font-bold text-base-content/80">
                                    {{ $pendingConsultationRequests }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Row 2 --}}
                <div class="grid grid-cols-1 gap-5 sm:gap-6 lg:grid-cols-6">
                    {{-- column1 --}}
                    @php
                        // get 3 latest reviews
                        $latestReviews = \App\Models\Reviews::where('faculty_id', Auth::user()->id)
                            ->where('isApproved', 1)
                            ->where('isDeleted', 0)
                            ->orderBy('created_at', 'desc')
                            ->take(3)
                            ->get();
                        // showingpendingreviews count will be equal to pendingreviewsCount if its less than 3
                        // else it will be 3
                        $showingpendingReviews = $totalReviews < 3 ? $totalReviews : 3;
                    @endphp
                    <div class="overflow-hidden bg-base-100 border border-base-content/80 rounded-xl lg:col-span-4">
                        <section class="px-4 py-5 sm:p-6">
                            <div class="sm:flex sm:items-center sm:justify-between items-center">
                                <h2 class="text-base font-bold text-base-content/80">Latest Reviews
                                    <span class="text-xs">(Showing {{ $showingpendingReviews }} out of
                                        {{ $totalReviews }})</span>
                                </h2>
                                <a href="{{ route('facultyReviews') }}"><span
                                        class="px-3 py-1 text-xs text-warning-content bg-warning rounded-full">
                                        See all
                                    </span></a>
                            </div>

                            <div class="flex flex-col mt-6">
                                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                        <div class="overflow-hidden border border-base-content/20  md:rounded-lg">
                                            <table id="pending-review"
                                                class="min-w-full divide-y divide-base-content/20">
                                                <thead class="bg-base-300">
                                                    <tr>
                                                        <th scope="col"
                                                            class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-base-content/50">
                                                            Rating
                                                        </th>

                                                        <th scope="col"
                                                            class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-base-content/50">
                                                            Review</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-base-100/50 divide-y divide-base-content/20 ">
                                                    {{-- print in pending reviews in each row --}}

                                                    {{-- if pendingReviews is 0, then show a big table row with a check sign in middle and next line You have no pending reviews --}}
                                                    @if (count($latestReviews) == 0)
                                                        <tr>
                                                            <td colspan="4"
                                                                class="px-4 py-20 mx-auto text-sm font-medium text-base-content/70">
                                                                <div class="flex items-center justify-center gap-x-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="h-10 w-10 text-error" viewBox="0 0 25 25"
                                                                        fill="currentColor">
                                                                        <path fill-rule="evenodd"
                                                                            d="M15.71,8.29a1,1,0,0,0-1.42,0L12,10.59,9.71,8.29A1,1,0,0,0,8.29,9.71L10.59,12l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l2.29,2.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L13.41,12l2.3-2.29A1,1,0,0,0,15.71,8.29Zm3.36-3.36A10,10,0,1,0,4.93,19.07,10,10,0,1,0,19.07,4.93ZM17.66,17.66A8,8,0,1,1,20,12,7.95,7.95,0,0,1,17.66,17.66Z"
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
                                                        @foreach ($latestReviews as $review)
                                                            <tr>
                                                                <td
                                                                    class="px-4 py-2 text-sm text-center text-base-content/50 ">
                                                                    {{ $review->rating }}</td>
                                                                <td
                                                                    class="px-4 py-2 text-sm text-center text-base-content/50 ">
                                                                    {{ $review->review }}</td>
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
                        $approvedConsultations = \App\Models\Consultations::where('faculty_id', Auth::user()->id)
                            ->where('is_approved', 'Approved')
                            ->orderBy('consultation_date', 'asc')
                            ->orderBy('complete_time', 'desc')
                            ->take(2)
                            ->get();
                    @endphp
                    <div
                        class="overflow-hidden bg-base-100 border border-base-content/80 rounded-xl lg:col-span-2 row-span-2">
                        <div class="px-4 py-5 sm:p-6 space-y-5">
                            <div class="sm:flex sm:items-center sm:justify-between items-center">
                                <p class="text-base font-bold text-base-content/80">Upcoming Consultation
                                </p>
                            </div>
                            @if ($approvedConsultations->count() == 0)
                                @if ($consultationSlots == 0)
                                    <div class="alert alert-warning shadow-lg">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                            </svg>
                                            <span>You haven't added any consultation slots yet. <br> Please add
                                                consultation slots to start accepting consultation.</span>
                                        </div>
                                    </div>
                                @endif
                                <div class="flex flex-col items-center justify-center mt-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-16 h-16"
                                        stroke="currentColor">
                                        <path fill="none" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                                        </path>
                                    </svg>
                                    <p class="mt-2 text-base font-semibold text-base-content/80">No Upcoming
                                        Consultation
                                    </p>
                                </div>
                            @else
                                @foreach ($approvedConsultations as $consultation)
                                    @php
                                        // get faculty name from the $consultation->faculty_id by searching the faculty model with the id
                                        $student = App\Models\User::find($consultation->student_id);
                                        $slot = App\Models\ConsultationSlots::find($consultation->slot_id);
                                        // get the slots start time and end time and make it in 12 hour format
                                        $start_time = date('h:i A', strtotime($slot->start_time));
                                        $end_time = date('h:i A', strtotime($slot->end_time));
                                        $message = Str::limit($consultation->message, 30);
                                    @endphp
                                    <div class="card card-side bg-base-100 border border-base-200 shadow-xl">
                                        <div class="card-body card-compact">
                                            <p class="text-xs text-base-content/50">
                                                {{ $consultation->consultation_date }} - {{ $slot->day_of_week }}</p>
                                            <h2 class="card-title text-base">{{ $start_time }} to
                                                {{ $end_time }}</h2>
                                            <p class="text-base-content/80">{{ $student->name }} <span
                                                    class="font-medium">({{ $student->university_id }})</span></p>
                                            <p class="text-base-content/80">{{ $student->email }}</p>
                                            <p class="font-semibold text-base-content/80">Message: <span
                                                    class="font-normal text-base-content/80">{{ $message }}</span>
                                            </p>
                                            <div class="card-actions justify-end">
                                                <a href="{{ route('showConsultation', $consultation->id) }}">
                                                    <button class="btn btn-primary">Join</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    {{-- column1 --}}
                    @php
                        $pendingConsultations = \App\Models\Consultations::where('faculty_id', Auth::user()->id)
                            ->where('is_approved', 'Pending')
                            ->orderBy('complete_time', 'asc')
                            ->take(3)
                            ->get();
                        // showingpendingreviews count will be equal to pendingreviewsCount if its less than 3
                        // else it will be 3
                        $showingpendingConsultations = $pendingConsultationRequests < 3 ? $pendingConsultationRequests : 3;
                    @endphp
                    <div class="overflow-hidden bg-base-100 border border-base-content/80 rounded-xl lg:col-span-4">
                        <section class="px-4 py-5 sm:p-6">
                            <div class="sm:flex sm:items-center sm:justify-between items-center">
                                <h2 class="text-base font-bold text-base-content/80">Pending Consultations
                                    <span class="text-xs">(Showing {{ $showingpendingConsultations }} out of
                                        {{ $pendingConsultationRequests }})
                                    </span>
                                </h2>
                                <a href="{{ route('pendingConsultations') }}"><span
                                        class="px-3 py-1 text-xs text-warning-content bg-warning rounded-full">
                                        See all
                                    </span></a>
                            </div>
                            <div class="flex flex-col mt-6">
                                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                        <div class="overflow-hidden border border-base-content/20  md:rounded-lg">
                                            <table id="pending-review"
                                                class="min-w-full divide-y divide-base-content/20">
                                                <thead class="bg-base-300">
                                                    <tr>
                                                        <th scope="col"
                                                            class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-base-content/50">
                                                            <div class="flex items-center gap-x-3">
                                                                <span>Student Name</span>
                                                            </div>
                                                        </th>

                                                        <th scope="col"
                                                            class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-base-content/50 whitespace-nowrap">
                                                            <span>Date</span>
                                                        </th>

                                                        <th scope="col"
                                                            class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-base-content/50">
                                                            <span>Slot Time</span>
                                                        </th>

                                                        <th scope="col"
                                                            class="px-4 py-3.5 text-sm font-normal text-center rtl:text-right text-base-content/50">
                                                            Status</th>

                                                        <th scope="col" class="relative py-3.5 px-4">
                                                            <span class="sr-only">Edit</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-base-100/50 divide-y divide-base-content/20 ">
                                                    @if (count($pendingConsultations) == 0)
                                                        <tr>
                                                            <td colspan="4"
                                                                class="px-4 py-20 mx-auto text-sm font-medium text-base-content/70">
                                                                <div class="flex items-center justify-center gap-x-3">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="h-10 w-10 text-error"
                                                                        viewBox="0 0 25 25" fill="currentColor">
                                                                        <path fill-rule="evenodd"
                                                                            d="M15.71,8.29a1,1,0,0,0-1.42,0L12,10.59,9.71,8.29A1,1,0,0,0,8.29,9.71L10.59,12l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l2.29,2.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L13.41,12l2.3-2.29A1,1,0,0,0,15.71,8.29Zm3.36-3.36A10,10,0,1,0,4.93,19.07,10,10,0,1,0,19.07,4.93ZM17.66,17.66A8,8,0,1,1,20,12,7.95,7.95,0,0,1,17.66,17.66Z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                    <div
                                                                        class="py-2
                                                                                        text-sm font-medium
                                                                                        text-base-content/70">
                                                                        You have no pending consultations
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @else
                                                        @foreach ($pendingConsultations as $consultation)
                                                            @php
                                                                // get faculty name from the $consultation->faculty_id by searching the faculty model with the id
                                                                $student = App\Models\User::find($consultation->student_id);
                                                                $slot = App\Models\ConsultationSlots::find($consultation->slot_id);

                                                                // get the slots start time and end time and make it in 12 hour format
                                                                $start_time = date('h:i A', strtotime($slot->start_time));
                                                                $end_time = date('h:i A', strtotime($slot->end_time));
                                                            @endphp
                                                            <tr>
                                                                <td
                                                                    class="px-4 py-2 text-sm font-medium text-base-content/70">
                                                                    <div class="inline-flex items-center gap-x-3">
                                                                        <div class="flex items-center gap-x-2">
                                                                            <img class="object-cover w-10 h-10 rounded-full"
                                                                                src="https://api.dicebear.com/5.x/bottts-neutral/svg?seed={{ md5($student->id . $student->created_at) }}&scale=110"
                                                                                alt="{{ $student->name }}">
                                                                            <div
                                                                                class="py-2 text-sm font-medium text-base-content/70">
                                                                                <h2
                                                                                    class="font-medium text-base-content/80">
                                                                                    <a
                                                                                        href="/profile/{{ $student->id }}">
                                                                                        {{ $student->name }}
                                                                                    </a>
                                                                                </h2>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td
                                                                    class="px-4 py-2 text-sm font-medium text-center text-base-content/70">
                                                                    {{ $consultation->consultation_date }}
                                                                </td>
                                                                <td
                                                                    class="px-4 py-2 text-sm font-medium text-center text-base-content/70 ">
                                                                    {{ $start_time }} - {{ $end_time }}
                                                                </td>
                                                                <td
                                                                    class="px-4 py-2 text-sm text-center text-base-content/50 ">
                                                                    @if ($consultation->is_approved == 'Pending')
                                                                        <span
                                                                            class="px-2 py-1 text-xs font-medium leading-4 tracking-wide text-yellow-800 bg-yellow-100 rounded-full">
                                                                            Pending
                                                                        </span>
                                                                    @elseif($consultation->is_approved == 'Approved')
                                                                        <span
                                                                            class="px-2 py-1 text-xs font-medium leading-4 tracking-wide text-green-800 bg-green-100 rounded-full">
                                                                            Approved
                                                                        </span>
                                                                    @elseif($consultation->is_approved == 'Rejected')
                                                                        <span
                                                                            class="px-2 py-1 text-xs font-medium leading-4 tracking-wide text-red-800 bg-red-100 rounded-full">
                                                                            Rejected
                                                                        </span>
                                                                    @elseif ($consultation->is_approved == 'Cancelled')
                                                                        <span
                                                                            class="px-2 py-1 text-xs font-medium leading-4 tracking-wide text-red-800 bg-red-100 rounded-full">
                                                                            Cancelled
                                                                        </span>
                                                                    @elseif ($consultation->is_approved == 'Completed')
                                                                        <span
                                                                            class="px-2 py-1 text-xs font-medium leading-4 tracking-wide text-green-800 bg-green-100 rounded-full">
                                                                            Completed
                                                                        </span>
                                                                    @endif
                                                                </td>
                                                                <td class="px-4 py-2 text-sm">
                                                                    <div
                                                                        class="flex items-center justify-end mx-4 gap-x-6">
                                                                        <form
                                                                            action="/dashboard/reviews/approve/{{ $consultation->id }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <label>
                                                                                <button
                                                                                    class="text-base-content/50 transition-colors duration-200 cursor-pointer  hover:text-error focus:outline-none">
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
                                                                            </label>
                                                                        </form>

                                                                        @if ($consultation->is_approved != 'Pending')
                                                                            <a
                                                                                href="{{ route('showConsultation', $consultation->id) }}">
                                                                                @csrf
                                                                                <label>
                                                                                    <button
                                                                                        class="text-base-content/50 transition-colors duration-200 cursor-pointer  hover:text-success focus:outline-none">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                            viewBox="0 0 24 24"
                                                                                            class="w-5 h-5"
                                                                                            stroke="currentColor"
                                                                                            id="check-circle">
                                                                                            <path fill="currentColor"
                                                                                                d="M18,10.82a1,1,0,0,0-1,1V19a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V8A1,1,0,0,1,5,7h7.18a1,1,0,0,0,0-2H5A3,3,0,0,0,2,8V19a3,3,0,0,0,3,3H16a3,3,0,0,0,3-3V11.82A1,1,0,0,0,18,10.82Zm3.92-8.2a1,1,0,0,0-.54-.54A1,1,0,0,0,21,2H15a1,1,0,0,0,0,2h3.59L8.29,14.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L20,5.41V9a1,1,0,0,0,2,0V3A1,1,0,0,0,21.92,2.62Z">
                                                                                            </path>
                                                                                        </svg>
                                                                                    </button>
                                                                                </label>
                                                                            </a>
                                                                        @endif

                                                                        @if ($consultation->is_approved == 'Approved' || $consultation->is_approved == 'Pending')
                                                                            <label
                                                                                for="delete-review-{{ $consultation->id }}"
                                                                                data-review-id="{{ $consultation->id }}"
                                                                                id="delete-review"
                                                                                class="pb-1.5 text-base-content/50 transition-colors duration-200 cursor-pointer hover:text-warning focus:outline-none">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    fill="none" viewBox="0 0 24 24"
                                                                                    stroke="currentColor"
                                                                                    class="w-5 h-5" id="times-circle">
                                                                                    <path fill="currentColor"
                                                                                        d="M15.71,8.29a1,1,0,0,0-1.42,0L12,10.59,9.71,8.29A1,1,0,0,0,8.29,9.71L10.59,12l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l2.29,2.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L13.41,12l2.3-2.29A1,1,0,0,0,15.71,8.29Zm3.36-3.36A10,10,0,1,0,4.93,19.07,10,10,0,1,0,19.07,4.93ZM17.66,17.66A8,8,0,1,1,20,12,7.95,7.95,0,0,1,17.66,17.66Z">
                                                                                    </path>
                                                                                </svg>
                                                                            </label>
                                                                        @endif
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
                </div>
            </div>
        </div>
    </div>
    {{-- modal to reject review --}}
    <script>
        const deleteReview = document.querySelectorAll('#delete-review');
        deleteReview.forEach((review) => {
            review.addEventListener('click', () => {
                const reviewId = review.getAttribute('data-review-id');
                const modal = createModal(reviewId);
                document.body.appendChild(modal);
            });
        });

        function createModal(reviewId) {
            const modal = document.createElement('div');
            modal.innerHTML = `
            <input type="checkbox" id="delete-review-${reviewId}" class="modal-toggle" />
            <label for="delete-review-${reviewId}" class="modal cursor-pointer">
        <label class="modal-box relative" for="">
            <h3 class="text-lg font-bold">Are you sure?</h3>
            <p class="py-4">Are you sure you want to delete this review?</p>
            <div class="modal-action">
                <label for="delete-review-${reviewId}" class="btn btn-ghost">Cancel</label>
                <form action="/dashboard/reviews/delete/${reviewId}" method="POST">
                    @csrf
                    <button class="btn btn-error">Delete</button>
                </form>
            </div>
        </label>
    </label>`;
            modal.addEventListener('click', (e) => {
                if (e.target.hasAttribute('data-close-modal')) {
                    modal.remove();
                }
            });
            return modal;
        }
    </script>
</x-dashboard>
