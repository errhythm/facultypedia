@php
    $query = '';
    $page = 1;
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

<x-dashboard>
    <div class="py-6">
        <div class="px-4 ml-auto mt-8 sm:px-6 md:px-8">
            {{-- Table --}}
            <section class="px-4 py-5 sm:p-6">
                <div class="flex sm:items-center justify-between items-center">
                    <h2 class="text-xl font-bold text-base-content/80">{{ $pendingHeading }}</h2>
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
                                        @if (count($pendingConsultations) == 0)
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
                                                            You have no {{ $pendingHeading }}.
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($pendingConsultations as $pendingConsultation)
                                                @php
                                                    // get faculty name from the $pendingConsultation->faculty_id by searching the faculty model with the id
                                                    $student = App\Models\User::find($pendingConsultation->student_id);
                                                    $slot = App\Models\ConsultationSlots::find($pendingConsultation->slot_id);

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
                                                        {{ $pendingConsultation->consultation_date }}
                                                    </td>
                                                    <td
                                                        class="px-4 py-2 text-sm font-medium text-center text-base-content/70 ">
                                                        {{ $start_time }} - {{ $end_time }}
                                                    </td>
                                                    <td class="px-4 py-2 text-sm text-center text-base-content/50 ">
                                                        @if ($pendingConsultation->is_approved == 'Pending')
                                                            <span
                                                                class="px-2 py-1 text-xs font-medium leading-4 tracking-wide text-yellow-800 bg-yellow-100 rounded-full">
                                                                Pending
                                                            </span>
                                                        @elseif($pendingConsultation->is_approved == 'Approved')
                                                            <span
                                                                class="px-2 py-1 text-xs font-medium leading-4 tracking-wide text-green-800 bg-green-100 rounded-full">
                                                                Approved
                                                            </span>
                                                        @elseif($pendingConsultation->is_approved == 'Rejected')
                                                            <span
                                                                class="px-2 py-1 text-xs font-medium leading-4 tracking-wide text-red-800 bg-red-100 rounded-full">
                                                                Rejected
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td class="px-4 py-2 text-sm">
                                                        <div class="flex items-center gap-x-6">
                                                            <form
                                                                action="/dashboard/faculty/consultation/approve/{{ $pendingConsultation->id }}"
                                                                method="POST">
                                                                @csrf
                                                                <label>
                                                                    <button
                                                                        class="text-base-content/50 transition-colors duration-200 cursor-pointer  hover:text-success focus:outline-none">
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


                                                            <label for="delete-consultation-{{ $pendingConsultation->id }}"
                                                                data-consultation-id="{{ $pendingConsultation->id }}"
                                                                id="delete-consultation"
                                                                class="pb-1.5 text-base-content/50 transition-colors duration-200 cursor-pointer hover:text-error focus:outline-none">
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

            <section class="px-4 py-5 sm:p-6">
                <div class="flex sm:items-center justify-between items-center">
                    <h2 class="text-xl font-bold text-base-content/80">{{ $approvedHeading }}</h2>
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
                                                <span>Time Left</span>
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
                                                            You have no {{ $approvedHeading }}.
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

                                                    <td
                                                        class="px-4 py-2 text-sm font-medium text-center text-base-content/70 ">
                                                        @php
                                                            // get the time left for the consultation in hours and minutes and seconds
                                                            $time_left = strtotime($consultation->consultation_date . ' ' . $slot->start_time) - strtotime(date('Y-m-d H:i:s'));
                                                            $hours = floor($time_left / 3600);
                                                            $minutes = floor(($time_left / 60) % 60);
                                                        @endphp

                                                        @if ($time_left > 0)
                                                            <span
                                                                class="px-2 py-1 text-xs font-medium leading-4 tracking-wide text-green-800 bg-green-100 rounded-full">
                                                                {{ $hours }}h {{ $minutes }}m
                                                            </span>
                                                        @else
                                                            <span
                                                                class="px-2 py-1 text-xs font-medium leading-4 tracking-wide text-red-800 bg-red-100 rounded-full">
                                                                Expired
                                                            </span>
                                                        @endif
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
                                                        @endif
                                                    </td>
                                                    <td class="px-4 py-2 text-sm">
                                                        <div class="flex items-center gap-x-6">
                                                            <a
                                                                href="{{ route('showConsultation', $consultation->id) }}">
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


                                                            <label for="delete-consultation-{{ $consultation->id }}"
                                                                data-consultation-id="{{ $consultation->id }}"
                                                                id="delete-consultation"
                                                                class="pb-1.5 text-base-content/50 transition-colors duration-200 cursor-pointer hover:text-error focus:outline-none">
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

        </div>
    </div>

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
            modal.innerHTML = `
            <input type="checkbox" id="delete-consultation-${consultationId}" class="modal-toggle" />
            <label for="delete-consultation-${consultationId}" class="modal cursor-pointer">
        <label class="modal-box relative" for="">
            <h3 class="text-lg font-bold">Are you sure?</h3>
            <p class="py-4">Are you sure you want to reject this consultation?</p>
            <div class="modal-action">
                <label for="delete-consultation-${consultationId}" class="btn btn-ghost">Cancel</label>
                <form action="/dashboard/faculty/consultation/reject/${consultationId}" method="POST">
                    @csrf
                    <button class="btn btn-error">Reject</button>
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
