@php
    $page = request()->query('page') ?? 1;

    $page_count = $users->lastPage();
    $per_page = $users->perPage();
    $total = $users->total();
@endphp
@if ($page != 1 && $users->isEmpty())
    <script>
        window.location.href = "?page={{ $page_count }}";
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
                            {{ $usersCount }} {{ Str::plural($unit, $usersCount) }}
                        </span></a>
                </div>
                {{-- content --}}

                <div class="flex flex-col mt-6">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden border border-base-content/20  md:rounded-lg">
                                <table id="pending-review" class="min-w-full divide-y divide-base-content/20">
                                    <thead class="bg-base-300">
                                        <tr>
                                            {{-- table header for id --}}
                                            <th scope="col" class="py-3.5 px-3 text-sm font-normal text-left rtl:text-right text-base-content/50">
                                                <div class="flex items-center gap-x-3">
                                                    <span>ID</span>
                                                </div>
                                            </th>
                                            <th scope="col"
                                                class="py-3.5 px-3 text-sm font-normal text-left rtl:text-right text-base-content/50">
                                                <div class="flex items-center gap-x-3">
                                                    <span>User Name</span>
                                                </div>
                                            </th>

                                            <th scope="col"
                                                class="px-3 py-3.5 text-sm font-normal text-left rtl:text-right text-base-content/50 whitespace-nowrap">
                                                <div class="flex items-center gap-x-2">
                                                    <span>Email</span>
                                                </div>
                                            </th>

                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-base-content/50">
                                                <div class="flex items-center gap-x-2">
                                                    <span>Role</span>
                                                </div>
                                            </th>

                                            <th scope="col"
                                                class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-base-content/50">
                                                ID
                                            </th>

                                            <th scope="col" class="relative py-3.5 px-4">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-base-100/50 divide-y divide-base-content/20 ">

                                        {{-- print in pending reviews in each row --}}

                                        {{-- if reviews is 0, then show a big table row with a check sign in middle and next line You have no pending reviews --}}
                                        @if (count($users) == 0)
                                        <tr>
                                            <td colspan="4"
                                                class="px-4 py-20 mx-auto text-sm font-medium text-base-content/70">
                                                <div class="flex items-center justify-center gap-x-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-error"
                                                        viewBox="0 0 25 25" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M12,16a1,1,0,1,0,1,1A1,1,0,0,0,12,16Zm10.67,1.47-8.05-14a3,3,0,0,0-5.24,0l-8,14A3,3,0,0,0,3.94,22H20.06a3,3,0,0,0,2.61-4.53Zm-1.73,2a1,1,0,0,1-.88.51H3.94a1,1,0,0,1-.88-.51,1,1,0,0,1,0-1l8-14a1,1,0,0,1,1.78,0l8.05,14A1,1,0,0,1,20.94,19.49ZM12,8a1,1,0,0,0-1,1v4a1,1,0,0,0,2,0V9A1,1,0,0,0,12,8Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <div class="py-2 text-sm font-medium text-base-content/70">
                                                        No users found!
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        @else
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td class="pl-4 py-2 text-sm font-medium text-base-content/70">
                                                        {{ $user->id }}
                                                    </td>
                                                    <td class="pr-2 pl-1 py-2 text-sm font-medium text-base-content/70">
                                                        <div class="inline-flex items-center gap-x-3">
                                                            <div class="flex items-center gap-x-2">
                                                                <img class="object-cover w-10 h-10 rounded-full"
                                                                    src="https://api.dicebear.com/5.x/bottts-neutral/svg?seed={{ md5($user->id . $user->created_at) }}&scale=110"
                                                                    alt="{{ $user->name }}>
                                                                                <div
                                                                                    class="py-2
                                                                    text-sm font-medium text-base-content/70">
                                                                <h2 class="font-medium text-base-content/80">
                                                                    <a href="/profile/{{ $user->id }}">
                                                                    {{ $user->name }}</h2></a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-3 py-2 text-sm font-medium text-base-content/70 lowercase">
                                                        {{ $user->email }}
                                                    </td>
                                                    <td class="px-2 py-2 text-sm text-base-content/50">
                                                        {{ $user->role }}
                                                    </td>
                                                    <td class="px-4 py-2 text-sm text-base-content/50 ">
                                                        {{ $user->university_id }}
                                                    </td>
                                                    <td class="px-4 py-2 text-sm">
                                                        <div class="flex items-center gap-x-6">
                                                            <a href="{{ route('editUser', $user->id) }}"
                                                                class="pb-1.5 text-base-content/50 transition-colors duration-200 cursor-pointer hover:text-warning focus:outline-none">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor"
                                                                    class="w-5 h-5" id="times-circle">
                                                                    <path fill="currentColor"
                                                                        d="M21,12a1,1,0,0,0-1,1v6a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V5A1,1,0,0,1,5,4h6a1,1,0,0,0,0-2H5A3,3,0,0,0,2,5V19a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V13A1,1,0,0,0,21,12ZM6,12.76V17a1,1,0,0,0,1,1h4.24a1,1,0,0,0,.71-.29l6.92-6.93h0L21.71,8a1,1,0,0,0,0-1.42L17.47,2.29a1,1,0,0,0-1.42,0L13.23,5.12h0L6.29,12.05A1,1,0,0,0,6,12.76ZM16.76,4.41l2.83,2.83L18.17,8.66,15.34,5.83ZM8,13.17l5.93-5.93,2.83,2.83L10.83,16H8Z">
                                                                    </path>
                                                                </svg>
                                                            </a>
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

</x-dashboard>
