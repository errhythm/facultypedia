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
                                    X
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-base-100 border border-base-content rounded-xl">
                        <div class="px-5 py-4">
                            <p class="text-xs font-medium tracking-wider text-base-content/80 uppercase">
                                Total Consultations
                            </p>
                            <div class="flex items-center mt-3">
                                <p class="text-xl font-bold text-base-content/80">
                                    X
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
                                            <table id="user-review"
                                                class="min-w-full divide-y divide-base-content/20">
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
                                                                        class="h-10 w-10 text-green-500"
                                                                        viewBox="0 0 20 20" fill="currentColor">
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
                                                        @foreach ($reviews as $review)
                                                            @php
                                                                $faculty = App\Models\User::find($review->faculty_id);
                                                                // get the course code from the course_id
                                                                $course = App\Models\Courses::find($review->course_id);
                                                            @endphp
                                                    <tr>
                                                    <td class="px-8 py-2 text-sm font-medium text-base-content/70">
                                                        <a href="/profile/{{ $faculty->id }}">{{ $faculty->name }}</a>
                                                    </td>
                                                    <td class="px-6 py-2 text-sm text-base-content/50 ">
                                                        {{ $course->course_code }}</td>
                                                    <td class="px-6 py-2 text-sm text-base-content/50 ">
                                                        {{ $review->rating }}</td>
                                                    <td class="px-4 py-2 text-sm text-base-content/50 ">
                                                        {{ $review->review }}</td>
                                                    <td class="px-4 py-2 text-sm">
                                                        <div class="flex items-center gap-x-6">
                                                            <label for="delete-review-{{ $review->id }}" data-review-id="{{ $review->id }}" id="delete-review"
                                                                class="pb-1.5 text-base-content/50 transition-colors duration-200 cursor-pointer hover:text-warning focus:outline-none">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor"
                                                                    class="w-5 h-5" id="times-circle">
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
                    <div class="overflow-hidden bg-base-100 border border-base-content/80 rounded-xl lg:col-span-2">
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
                                            ->where('isDeleted', '!=', '1')
                                            ->where('isApproved', '!=', '0')
                                            ->where('rating', '>', 3)
                                            ->count();
                                        // get the total number of reviews of this faculty where rating value is less than 3
                                        $negReviews = DB::table('reviews')
                                            ->where('faculty_id', $faculty->faculty_id)
                                            ->where('isDeleted', '!=', '1')
                                            ->where('isApproved', '!=', '0')
                                            ->where('rating', '<', 3)
                                            ->count();
                                        // get the total number of reviews of this faculty
                                        $totalReviews = DB::table('reviews')
                                            ->where('faculty_id', $faculty->faculty_id)
                                            ->where('isDeleted', '!=', '1')
                                            ->where('isApproved', '!=', '0')
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
                <div class="overflow-hidden bg-base-100 border border-base-content/80 rounded-xl lg:col-span-4">
                </div>
                {{-- column 2 --}}
                <div class="overflow-hidden bg-base-100 border border-base-content/80 rounded-xl lg:col-span-2">
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
