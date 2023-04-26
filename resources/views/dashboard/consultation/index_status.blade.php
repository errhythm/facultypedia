@php
    $user = Auth::user();
    $role = $user->role;
    $page = request()->query('page') ?? 1;
    $page_count = $consultations->lastPage();
    $per_page = $consultations->perPage();
    $total = $consultations->total();
    $query = '';

    $route = Route::currentRouteName();
    $query = explode('&', $query);
    $query = array_filter($query, function ($item) {
        return !str_contains($item, 'page');
    });
    $query = implode('&', $query);
    $query = $query ? $query . '&' : $query;

@endphp

@if ($page != 1 && $consultations->isEmpty())
    @php
        header('Location: ' . route($route, '?' . $query . 'page=' . $page_count));
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
                    {{-- Text "showing 3 out of 9" --}}
                    <p class="text-sm text-base-content/60">
                        Showing {{ $consultations->firstItem() }} to {{ $consultations->lastItem() }} out of
                        {{ $consultations->total() }} results
                    </p>
                </div>

                <div class="flex flex-col mt-6">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden border border-base-content/20  md:rounded-lg">
                                <table id="pending-consultation" class="min-w-full divide-y divide-base-content/20">
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
                                        @if (count($consultations) == 0)
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
                                                        <div class="py-2 text-sm font-medium text-base-content/70">
                                                            You have no pending consultations
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($consultations as $consultation)
                                                @php
                                                    // get faculty name from the $consultation->faculty_id by searching the faculty model with the id
                                                    $student = App\Models\User::find($consultation->student_id);
                                                    $slot = App\Models\ConsultationSlots::find($consultation->slot_id);

                                                    // get the slots start time and end time and make it in 12 hour format
                                                    $start_time = date('h:i A', strtotime($slot->start_time));
                                                    $end_time = date('h:i A', strtotime($slot->end_time));
                                                @endphp
                                                <tr>
                                                    <td class="px-4 py-2 text-sm font-medium text-base-content/70">
                                                        <div class="inline-flex items-center gap-x-3">
                                                            <div class="flex items-center gap-x-2">
                                                                <img class="object-cover w-10 h-10 rounded-full"
                                                                    src="https://api.dicebear.com/5.x/bottts-neutral/svg?seed={{ md5($student->id . $student->created_at) }}&scale=110"
                                                                    alt="{{ $student->name }}">
                                                                <div
                                                                    class="py-2 text-sm font-medium text-base-content/70">
                                                                    <h2 class="font-medium text-base-content/80">
                                                                        <a href="/profile/{{ $student->id }}">
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
                                                    <td class="px-4 py-2 text-sm text-center text-base-content/50 ">
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
                                                        <div class="flex items-center justify-end mx-4 gap-x-6">
                                                            @if ($consultation->is_approved == 'Pending' && $role == 'faculty')
                                                            <form
                                                                action="/dashboard/reviews/approve/{{ $consultation->id }}"
                                                                method="POST">
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
                                                            @endif

                                                            @if ($consultation->is_approved != 'Pending')
                                                            <a
                                                            @if ($role == 'student')
                                                                href="{{ route('showConsultation_student', $consultation->id) }}"
                                                                @elseif ($role == 'faculty')
                                                                href="{{ route('showConsultation', $consultation->id) }}">
                                                            @endif
                                                                @csrf
                                                                <label>
                                                                    <button
                                                                        class="text-base-content/50 transition-colors duration-200 cursor-pointer  hover:text-success focus:outline-none">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 24 24" class="w-5 h-5"
                                                                            stroke="currentColor" id="check-circle">
                                                                            <path fill="currentColor"
                                                                                d="M18,10.82a1,1,0,0,0-1,1V19a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V8A1,1,0,0,1,5,7h7.18a1,1,0,0,0,0-2H5A3,3,0,0,0,2,8V19a3,3,0,0,0,3,3H16a3,3,0,0,0,3-3V11.82A1,1,0,0,0,18,10.82Zm3.92-8.2a1,1,0,0,0-.54-.54A1,1,0,0,0,21,2H15a1,1,0,0,0,0,2h3.59L8.29,14.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L20,5.41V9a1,1,0,0,0,2,0V3A1,1,0,0,0,21.92,2.62Z">
                                                                            </path>
                                                                        </svg>
                                                                    </button>
                                                                </label>
                                                            </a>
                                                            @endif

                                                            @if ($consultation->is_approved == 'Approved' || $consultation->is_approved == 'Pending')
                                                            <label for="delete-consultation-{{ $consultation->id }}"
                                                                data-consultation-id="{{ $consultation->id }}"
                                                                id="delete-consultation"
                                                                class="pb-1.5 text-base-content/50 transition-colors duration-200 cursor-pointer hover:text-warning focus:outline-none">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor"
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

    {{-- modal to reject consultation --}}
    <script>
        const deleteReview = document.querySelectorAll('#delete-consultation');
        deleteReview.forEach((consultation) => {
            consultation.addEventListener('click', () => {
                const consultationId = consultation.getAttribute('data-consultation-id');
                const modal = createModal(consultationId);
                document.body.appendChild(modal);
            });
        });

        function createModal(consultationId) {
            const modal = document.createElement('div');
            const role = "{{ $role }}";
            const action = role == 'student' ? 'cancel' : 'reject';
            modal.innerHTML = `
            <input type="checkbox" id="delete-consultation-${consultationId}" class="modal-toggle" />
            <label for="delete-consultation-${consultationId}" class="modal cursor-pointer">
        <label class="modal-box relative" for="">
            <h3 class="text-lg font-bold">Are you sure?</h3>
            <p class="py-4">Are you sure you want to ${action} this consultation?</p>
            <div class="modal-action">
                <label for="delete-consultation-${consultationId}" class="btn btn-ghost">Cancel</label>
                <form action="/dashboard/${role}/consultation/reject/${consultationId}" method="POST">
                    @csrf
                    <button class="btn btn-error">${action}</button>
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
