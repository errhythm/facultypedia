@php
    // check if the user is a student or faculty
    $user = Auth::user();
    $role = $user->role;
    $student = App\Models\User::find($consultation->student_id);
    $faculty = App\Models\User::find($consultation->faculty_id);
    $courses = \App\Models\Courses::all();
    $facultyCourses = \App\Models\Faculties::where('id', $faculty->id)->get();
    $slot = App\Models\ConsultationSlots::find($consultation->slot_id);
    $message = $consultation->message;
    $status = $consultation->is_approved;
    $date = $consultation->consultation_date;
    $start_time = date('h:i A', strtotime($slot->start_time));
    $end_time = date('h:i A', strtotime($slot->end_time));

    $meeting_link = $consultation->meeting_link;
    $meeting_link = 'https://moderated.jitsi.net/rest/rooms/' . $meeting_link;
    $meeting_link = file_get_contents($meeting_link);
    $meeting_link = json_decode($meeting_link);

    $faculty_link = $meeting_link->moderatorUrl;
    $student_link = $meeting_link->joinUrl;
@endphp
<x-dashboard>
    <div class="py-6">
        <div class="px-4 ml-auto mt-8 sm:px-6 md:px-8">
            <section class="px-4 py-5 sm:p-6">
                <div class="sm:flex sm:items-center sm:justify-between items-center">
                    <h2 class="text-xl font-bold text-base-content/80">{{ $heading }} - {{ $consultation->id }}</a>
                    </h2>
                    {{-- make a button to change slot --}}
                    @if ($role == 'faculty')
                        @if ($status == 'Pending' || $status == 'Approved')
                            <div class="mt-3 sm:mt-0 sm:ml-4">
                                <label for="change-slot" class="btn btn-outline btn-primary btn-xs sm:btn-sm md:btn-md">Change
                                    Slot</label>
                            </div>
                        @endif
                    @endif
                </div>
                <div class="grid lg:grid-cols-3 gap-2 mt-8">
                    <div class="max-w-3xl space-y-8">
                        <div class="border border-base-300 rounded-md overflow-hidden space-y-2 p-4">
                            {{-- name --}}
                            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-3">
                                <p class="block text-sm font-bold text-base-content sm:mt-px sm:pt-2">Name</p>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <p class="block text-sm font-medium text-base-content sm:mt-px sm:pt-2">
                                        {{ $student->name }}</p>
                                </div>
                            </div>
                            {{-- email --}}
                            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-3">
                                <p class="block text-sm font-bold text-base-content sm:mt-px sm:pt-2">Email</p>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <p class="block text-sm font-medium text-base-content sm:mt-px sm:pt-2">
                                        {{ $student->email }}</p>
                                </div>
                            </div>
                            {{-- University ID --}}
                            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-3">
                                <p class="block text-sm font-bold text-base-content sm:mt-px sm:pt-2">Student ID</p>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <p class="block text-sm font-medium text-base-content sm:mt-px sm:pt-2">
                                        {{ $student->university_id }}</p>
                                </div>
                            </div>
                            {{-- message --}}
                            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-3">
                                <p class="block text-sm font-bold text-base-content sm:mt-px sm:pt-2">Message</p>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <p class="block text-sm font-bold text-base-content sm:mt-px sm:pt-2">
                                        {{ $message }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="border border-base-300 rounded-md overflow-hidden space-y-2 p-4">
                            {{-- name --}}
                            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-3">
                                <p class="block text-sm font-bold text-base-content sm:mt-px sm:pt-2">Name</p>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <p class="block text-sm font-medium text-base-content sm:mt-px sm:pt-2">
                                        {{ $faculty->name }}</p>
                                </div>
                            </div>
                            {{-- email --}}
                            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-3">
                                <p class="block text-sm font-bold text-base-content sm:mt-px sm:pt-2">Email</p>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <p class="block text-sm font-medium text-base-content sm:mt-px sm:pt-2">
                                        {{ $faculty->email }}</p>
                                </div>
                            </div>
                            {{-- University ID --}}
                            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-3">
                                <p class="block text-sm font-bold text-base-content sm:mt-px sm:pt-2">Initial</p>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <p class="block text-sm font-medium text-base-content sm:mt-px sm:pt-2">
                                        {{ $faculty->university_id }}</p>
                                </div>
                            </div>
                            {{-- courses --}}
                            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-3">
                                <p class="block text-sm font-bold text-base-content sm:mt-px sm:pt-2">Courses</p>
                                <div class="mt-1 sm:mt-0 sm:col-span-2">
                                    <p class="block text-sm font-medium text-base-content sm:mt-px sm:pt-2 -m-3 pb-3">
                                        <x-faculty-courses :facultyCourses="$facultyCourses" :courses="$courses" />
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-4 sm:mt-0 sm:ml-8 lg:ml-12 sm:flex-1">
                        <div class="overflow-hidden text-center bg-base-100 border border-base-300 rounded-md">
                            <div class="p-4">
                                <div class="text-sm font-bold text-base-content">Join Consultation Meet</div>
                                {{-- show if the user role is faculty --}}
                                <div
                                    class="mt-1 text-xl font-bold text-error flex flex-col w-full max-w-xs gap-y-3 mx-auto">
                                    <button id="goLink" {{ $status != 'Approved' ? 'disabled' : '' }}
                                        class="mt-4 bg-primary flex gap-x-3 text-sm sm:text-base items-center justify-center text-white rounded-lg hover:bg-primary/80 duration-300 transition-colors border border-transparent px-8 py-2.5">
                                        <svg class="w-5 h-5 mx-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span>Join Consultation Meeting</span>
                                    </button>
                                    <p class="text-xs font-normal text-base-content/40 uppercase">Link to copy</p>
                                    {{-- another button to copy the link --}}
                                    <button id="copyLink" {{ $status != 'Approved' ? 'disabled' : '' }}
                                        class="bg-transparent flex text-sm sm:text-base items-center justify-center text-base-content rounded-lg duration-300 transition-colors hover:bg-base-200 border border-primary py-2.5">
                                        <svg class="w-5 h-5 mx-1 focus:animate-spin" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    @if ($status == 'Approved')
                                        <script>
                                            const goLink = document.getElementById('goLink');
                                            goLink.addEventListener('click', () => {
                                                window.open('{{ ($role == "faculty") ? $faculty_link : (($role == "student") ? $student_link : "") }}', '_blank');
                                            });
                                            const copyLink = document.getElementById('copyLink');
                                            copyLink.addEventListener('click', () => {
                                                navigator.clipboard.writeText('{{ ($role == "faculty") ? $faculty_link : (($role == "student") ? $student_link : "") }}');
                                            });
                                            // animage inside text of the button when clicked
                                            copyLink.addEventListener('click', () => {
                                                copyLink.innerHTML = 'Copied!';
                                                copyLink.classList.add('animate-pulse');
                                                setTimeout(() => {
                                                    copyLink.innerHTML =
                                                        '<svg class="w-5 h-5 mx-1 focus:animate-spin" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" /></svg>';
                                                    copyLink.classList.remove('animate-pulse');
                                                }, 1500);
                                            });
                                        </script>
                                        <p class="text-sm font-normal text-base-content/40">Do not share the above link
                                            with anyone.</p>
                                    @elseif ($status == 'Completed')
                                        <p class="text-xs font-normal text-base-content/40">You can't join the
                                            meeting because it is completed.</p>
                                    @elseif ($status == 'Cancelled')
                                        <p class="text-xs font-normal text-base-content/40">You can't join the
                                            meeting because it is cancelled.</p>
                                    @else
                                        <p class="text-xs font-normal text-base-content/40">You can't join the
                                            meeting until it is approved.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div
                            class="overflow-hidden text-center bg-base-100 border border-base-300 rounded-md divide-y divide-base-300">
                            <div class="flex h-10 px-4">
                                <div class="flex items-center justify-between flex-1">
                                    <p class="text-sm font-bold text-base-content">Date</p>
                                    <p class="text-sm font-bold text-base-content">{{ $date }}</p>
                                </div>
                            </div>

                            <div class="flex h-10 px-4 bg-base-300">
                                <div class="flex items-center justify-between flex-1">
                                    <p class="text-sm font-bold text-base-content">Status</p>
                                    <p
                                        class="px-2 py-1 text-sm font-bold leading-4 text-base-100 {{ $bgColor = $status == 'Approved' ? 'bg-success' : ($status == 'Rejected' ? 'bg-error' : ($status == 'Completed' ? 'bg-secondary' : ($status == 'Cancelled' ? 'bg-warning' : 'bg-primary'))) }} rounded">
                                        {{ $status }}
                                    </p>
                                </div>
                            </div>

                            <div class="flex h-10 px-4">
                                <div class="flex items-center justify-between flex-1">
                                    <p class="text-sm font-bold text-base-content">Time</p>
                                    <p class="text-sm font-bold text-base-content">{{ $start_time }} -
                                        {{ $end_time }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    {{-- change slot modal --}}
    <input type="checkbox" id="change-slot" class="modal-toggle" />
    <label for="change-slot" class="modal cursor-pointer">
        <label class="modal-box relative" for="">
            <div class="lg:px-8 sm:px-6 px-2">
                <div class="bg-base-100  rounded-xl overflow-hidden max-w-6xl">
                    <div class="px-3 pt-4 sm:pt-2">
                        <h3 class="text-2xl font-semibold text-center text-base-content">
                            Change Slot
                        </h3>

                        <form action="{{ route('changeConsultationSlot', $consultation->id) }}" method="POST"
                            class="mt-10">
                            @csrf
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4">
                                <div class="lg:col-span-2">
                                    <label for="" class="text-base font-medium text-base-content">
                                        Select Day
                                    </label>
                                    <div class="mt-2.5 relative">
                                        <select required
                                            class="block w-full px-4 py-3 text-sm font-normal text-base-content placeholder-base-content/50 border border-base-200 rounded-md bg-base-100/50 caret-base-content focus:ring-base-content focus:border-base-content"
                                            name="slot_id" id="timeSlot">
                                            <option value="" selected disabled>Select
                                                Time Slot</option>
                                        </select>
                                        <script>
                                            const dateField = '{{ $date }}'
                                            const timeSlotField = document.querySelector('#timeSlot');
                                            const faculty_id = '{{ $faculty->id }}';

                                            window.addEventListener('load', async () => {
                                                const date = dateField.value;
                                                const response = await fetch(`/api/slot_availability/${faculty_id}/${dateField}`);
                                                const data = await response.json();
                                                timeSlotField.innerHTML = '';
                                                // create a default option which is disabled
                                                const defaultOption = document.createElement('option');
                                                defaultOption.value = '';
                                                defaultOption.text = 'Select Time Slot';
                                                defaultOption.disabled = true;
                                                defaultOption.selected = true;
                                                timeSlotField.appendChild(defaultOption);
                                                for (const slot in data) {
                                                    const option = document.createElement('option');
                                                    option.value = data[slot].id;
                                                    option.text = `${data[slot].start_time} - ${data[slot].end_time}`;
                                                    timeSlotField.appendChild(option);
                                                }
                                            });
                                        </script>
                                    </div>
                                </div>

                                <div class="sm:col-span-2">
                                    <button type="submit"
                                        class="inline-flex items-center justify-center w-full px-4 py-4 mt-2 text-base font-semibold text-base-100 transition-all duration-200 bg-primary border border-transparent rounded-md focus:outline-none hover:bg-primary focus:bg-primary">
                                        Submit
                                    </button>
                                </div>
                        </form>

                        {{-- You can only change slot for the given day, otherwise cancel the Consultation --}}
                        <div class="sm:col-span-2 text-center">
                            <p class="mt-4 text-xs font-light text-base-content/60">You can only change slot for the given
                                day, otherwise cancel the Consultation</p>
                        </div>
                        <div class="sm:col-span-2">
                            @if ($status == 'Pending' || $status == 'Approved')
                                <form action="{{ route('rejectConsultation', $consultation->id) }}" method="post">
                                    <button type="button"
                                        class="inline-flex items-center justify-center w-full px-4 py-4 mt-2 text-base font-semibold text-base-100 transition-all duration-200 bg-error border border-transparent rounded-md focus:outline-none hover:bg-error focus:bg-error">
                                        Cancel Consultation
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </label>
    </label>
</x-dashboard>
