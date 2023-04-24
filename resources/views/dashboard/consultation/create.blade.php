@php
    $page = request()->query('page') ?? 1;
    $page_count = $consultationSlots->lastPage();
    $per_page = $consultationSlots->perPage();
    $total = $consultationSlots->total();

    // get current route
    $route = Route::currentRouteName();
    $query = request()->getQueryString();
    $query = explode('&', $query);
    $query = array_filter($query, function ($item) {
        return !str_contains($item, 'page');
    });
    $query = implode('&', $query);
    $query = $query ? $query . '&' : $query;
@endphp

@if ($page != 1 && $consultationSlots->isEmpty())
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
                    <div>
                        <label for="add-slot"
                            class="btn bg-primary-content/5 hover:bg-primary-content gap-2 border-primary-content/10 hover:border-primary-content text-primary-content hover:text-base-100 rounded-md w-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>

                            Add Slot
                        </label>
                    </div>
                </div>

                <div class="flex flex-col mt-6">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden border border-base-content/20  md:rounded-lg">
                                <table id="pending-slot" class="min-w-full divide-y divide-base-content/20">
                                    <thead class="bg-base-300">
                                        <tr>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-sm font-normal text-left rtl:text-right text-base-content/50 whitespace-nowrap">
                                                <span class="flex items-center gap-x-2">
                                                    ID
                                                </span>
                                            </th>
                                            <th scope="col"
                                                class="px-8 py-3.5 text-sm font-normal text-left rtl:text-right text-base-content/50 whitespace-nowrap">
                                                <span class="flex items-center gap-x-2">
                                                    Day
                                                </span>
                                            </th>

                                            <th scope="col"
                                                class="px-8 py-3.5 text-sm font-normal text-left rtl:text-right text-base-content/50">
                                                <span class="flex items-center gap-x-2">
                                                    Time
                                                </span>
                                            </th>

                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-base-content/50">
                                                <span class="flex items-center gap-x-2">
                                                    Status
                                                </span>
                                            </th>

                                            <th scope="col" class="relative py-3.5 px-4">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-base-100/50 divide-y divide-base-content/20 ">
                                        {{-- print in pending reviews in each row --}}

                                        {{-- if reviews is 0, then show a big table row with a check sign in middle and next line You have no pending reviews --}}
                                        @if (count($consultationSlots) == 0)
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
                                                            Please add consultation slots to start accepting
                                                            consultations.
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($consultationSlots as $slots)
                                                @php
                                                    // // get faculty name from the $slot->faculty_id by searching the faculty model with the id
                                                    // $faculty = App\Models\User::find($slot->faculty_id);

                                                    // $course = App\Models\Courses::find($slot->course_id);

                                                    $start_time_raw = $slots->start_time;
                                                    $end_time_raw = $slots->end_time;

                                                    $start_time = date('h:i A', strtotime($slots->start_time));
                                                    $end_time = date('h:i A', strtotime($slots->end_time));
                                                @endphp
                                                <tr>
                                                    <td class="px-3 py-2 text-sm font-medium text-base-content/70">
                                                        {{ $slots->id }}
                                                    </td>
                                                    <td class="px-8 py-2 text-sm font-medium text-base-content/70" id="slot_day_{{ $slots->id }}">
                                                        {{ $slots->day_of_week }}
                                                    </td>
                                                    <td class="hidden" id="slot_start_{{ $slots->id }}">
                                                        {{ $start_time_raw }}
                                                    </td>
                                                    <td class="hidden" id="slot_end_{{ $slots->id }}">
                                                        {{ $end_time_raw }}
                                                    </td>
                                                    <td class="hidden" id="slot_status_{{ $slots->id }}">
                                                        {{ $slots->status }}
                                                    </td>
                                                    <td class="px-6 py-2 text-sm text-base-content/50">
                                                        {{ $start_time }} - {{ $end_time }}
                                                    </td>
                                                    <td class="px-4 py-2 text-sm text-base-content/50">
                                                        @if ($slots->status == 1)
                                                            <span
                                                                class="px-2 py-1.5 text-xs font-medium leading-4 text-green-800 bg-green-100 rounded-full">
                                                                Active
                                                            </span>
                                                        @else
                                                            <span
                                                                class="px-2 py-1.5 text-xs font-medium leading-4 text-red-800 bg-red-100 rounded-full">
                                                                Inactive
                                                            </span>
                                                        @endif
                                                    <td class="px-4 py-2 text-sm">
                                                        <div class="flex items-center gap-x-2">
                                                            <label for="edit-slot-{{ $slots->id }}"
                                                                data-slot-id="{{ $slots->id }}" id="edit-slot"
                                                                class="pb-1.5 text-base-content/50 transition-colors duration-200 cursor-pointer hover:text-warning focus:outline-none">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor"
                                                                    class="w-5 h-5" id="times-circle">
                                                                    <path fill="currentColor"
                                                                        d="M21,12a1,1,0,0,0-1,1v6a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V5A1,1,0,0,1,5,4h6a1,1,0,0,0,0-2H5A3,3,0,0,0,2,5V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V13A1,1,0,0,0,21,12ZM6,12.76V17a1,1,0,0,0,1,1h4.24a1,1,0,0,0,.71-.29l6.92-6.93h0L21.71,8a1,1,0,0,0,0-1.42L17.47,2.29a1,1,0,0,0-1.42,0L13.23,5.12h0L6.29,12.05A1,1,0,0,0,6,12.76ZM16.76,4.41l2.83,2.83L18.17,8.66,15.34,5.83ZM8,13.17l5.93-5.93,2.83,2.83L10.83,16H8Z">
                                                                    </path>
                                                                </svg>
                                                            </label>
                                                            <label for="delete-slot-{{ $slots->id }}"
                                                                data-slot-id="{{ $slots->id }}" id="delete-slot"
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

            {{-- Add Slot --}}
            <input type="checkbox" id="add-slot" class="modal-toggle" />
            <label for="add-slot" class="modal cursor-pointer">
                <label class="modal-box relative" for="">
                    <div class="lg:px-8 sm:px-6 px-2">
                        <div class="bg-base-100  rounded-xl overflow-hidden max-w-6xl">
                            <div class="px-3 pt-4 sm:pt-2">
                                <h3 class="text-2xl font-semibold text-center text-base-content">
                                    Add Consultation Slot
                                </h3>

                                <form action="{{ route('addConsultation') }}" method="POST" class="mt-10">
                                    @csrf
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4">
                                        <div class="sm:col-span-2">

                                            <div class="form-control">
                                                <label class="label cursor-pointer justify-center gap-x-2">
                                                    <div>
                                                        <span class="label-text font-semibold text-lg">Mass
                                                            Mode</span>
                                                    </div>
                                                    <input type="radio" name="mode" id="mass"
                                                        class="radio radio-primary px-4 py-4 text-base-content placeholder-base-content/40 transition-all duration-200 bg-base-100 border border-base-300 rounded-md resize-y focus:outline-none focus:border-primary caret-primary"
                                                        checked />
                                                    <input type="radio" name="mode" id="solo"
                                                        value="off"
                                                        class="radio radio-primary px-4 py-4 text-base-content placeholder-base-content/40 transition-all duration-200 bg-base-100 border border-base-300 rounded-md resize-y focus:outline-none focus:border-primary caret-primary" />
                                                    <div>
                                                        <span class="label-text font-semibold text-lg">Solo
                                                            Mode</span>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="" class="text-base font-medium text-base-content">
                                                Start Time
                                            </label>
                                            <div class="mt-2.5 relative">
                                                <input type="text" name="start_time" id="start_time"
                                                    class="w-full px-4 py-2 text-base-content placeholder-base-content/40 transition-all duration-200 bg-base-100 border border-base-300 rounded-md resize-y focus:outline-none focus:border-primary caret-primary"
                                                    placeholder="Start Time" />
                                            </div>
                                            <script>
                                                $('#start_time').flatpickr({
                                                    enableTime: true,
                                                    noCalendar: true,
                                                    dateFormat: 'H:i',
                                                    minTime: '09:00',
                                                    maxTime: '17:00',
                                                    minuteIncrement: 10,
                                                    static: true,
                                                    theme: 'light',
                                                    prevArrow: '<i class="fas fa-chevron-left"></i>',
                                                    nextArrow: '<i class="fas fa-chevron-right"></i>',

                                                })
                                            </script>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <label for="" class="text-base font-medium text-base-content">
                                                End Time
                                            </label>
                                            <div class="mt-2.5 relative">
                                                <input type="text" name="end_time" id="end_time"
                                                    class="w-full px-4 py-2 text-base-content placeholder-base-content/40 transition-all duration-200 bg-base-100 border border-base-300 rounded-md resize-y focus:outline-none focus:border-primary caret-primary"
                                                    placeholder="End Time" />
                                            </div>
                                            <script>
                                                $('#end_time').flatpickr({
                                                    enableTime: true,
                                                    noCalendar: true,
                                                    dateFormat: 'H:i',
                                                    minTime: '09:00',
                                                    maxTime: '17:00',
                                                    minuteIncrement: 10,
                                                    static: true,
                                                    theme: 'light',
                                                    prevArrow: '<i class="fas fa-chevron-left"></i>',
                                                    nextArrow: '<i class="fas fa-chevron-right"></i>',
                                                    position: 'auto',
                                                })
                                            </script>
                                        </div>

                                        <div class="lg:col-span-2 2xl:col-span-1" id="totalslot">
                                            <label for="" class="text-base font-medium text-base-content">
                                                Total Slots
                                            </label>
                                            <div class="mt-2.5 relative">
                                                <input type="number" name="total_slots" id="total_slots"
                                                    min="1"
                                                    class="w-full px-4 py-2 text-base-content placeholder-base-content/40 transition-all duration-200 bg-base-100 border border-base-300 rounded-md resize-y focus:outline-none focus:border-primary caret-primary"
                                                    placeholder="Total Slots" />
                                            </div>
                                        </div>

                                        <div class="lg:col-span-2 2xl:col-span-1">
                                            <label for="" class="text-base font-medium text-base-content">
                                                Select Day
                                            </label>
                                            <div class="mt-2.5 relative">
                                                <select name="day" id="day"
                                                    class="w-full px-4 py-2 text-base-content placeholder-base-content/40 transition-all duration-200 bg-base-100 border border-base-300 rounded-md resize-y focus:outline-none focus:border-primary caret-primary">
                                                    <option value="Sunday">Sunday</option>
                                                    <option value="Monday">Monday</option>
                                                    <option value="Tuesday">Tuesday</option>
                                                    <option value="Wednesday">Wednesday</option>
                                                    <option value="Thursday">Thursday</option>
                                                    <option value="Friday">Friday</option>
                                                    <option value="Saturday">Saturday</option>
                                                </select>
                                            </div>
                                        </div>

                                        <script>
                                            var mass = document.getElementById("mass");
                                            var solo = document.getElementById("solo");
                                            var total_slots = document.getElementById("totalslot");

                                            mass.addEventListener("click", function() {
                                                total_slots.style.display = "block";
                                            });

                                            solo.addEventListener("click", function() {
                                                total_slots.style.display = "none";
                                            });
                                        </script>


                                        <div class="sm:col-span-2">
                                            <label class="label cursor-pointer">
                                                <span class="label-text">Active</span>
                                                {{-- default is on --}}
                                                <input name="status" type="checkbox" class="toggle" checked />
                                            </label>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <button type="submit"
                                                class="inline-flex items-center justify-center w-full px-4 py-4 mt-2 text-base font-semibold text-base-100 transition-all duration-200 bg-primary border border-transparent rounded-md focus:outline-none hover:bg-primary focus:bg-primary">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                {{-- a gray text explaining the modes --}}

                                <div class="mt-4 text-base-content space-y-2">
                                    <div tabindex="0"
                                        class="collapse collapse-plus border border-base-300 bg-base-100 rounded-box">
                                        <div class="collapse-title text-xl font-medium">
                                            Mass Mode
                                        </div>
                                        <div class="collapse-content">
                                            <p class="mt-2 text-sm">In mass mode, you can create multiple slots in
                                                one go by specifying the start and end time of consulatation
                                                session. For example, if you want to create
                                                10 slots in 08:00 AM to 11:00 AM, you can define the total number of
                                                slots as 6. The system will automatically create 8 slots dividing
                                                the total time in minutes.</p>
                                        </div>
                                    </div>

                                    <div tabindex="0"
                                        class="collapse collapse-plus border border-base-300 bg-base-100 rounded-box">
                                        <div class="collapse-title text-xl font-medium">
                                            Solo Mode
                                        </div>
                                        <div class="collapse-content">
                                            <p class="mt-2 text-sm">In solo mode, you can define the start time and
                                                end
                                                time of a particular slot. For example, if you want to create a slot
                                                for
                                                10:00 AM to 10:30 AM, you can define the start time as 10:00 AM and
                                                end time
                                                as 10:30 AM. The system will automatically create a slot for that
                                                time slot.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </label>
            </label>

            {{-- table end --}}
            {{-- page --}}
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
            {{-- page end --}}
        </div>
    </div>

    {{-- modal to Edit Slot  --}}
    <script>
        const editSlot = document.querySelectorAll('#edit-slot');
        editSlot.forEach((slot) => {
            slot.addEventListener('click', () => {
                const slotId = slot.getAttribute('data-slot-id');
                const modal = createModal(slotId);
                document.body.appendChild(modal);
            });
        });

        function createModal(slotId) {
            const modal = document.createElement('div');
            const start_time = document.querySelector(`#slot_start_${slotId}`).innerHTML.trim();
            // convert to 24 hour format end

            // convert to 24 hour format
            const end_time = document.querySelector(`#slot_end_${slotId}`).innerHTML.trim();
            const slot_day = document.querySelector(`#slot_day_${slotId}`).innerHTML.trim();
            const status = document.querySelector(`#slot_status_${slotId}`).innerHTML.trim();
            modal.innerHTML = `
            <input type="checkbox" id="edit-slot-${slotId}" class="modal-toggle" />
            <label for="edit-slot-${slotId}" class="modal cursor-pointer">
        <label class="modal-box relative" for="">
                    <div class="lg:px-8 sm:px-6 px-2">
                        <div class="bg-base-100  rounded-xl overflow-hidden max-w-6xl">
                            <div class="px-3 pt-4 sm:pt-2">
                                <h3 class="text-2xl font-semibold text-center text-base-content">
                                    Edit Consultation Slot
                                </h3>
                                <form action="{{ route('addConsultation') }}" method="POST" class="mt-10">
                                    @csrf
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4">
                                    <div class="sm:col-span-2">
                                            <label for="" class="text-base font-medium text-base-content">
                                                Start Time
                                            </label>
                                            <div class="mt-2.5 relative">
                                                <input type="text" name="start_time" id="start_time"
                                                    class="w-full px-4 py-2 text-base-content placeholder-base-content/40 transition-all duration-200 bg-base-100 border border-base-300 rounded-md resize-y focus:outline-none focus:border-primary caret-primary"
                                                    placeholder="Start Time" value="${start_time}" />
                                            </div>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label for="" class="text-base font-medium text-base-content">
                                                End Time
                                            </label>
                                            <div class="mt-2.5 relative">
                                                <input type="text" name="end_time" id="end_time"
                                                    class="w-full px-4 py-2 text-base-content placeholder-base-content/40 transition-all duration-200 bg-base-100 border border-base-300 rounded-md resize-y focus:outline-none focus:border-primary caret-primary"
                                                    placeholder="End Time" />
                                            </div>
                                        </div>

                                        <div class="lg:col-span-2 2xl:col-span-1">
                                            <label for="" class="text-base font-medium text-base-content">
                                                Select Day
                                            </label>
                                            <div class="mt-2.5 relative">
                                                <select name="day" id="day"
                                                    class="w-full px-4 py-2 text-base-content placeholder-base-content/40 transition-all duration-200 bg-base-100 border border-base-300 rounded-md resize-y focus:outline-none focus:border-primary caret-primary">
                                                    <option value="Sunday">Sunday</option>
                                                    <option value="Monday">Monday</option>
                                                    <option value="Tuesday">Tuesday</option>
                                                    <option value="Wednesday">Wednesday</option>
                                                    <option value="Thursday">Thursday</option>
                                                    <option value="Friday">Friday</option>
                                                    <option value="Saturday">Saturday</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="sm:col-span-2">
                                            <label class="label cursor-pointer">
                                                <span class="label-text">Active</span>
                                                {{-- default is on --}}
                                                <input name="status" type="checkbox" class="toggle" checked />
                                            </label>
                                        </div>

                                        <div class="sm:col-span-2">
                                            <button type="submit"
                                                class="inline-flex items-center justify-center w-full px-4 py-4 mt-2 text-base font-semibold text-base-100 transition-all duration-200 bg-primary border border-transparent rounded-md focus:outline-none hover:bg-primary focus:bg-primary">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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
