@php
    // get total reviews of the user who is logged in which is approved and not deleted
    $user_reviews = \App\Models\Reviews::where('user_id', Auth::user()->id)
        ->where('isApproved', 1)
        ->where('isDeleted', 0)
        ->orderBy('created_at', 'desc')
        ->get();
    $totalUserReviews = $user_reviews->count();

    // get total pending reviews of the user who is logged in
    $user_pending_reviews = \App\Models\Reviews::where('user_id', Auth::user()->id)
        ->where('isApproved', 0)
        ->where('isDeleted', 0)
        ->get();
    $totalUserPendingReviews = $user_pending_reviews->count();


    // get the Approved consultation requests of the logged in faculty
    $approvedConsultationRequests = \App\Models\Consultations::where('student_id', Auth::user()->id)
        ->where('is_approved', 'Approved')
        ->orderBy('complete_time', 'asc')
        ->count();


    // get the pending consultation requests of the logged in faculty
    $pendingConsultationRequests = \App\Models\Consultations::where('student_id', Auth::user()->id)
        ->where('is_approved', 'Pending')
        ->orderBy('complete_time', 'asc')
        ->count();

@endphp

<x-dashboard>
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
                                    {{ $totalUserPendingReviews }}
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
                                    {{ $totalUserReviews }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-base-100 border border-base-content rounded-xl">
                        <div class="px-5 py-4">
                            <p class="text-xs font-medium tracking-wider text-base-content/80 uppercase">
                                Scheduled Consultations
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
                        // get 3 from $user_reviews
                        $reviews = $user_reviews->take(3);
                    @endphp
                    <div class="overflow-hidden bg-base-100 border border-base-content/80 rounded-xl lg:col-span-4">
                        <section class="px-4 py-5 sm:p-6">
                            <div class="sm:flex sm:items-center sm:justify-between items-center">
                                <h2 class="text-base font-bold text-base-content/80">Your Reviews
                                </h2>
                                <a href="{{ route('studentReviews') }}"><span
                                        class="px-3 py-1 text-xs text-warning-content bg-warning rounded-full">
                                        See all
                                    </span></a>
                            </div>

                            <div class="flex flex-col mt-6">
                                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                        <div class="overflow-hidden border border-base-content/20  md:rounded-lg">
                                            <table id="user-review" class="min-w-full divide-y divide-base-content/20">
                                                <thead class="bg-base-300">
                                                    <tr>
                                                        <th scope="col"
                                                            class="px-8 py-3.5 text-sm font-normal text-left rtl:text-right text-base-content/50 whitespace-nowrap">
                                                            <span class="flex items-center gap-x-2">
                                                                Faculty Name
                                                            </span>
                                                        </th>


                                                        <th scope="col"
                                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-base-content/50">
                                                            <span class="flex items-center gap-x-2">
                                                                Course Name
                                                            </span>
                                                        </th>

                                                        <th scope="col"
                                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-base-content/50">
                                                            <span class="flex items-center gap-x-2">
                                                                Rating
                                                            </span>
                                                        </th>

                                                        <th scope="col"
                                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-base-content/50">
                                                            Review</th>

                                                        <th scope="col" class="relative py-3.5 px-4">
                                                            <span class="sr-only">Edit</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-base-100/50 divide-y divide-base-content/20 ">
                                                    {{-- print in pending reviews in each row --}}

                                                    {{-- if pendingReviews is 0, then show a big table row with a check sign in middle and next line You have no pending reviews --}}
                                                    @if (count($reviews) == 0)
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
                                                        @foreach ($reviews as $review)
                                                            @php
                                                                $faculty = App\Models\User::find($review->faculty_id);
                                                                // get the course code from the course_id
                                                                $course = App\Models\Courses::find($review->course_id);
                                                            @endphp
                                                            <tr>
                                                                <td
                                                                    class="px-8 py-2 text-sm font-medium text-base-content/70">
                                                                    <a
                                                                        href="/profile/{{ $faculty->id }}">{{ $faculty->name }}</a>
                                                                </td>
                                                                <td class="px-6 py-2 text-sm text-base-content/50 ">
                                                                    {{ $course->course_code }}</td>
                                                                <td class="px-6 py-2 text-sm text-base-content/50 ">
                                                                    {{ $review->rating }}</td>
                                                                <td class="px-4 py-2 text-sm text-base-content/50 ">
                                                                    {{ $review->review }}</td>
                                                                <td class="px-4 py-2 text-sm">
                                                                    <div class="flex items-center gap-x-6">
                                                                        <label for="delete-review-{{ $review->id }}"
                                                                            data-review-id="{{ $review->id }}"
                                                                            id="delete-review"
                                                                            class="pb-1.5 text-base-content/50 transition-colors duration-200 cursor-pointer hover:text-warning focus:outline-none">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 24 24"
                                                                                stroke="currentColor" class="w-5 h-5"
                                                                                id="times-circle">
                                                                                <path fill="currentColor"
                                                                                    d="M20,6H16V5a3,3,0,0,0-3-3H11A3,3,0,0,0,8,5V6H4A1,1,0,0,0,4,8H5V19a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,5a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1V6H10Zm7,14a1,1,0,0,1-1,1H8a1,1,0,0,1-1-1V8H17Z">
                                                                                </path>
                                                                            </svg>
                                                                        </label>
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
                        $approvedConsultations = \App\Models\Consultations::where('student_id', Auth::user()->id)
                            ->where('is_approved', 'Approved')
                            ->orderBy('consultation_date', 'asc')
                            ->orderBy('complete_time', 'desc')
                            ->take(1)
                            ->get();
                    @endphp
                    <div class="overflow-hidden bg-base-100 border border-base-content/80 rounded-xl lg:col-span-2 row-span-2">
                        <div class="px-4 py-5 sm:p-6 space-y-5">
                            <div class="sm:flex sm:items-center sm:justify-between items-center">
                                <p class="text-base font-bold text-base-content/80">Upcoming Consultation
                                </p>
                            </div>
                            @if ($approvedConsultations->count() == 0)
                                <div class="flex flex-col items-center justify-center mt-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-16 h-16"
                                        stroke="currentColor">
                                        <path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                                        </path>
                                    </svg>
                                    <p class="mt-2 text-base font-semibold text-base-content/80">No Upcoming Consultation
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
                                        <p class="text-xs text-base-content/50">{{ $consultation->consultation_date }} - {{ $slot->day_of_week }}</p>
                                        <h2 class="card-title text-base">{{ $start_time }} to {{ $end_time }}</h2>
                                        <p class="text-base-content/80">{{ $student->name }} <span class="font-medium">({{ $student->university_id }})</span></p>
                                        <p class="text-base-content/80">{{ $student->email }}</p>
                                        <p class="font-semibold text-base-content/80">Message: <span class="font-normal text-base-content/80">{{ $message }}</span></p>
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
                <form action="dashboard/student/reviews/delete/${reviewId}" method="POST">
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
