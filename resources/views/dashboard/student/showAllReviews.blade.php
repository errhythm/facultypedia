@php
    $page = request()->query('page') ?? 1;
    $page_count = $reviews->lastPage();
    $per_page = $reviews->perPage();
    $total = $reviews->total();
    $query = '';
    if (request('rsearch')) {
        $query = http_build_query([
            'rsearch' => request('rsearch'),
        ]);
    }
    // get current route
    $route = Route::currentRouteName();
    // break the query string into array
    $query = explode('&', $query);
    // remove page from query string
    $query = array_filter($query, function ($item) {
        return !str_contains($item, 'page');
    });
    // convert array to string
    $query = implode('&', $query);

    $query = $query ? $query . '&' : $query;
@endphp
@if ($page != 1 && $reviews->isEmpty())
    @php
        header('Location: ' . route($route, $query . 'page=' . $page_count));
        exit();
    @endphp
@endif

<x-dashboard>
    <div class="py-6">
        <div class="px-4 ml-auto mt-8 sm:px-6 md:px-8">
            {{-- Table --}}

            <section class="px-4 py-5 sm:p-6">
                <div class="flex sm:items-center justify-between items-center">
                    <h2 class="text-xl font-bold text-base-content/80">{{ $heading }}</h2>
                    <div
                        class="relative flex items-center lg:w-1/6 w-64 h-12 rounded-lg focus-within:shadow-lg bg-base-200 focus-within:border-primary border overflow-hidden">
                        <div class="grid place-items-center h-full w-12 text-base-content/30">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <form action="{{ route('reviews') }}" method="get">
                            <input class="peer h-full w-full outline-none text-sm text-base-content/70 bg-base-200 pr-2"
                                type="text" id="rsearch" name="rsearch" value="{{ request('rsearch') }}"
                                placeholder="Search something.." />
                        </form>
                    </div>
                </div>

                <div class="flex flex-col mt-6">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden border border-base-content/20  md:rounded-lg">
                                <table id="pending-review" class="min-w-full divide-y divide-base-content/20">
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

                                        {{-- if reviews is 0, then show a big table row with a check sign in middle and next line You have no pending reviews --}}
                                        @if (count($reviews) == 0)
                                            <tr>
                                                <td colspan="4"
                                                    class="px-4 py-20 mx-auto text-sm font-medium text-base-content/70">
                                                    <div class="flex items-center justify-center gap-x-3">

                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-10 w-10 text-error" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>


                                                        <div
                                                            class="py-2
                                                                                text-sm font-medium
                                                                                text-base-content/70">
                                                            No reviews found!
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($reviews as $review)
                                                @php
                                                    // get faculty name from the $review->faculty_id by searching the faculty model with the id
                                                    $faculty = App\Models\User::find($review->faculty_id);

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
                                                            <label for="delete-review-{{ $review->id }}"
                                                                data-review-id="{{ $review->id }}"
                                                                id="delete-review"
                                                                class="pb-1.5 text-base-content/50 transition-colors duration-200 cursor-pointer hover:text-warning focus:outline-none">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor"
                                                                    class="w-5 h-5" id="times-circle">
                                                                    <path fill="currentColor"
                                                                        d="M15.71,8.29a1,1,0,0,0-1.42,0L12,10.59,9.71,8.29A1,1,0,0,0,8.29,9.71L10.59,12l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l2.29,2.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L13.41,12l2.3-2.29A1,1,0,0,0,15.71,8.29Zm3.36-3.36A10,10,0,1,0,4.93,19.07,10,10,0,1,0,19.07,4.93ZM17.66,17.66A8,8,0,1,1,20,12,7.95,7.95,0,0,1,17.66,17.66Z">
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
            {{-- table end --}}
            <div class="py-12 bg-base-100 sm:py-16">
                <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">
                    <div class="flex items-center justify-center space-x-2">
                        @if ($page != 1)
                            <a href="?{{ $query }}page={{ $page - 1 }}"
                                class="inline-flex items-center justify-center text-base-content transition-all duration-200 bg-base-100 border border-neutral-content rounded-md w-9 h-9 hover:bg-base-300">
                                <span class="sr-only">Previous</span>
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </a>
                        @endif


                        @foreach (range(1, $page_count) as $pages)
                            @if ($page == $pages)
                                <a href="?{{ $query }}page={{ $pages }}"
                                    class="inline-flex items-center justify-center text-base font-semibold ik transition-all duration-200 mh border gh rounded-md sm:text-sm w-9 h-9">
                                    {{ $pages }}
                                </a>
                            @else
                                <a href="?{{ $query }}page={{ $pages }}"
                                    class="inline-flex items-center justify-center text-base font-semibold text-base-content transition-all duration-200 bg-base-100 border border-neutral-content rounded-md sm:text-sm w-9 h-9 hover:bg-base-300">
                                    {{ $pages }}
                                </a>
                            @endif
                        @endforeach

                        @if ($page_count != $page)
                            <a href="?{{ $query }}page={{ $page + 1 }}"
                                class="inline-flex items-center justify-center text-base-content transition-all duration-200 bg-base-100 border border-neutral-content rounded-md w-9 h-9 hover:bg-base-300">
                                <span class="sr-only">Next</span>
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        @endif

                        @if ($page_count > 1 && $page != $page_count)
                            <a href="?{{ $query }}page={{ $page_count }}"
                                class="inline-flex items-center justify-center text-base-content transition-all duration-200 bg-base-100 border border-neutral-content rounded-md w-9 h-9 hover:bg-base-300">
                                <span class="sr-only">Last</span>
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        @endif
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
