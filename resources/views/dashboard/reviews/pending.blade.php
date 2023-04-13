@php
                $page = request()->query('page') ?? 1;
                $page_count = $pendingReviews->lastPage();
                $per_page = $pendingReviews->perPage();
                $total = $pendingReviews->total();
            @endphp
@if ($page != 1 && $pendingReviews->isEmpty())
    <script>
        window.location.href = "?page={{$page_count}}";
    </script>
@endif

<x-dashboard>
    <div class="py-6">
        <div class="px-4 ml-auto mt-8 sm:px-6 md:px-8">
            {{-- Table --}}

            <section class="px-4 py-5 sm:p-6">
                <div class="sm:flex sm:items-center sm:justify-between items-center">
                    <h2 class="text-xl font-bold text-base-content/80">{{ $heading }}</h2>
                    <a href="#"><span class="px-3 py-1 text-xs text-warning-content bg-warning rounded-full">
                            {{ $pendingReviewsCount }} {{ __('Pending Reviews') }}
                        </span></a>
                </div>

                <div class="flex flex-col mt-6">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden border border-base-content/20  md:rounded-lg">
                                <table id="pending-review" class="min-w-full divide-y divide-base-content/20">
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

                                                    <svg class="h-3" viewBox="0 0 10 11" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M2.13347 0.0999756H2.98516L5.01902 4.79058H3.86226L3.45549 3.79907H1.63772L1.24366 4.79058H0.0996094L2.13347 0.0999756ZM2.54025 1.46012L1.96822 2.92196H3.11227L2.54025 1.46012Z"
                                                            fill="currentColor" stroke="currentColor"
                                                            stroke-width="0.1" />
                                                        <path
                                                            d="M0.722656 9.60832L3.09974 6.78633H0.811638V5.87109H4.35819V6.78633L2.01925 9.60832H4.43446V10.5617H0.722656V9.60832Z"
                                                            fill="currentColor" stroke="currentColor"
                                                            stroke-width="0.1" />
                                                        <path
                                                            d="M8.45558 7.25664V7.40664H8.60558H9.66065C9.72481 7.40664 9.74667 7.42274 9.75141 7.42691C9.75148 7.42808 9.75146 7.42993 9.75116 7.43262C9.75001 7.44265 9.74458 7.46304 9.72525 7.49314C9.72522 7.4932 9.72518 7.49326 9.72514 7.49332L7.86959 10.3529L7.86924 10.3534C7.83227 10.4109 7.79863 10.418 7.78568 10.418C7.77272 10.418 7.73908 10.4109 7.70211 10.3534L7.70177 10.3529L5.84621 7.49332C5.84617 7.49325 5.84612 7.49318 5.84608 7.49311C5.82677 7.46302 5.82135 7.44264 5.8202 7.43262C5.81989 7.42993 5.81987 7.42808 5.81994 7.42691C5.82469 7.42274 5.84655 7.40664 5.91071 7.40664H6.96578H7.11578V7.25664V0.633865C7.11578 0.42434 7.29014 0.249976 7.49967 0.249976H8.07169C8.28121 0.249976 8.45558 0.42434 8.45558 0.633865V7.25664Z"
                                                            fill="currentColor" stroke="currentColor"
                                                            stroke-width="0.3" />
                                                    </svg>
                                                </button>
                                            </th>

                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-base-content/50">
                                                <button class="flex items-center gap-x-2">
                                                    <span>Rating</span>

                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
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
                                    <tbody class="bg-base-100/50 divide-y divide-base-content/20 ">
                                        {{-- print in pending reviews in each row --}}

                                        {{-- if pendingReviews is 0, then show a big table row with a check sign in middle and next line You have no pending reviews --}}
                                        @if (count($pendingReviews) == 0)
                                            <tr>
                                                <td colspan="4"
                                                    class="px-4 py-20 mx-auto text-sm font-medium text-base-content/70">
                                                    <div class="flex items-center justify-center gap-x-3">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-10 w-10 text-green-500" viewBox="0 0 20 20"
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
                                                    <td class="px-4 py-2 text-sm font-medium text-base-content/70">
                                                        <div class="inline-flex items-center gap-x-3">
                                                            <div class="flex items-center gap-x-2">
                                                                <img class="object-cover w-10 h-10 rounded-full"
                                                                    src="https://api.dicebear.com/5.x/bottts-neutral/svg?seed={{ md5($student->id . $student->created_at) }}&scale=110"
                                                                    alt="{{ $student->name }}>
                                                                                <div
                                                                                    class="py-2
                                                                    text-sm font-medium text-base-content/70">
                                                                <h2 class="font-medium text-base-content/80">
                                                                    <a href="/profile/{{ $student->id }}">
                                                                    {{ $student->name }}</h2></a>
                                                                    {{-- if the review is anonymous show a sign --}}
                                                                    @if ($review->isAnonymous == 1)
                                                                        <div class="text-base-content/50 tooltip" data-tip="Anonymous Review">
                                                                            <i class="uil uil-shield-exclamation"></i>
                                                                        </div>
                                                                    @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-8 py-2 text-sm font-medium text-base-content/70">
                                                        <a href="/profile/{{ $faculty->id }}">{{ $faculty->name }}</a>
                                                    </td>
                                                    <td class="px-4 py-2 text-sm text-center text-base-content/50 ">
                                                        {{ $review->rating }}</td>
                                                    <td class="px-4 py-2 text-sm text-base-content/50 ">
                                                        {{ $review->review }}</td>
                                                    <td class="px-4 py-2 text-sm">
                                                        <div class="flex items-center gap-x-6">
                                                            <form action="/dashboard/reviews/approve/{{ $review->id }}" method="POST">
                                                                @csrf
                                                                <label>
                                                                    <button
                                                                class="text-base-content/50 transition-colors duration-200 cursor-pointer  hover:text-error focus:outline-none">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 24 24" class="w-5 h-5"
                                                                    stroke="currentColor" id="check-circle">
                                                                    <path fill="currentColor"
                                                                        d="M14.72,8.79l-4.29,4.3L8.78,11.44a1,1,0,1,0-1.41,1.41l2.35,2.36a1,1,0,0,0,.71.29,1,1,0,0,0,.7-.29l5-5a1,1,0,0,0,0-1.42A1,1,0,0,0,14.72,8.79ZM12,2A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8,8,0,0,1,12,20Z">
                                                                    </path>
                                                                </svg>
                                                                </button>
                                                            </label>
                                                            </form>


                                                            <label for="delete-review-{{ $review->id }}" data-review-id="{{ $review->id }}" id="delete-review"
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
                            <a href="?page={{ $page - 1 }}"
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
                                <a href="?page={{ $pages }}"
                                    class="inline-flex items-center justify-center text-base font-semibold ik transition-all duration-200 mh border gh rounded-md sm:text-sm w-9 h-9">
                                    {{ $pages }}
                                </a>
                            @else
                                <a href="?page={{ $pages }}"
                                    class="inline-flex items-center justify-center text-base font-semibold text-base-content transition-all duration-200 bg-base-100 border border-neutral-content rounded-md sm:text-sm w-9 h-9 hover:bg-base-300">
                                    {{ $pages }}
                                </a>
                            @endif
                        @endforeach

                        @if ($page_count != $page)
                            <a href="?page={{ $page + 1 }}"
                                class="inline-flex items-center justify-center text-base-content transition-all duration-200 bg-base-100 border border-neutral-content rounded-md w-9 h-9 hover:bg-base-300">
                                <span class="sr-only">Next</span>
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        @endif

                        {{-- if page is more than 1 then show last page button but dont show if you are already on last page --}}

                        @if ($page_count > 1 && $page != $page_count)
                            <a href="?page={{ $page_count }}"
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
