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
                                <a href="{{ route('pendingReviews') }}"><span
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
                                                                <td class="px-4 py-2 text-sm text-center text-base-content/50 ">
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
