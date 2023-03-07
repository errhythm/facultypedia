<x-dashboard-layout>
    <x-dashboard-layout-wrapper>
        <!-- Main Content Wrapper -->
        <main class="main-content w-full px-[var(--margin-x)] pb-8">
            <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 sm:gap-5 lg:mt-6 lg:gap-6">
                <div class="col-span-12 lg:col-span-8 xl:col-span-9">
                    {{-- start of hello --}}
                    <div :class="$store.breakpoints.smAndUp && 'via-purple-300'"
                        class="card mt-12 bg-gradient-to-l from-pink-300 to-indigo-400 p-5 sm:mt-0 sm:flex-row">
                        <div class="flex justify-center sm:order-last">
                            <img class="-mt-16 h-40 sm:mt-0" src="images/illustrations/teacher.svg" alt="" />
                        </div>
                        <div class="mt-2 flex-1 pt-2 text-center text-white sm:mt-0 sm:text-left">
                            <h3 class="text-xl">
                                Welcome Back, <span class="font-semibold">Caleb</span>
                            </h3>
                            <p class="mt-2 leading-relaxed">
                                Your student completed
                                <span class="font-semibold text-navy-700">85%</span> of tasks
                            </p>
                            <p>Progress is <span class="font-semibold">excellent!</span></p>

                            <button
                                class="btn mt-6 bg-slate-50 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80">
                                View Lessons
                            </button>
                        </div>
                    </div>
                    {{-- end of hello --}}
                    {{-- start of info cards --}}
                    <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6 mt-4 sm:mt-5 lg:mt-6">
                        <div class="grid grid-cols-2 gap-4 sm:order-first sm:grid-cols-4 sm:gap-5 lg:gap-6">
                            <x-dashboard-particle-stats-box title="Total Courses" value="5"
                                svg='<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-primary dark:text-accent" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v14a1 1 0 01-1 1H4a1 1 0 01-1-1V3zm1 0v14h12V3H4z" clip-rule="evenodd" />
                                    <path fill-rule="evenodd" d="M6 5a1 1 0 011-1h4a1 1 0 011 1v1a1 1 0 01-1 1H7a1 1 0 01-1-1V5zm1 0v1h4V5H7z" clip-rule="evenodd" />
                                    </svg>' />

                            <x-dashboard-particle-stats-box title="Total Reviews" value="30"
                                svg='<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 text-success" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path fill-rule="evenodd" d="M12.516 2.17a.75.75 0 00-1.032 0 11.209 11.209 0 01-7.877 3.08.75.75 0 00-.722.515A12.74 12.74 0 002.25 9.75c0 5.942 4.064 10.933 9.563 12.348a.749.749 0 00.374 0c5.499-1.415 9.563-6.406 9.563-12.348 0-1.39-.223-2.73-.635-3.985a.75.75 0 00-.722-.516l-.143.001c-2.996 0-5.717-1.17-7.734-3.08zm3.094 8.016a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                                    </svg>' />

                            <x-dashboard-particle-stats-box title="Average Rating" value="3.6"
                                svg='<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-warning" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                    </svg>' />

                            <x-dashboard-particle-stats-box title="Consultations" value="0"
                                svg='<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-info" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path fill-rule="evenodd" d="M4.848 2.771A49.144 49.144 0 0112 2.25c2.43 0 4.817.178 7.152.52 1.978.292 3.348 2.024 3.348 3.97v6.02c0 1.946-1.37 3.678-3.348 3.97a48.901 48.901 0 01-3.476.383.39.39 0 00-.297.17l-2.755 4.133a.75.75 0 01-1.248 0l-2.755-4.133a.39.39 0 00-.297-.17 48.9 48.9 0 01-3.476-.384c-1.978-.29-3.348-2.024-3.348-3.97V6.741c0-1.946 1.37-3.68 3.348-3.97zM6.75 8.25a.75.75 0 01.75-.75h9a.75.75 0 010 1.5h-9a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H7.5z" clip-rule="evenodd" />
                                    </svg>' />

                        </div>
                    </div>
                    {{-- end of info cards --}}
                    {{-- Upcoming Consultations Start --}}
                    <div class="mt-4 sm:mt-5 lg:mt-6">
                        <div class="flex items-center justify-between">
                            <h2
                                class="text-base font-medium tracking-wide text-slate-700 line-clamp-1 dark:text-navy-100">
                                Media for lessons
                            </h2>
                            <div class="flex">
                                <div class="flex items-center" x-data="{ isInputActive: false }">
                                    <label class="block">
                                        <input x-effect="isInputActive === true && $nextTick(() => { $el.focus()});"
                                            :class="isInputActive ? 'w-32 lg:w-48' : 'w-0'"
                                            class="form-input w-full bg-transparent px-1 text-right transition-all duration-100 placeholder:text-slate-500 dark:placeholder:text-navy-200"
                                            placeholder="Search here..." type="text" />
                                    </label>
                                    <button @click="isInputActive = !isInputActive"
                                        class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </button>
                                </div>
                                <div x-data="usePopper({ placement: 'bottom-end', offset: 4 })" @click.outside="isShowPopper && (isShowPopper = false)"
                                    class="inline-flex">
                                    <button x-ref="popperRef" @click="isShowPopper = !isShowPopper"
                                        class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                        </svg>
                                    </button>
                                    <div x-ref="popperRoot" class="popper-root" :class="isShowPopper && 'show'">
                                        <div
                                            class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                                            <ul>
                                                <li>
                                                    <a href="#"
                                                        class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Action</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Another
                                                        Action</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Something
                                                        else</a>
                                                </li>
                                            </ul>
                                            <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
                                            <ul>
                                                <li>
                                                    <a href="#"
                                                        class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Separated
                                                        Link</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="is-scrollbar-hidden min-w-full overflow-x-auto">
                                <table class="is-hoverable w-full text-left">
                                    <thead>
                                        <tr>
                                            <th
                                                class="whitespace-nowrap rounded-tl-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                COURSE NAME
                                            </th>
                                            <th
                                                class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                FILE NAME
                                            </th>
                                            <th
                                                class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                PERMISSION
                                            </th>
                                            <th
                                                class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                ASSIGN
                                            </th>
                                            <th
                                                class="whitespace-nowrap bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                                SIZE
                                            </th>

                                            <th
                                                class="whitespace-nowrap rounded-tr-lg bg-slate-200 px-4 py-3 font-semibold uppercase text-slate-800 dark:bg-navy-800 dark:text-navy-100 lg:px-5">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                <div class="flex items-center space-x-4">
                                                    <div
                                                        class="relative flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-primary/10 dark:bg-accent">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5.5 w-5.5 text-primary dark:text-white"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5"
                                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                        </svg>
                                                    </div>
                                                    <span class="font-medium text-slate-700 dark:text-navy-100">Basic
                                                        English</span>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                <a href="#" class="hover:underline focus:underline">English
                                                    book.pdf
                                                </a>
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                <div class="badge space-x-2.5 text-slate-800 dark:text-navy-100">
                                                    <div class="h-2 w-2 rounded-full bg-current"></div>
                                                    <span>Only View </span>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                13 Members
                                            </td>
                                            <td
                                                class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
                                                56 MB
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                <button
                                                    class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr
                                            class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                <div class="flex items-center space-x-4">
                                                    <div
                                                        class="relative flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-primary/10 dark:bg-accent">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5.5 w-5.5 text-primary dark:text-white"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5"
                                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                        </svg>
                                                    </div>
                                                    <span class="font-medium text-slate-700 dark:text-navy-100">Grammar
                                                        and Punctuation
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                <a href="#" class="hover:underline focus:underline">Is
                                                    Correct.docx
                                                </a>
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                <div
                                                    class="badge space-x-2.5 text-secondary dark:text-secondary-light">
                                                    <div class="h-2 w-2 rounded-full bg-current"></div>
                                                    <span>Can Edit</span>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                95 Members
                                            </td>
                                            <td
                                                class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
                                                4.2 MB
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                <button
                                                    class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr
                                            class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                <div class="flex items-center space-x-4">
                                                    <div
                                                        class="relative flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-secondary/10 dark:bg-secondary">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5.5 w-5.5 text-secondary dark:text-white"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5"
                                                                d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                                                        </svg>
                                                    </div>
                                                    <span
                                                        class="font-medium text-slate-700 dark:text-navy-100">Practice
                                                        speaking English
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                <a href="#" class="hover:underline focus:underline">Speaking.mp3
                                                </a>
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                <div class="badge space-x-2.5 text-slate-800 dark:text-navy-100">
                                                    <div class="h-2 w-2 rounded-full bg-current"></div>
                                                    <span>Only View </span>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                49 Members
                                            </td>
                                            <td
                                                class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
                                                9 MB
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                <button
                                                    class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr
                                            class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                <div class="flex items-center space-x-4">
                                                    <div
                                                        class="relative flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-info/10 dark:bg-info">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5.5 w-5.5 text-info dark:text-white"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5"
                                                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                                        </svg>
                                                    </div>
                                                    <span class="font-medium text-slate-700 dark:text-navy-100">Basic
                                                        English
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                <a href="#" class="hover:underline focus:underline">
                                                    English books.zip
                                                </a>
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                <div class="badge space-x-2.5 text-slate-800 dark:text-navy-100">
                                                    <div class="h-2 w-2 rounded-full bg-current"></div>
                                                    <span>Only View </span>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                63 Members
                                            </td>
                                            <td
                                                class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
                                                496 MB
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                <button
                                                    class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr
                                            class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                <div class="flex items-center space-x-4">
                                                    <div
                                                        class="relative flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-warning/10 dark:bg-warning">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5.5 w-5.5 text-warning dark:text-white"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5"
                                                                d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                                        </svg>
                                                    </div>
                                                    <span class="font-medium text-slate-700 dark:text-navy-100">Grammar
                                                        and Punctuation
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                <a href="#" class="hover:underline focus:underline">
                                                    Video Course.mp4
                                                </a>
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                <div class="badge space-x-2.5 text-slate-800 dark:text-navy-100">
                                                    <div class="h-2 w-2 rounded-full bg-current"></div>
                                                    <span>Only View </span>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                47 Members
                                            </td>
                                            <td
                                                class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
                                                245 MB
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                <button
                                                    class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr class="border-y border-transparent">
                                            <td class="whitespace-nowrap rounded-bl-lg px-4 py-3 sm:px-5">
                                                <div class="flex items-center space-x-4">
                                                    <div
                                                        class="relative flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-primary/10 dark:bg-accent">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-5.5 w-5.5 text-primary dark:text-white"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5"
                                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                        </svg>
                                                    </div>
                                                    <span class="font-medium text-slate-700 dark:text-navy-100">Basic
                                                        of digital marketing
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                <a href="#" class="hover:underline focus:underline">Digital
                                                    marketing.pdf
                                                </a>
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                <div class="badge space-x-2.5 text-slate-800 dark:text-navy-100">
                                                    <div class="h-2 w-2 rounded-full bg-current"></div>
                                                    <span>Only View </span>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-4 py-3 sm:px-5">
                                                42 Members
                                            </td>
                                            <td
                                                class="whitespace-nowrap px-4 py-3 font-medium text-slate-700 dark:text-navy-100 sm:px-5">
                                                54 MB
                                            </td>
                                            <td class="whitespace-nowrap rounded-br-lg px-4 py-3 sm:px-5">
                                                <button
                                                    class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- Upcoming Consultations End --}}
                </div>
                <div class="col-span-12 lg:col-span-4 xl:col-span-3">
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-1 lg:gap-6">

                        {{-- next consultation --}}
                        <div class="rounded-lg bg-info/10 px-4 pb-5 dark:bg-navy-800 sm:px-5">
                            <div class="flex items-center justify-between py-3">
                                <h2 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                                    Next Consultation
                                </h2>
                                <div id="next-patient-menu" class="inline-flex">
                                    <button
                                        class="popper-ref btn -mr-1.5 h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z">
                                            </path>
                                        </svg>
                                    </button>

                                    <div class="popper-root" data-popper-placement="bottom-end"
                                        style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(-78px, 132px);">
                                        <div
                                            class="popper-box rounded-md border border-slate-150 bg-white py-1.5 font-inter dark:border-navy-500 dark:bg-navy-700">
                                            <ul>
                                                <li>
                                                    <a href="#"
                                                        class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Action</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Another
                                                        Action</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Something
                                                        else</a>
                                                </li>
                                            </ul>
                                            <div class="my-1 h-px bg-slate-150 dark:bg-navy-500"></div>
                                            <ul>
                                                <li>
                                                    <a href="#"
                                                        class="flex h-8 items-center px-3 pr-8 font-medium tracking-wide outline-none transition-all hover:bg-slate-100 hover:text-slate-800 focus:bg-slate-100 focus:text-slate-800 dark:hover:bg-navy-600 dark:hover:text-navy-100 dark:focus:bg-navy-600 dark:focus:text-navy-100">Separated
                                                        Link</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div class="flex justify-between">
                                    <div class="avatar h-16 w-16">
                                        <img class="rounded-full" src="images/200x200.png" alt="image">
                                    </div>
                                    <div>
                                        <p>Today</p>
                                        <p class="text-xl font-medium text-slate-700 dark:text-navy-100">
                                            11:00
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-lg font-medium text-slate-700 dark:text-navy-100">
                                        Alfredo Elliott
                                    </h3>
                                    <p class="text-xs text-slate-400 dark:text-navy-300">
                                        Checkup
                                    </p>
                                </div>
                                <div class="space-y-3 text-xs+">
                                    <div class="flex justify-between">
                                        <p class="font-medium text-slate-700 dark:text-navy-100">
                                            D.O.B.
                                        </p>
                                        <p class="text-right">25 Jan 1998</p>
                                    </div>
                                    <div class="flex justify-between">
                                        <p class="font-medium text-slate-700 dark:text-navy-100">
                                            Weight
                                        </p>
                                        <p class="text-right">56 kg</p>
                                    </div>
                                    <div class="flex justify-between">
                                        <p class="font-medium text-slate-700 dark:text-navy-100">
                                            Height
                                        </p>
                                        <p class="text-right">164 cm</p>
                                    </div>
                                    <div class="flex justify-between">
                                        <p class="font-medium text-slate-700 dark:text-navy-100">
                                            Last Appointment
                                        </p>
                                        <p class="text-right">25 May 2021</p>
                                    </div>
                                    <div class="flex justify-between">
                                        <p class="font-medium text-slate-700 dark:text-navy-100">
                                            Register Date
                                        </p>
                                        <p class="text-right">16 Jun 2020</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- next consultation --}}

                        <div class="sm:col-span-2 lg:col-span-1">
                            <div class="flex h-8 items-center justify-between">
                                <h2 class="font-medium tracking-wide text-slate-700 dark:text-navy-100">
                                    Students
                                </h2>
                                <a href="#"
                                    class="border-b border-dotted border-current pb-0.5 text-xs+ font-medium text-primary outline-none transition-colors duration-300 hover:text-primary/70 focus:text-primary/70 dark:text-accent-light dark:hover:text-accent-light/70 dark:focus:text-accent-light/70">View
                                    All</a>
                            </div>
                            <div class="mt-3 grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-x-5 lg:grid-cols-1">
                                <div class="card p-3">
                                    <div class="flex items-center justify-between space-x-2">
                                        <div class="flex items-center space-x-3">
                                            <div class="avatar h-10 w-10">
                                                <img class="rounded-full" src="images/200x200.png" alt="avatar" />
                                                <div
                                                    class="absolute right-0 h-3 w-3 rounded-full border-2 border-white bg-primary dark:border-navy-700 dark:bg-accent">
                                                </div>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                                    Travis Fuller
                                                </p>
                                                <p
                                                    class="mt-0.5 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                    65% completed
                                                </p>
                                            </div>
                                        </div>
                                        <div class="relative cursor-pointer">
                                            <button
                                                class="btn h-8 w-8 rounded-full bg-slate-150 p-0 font-medium text-slate-700 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-100 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5"
                                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                                </svg>
                                            </button>
                                            <div
                                                class="absolute top-0 right-0 -m-1 flex h-4 min-w-[1rem] items-center justify-center rounded-full bg-primary px-1 text-tiny font-medium leading-none text-white dark:bg-accent">
                                                2
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card p-3">
                                    <div class="flex items-center justify-between space-x-2">
                                        <div class="flex items-center space-x-3">
                                            <div class="avatar h-10 w-10">
                                                <img class="rounded-full" src="images/200x200.png" alt="avatar" />
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                                    Konnor Guzman
                                                </p>
                                                <p
                                                    class="mt-0.5 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                    78% completed
                                                </p>
                                            </div>
                                        </div>
                                        <div class="relative cursor-pointer">
                                            <button
                                                class="btn h-8 w-8 rounded-full bg-slate-150 p-0 font-medium text-slate-700 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-100 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5"
                                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card p-3">
                                    <div class="flex items-center justify-between space-x-2">
                                        <div class="flex items-center space-x-3">
                                            <div class="avatar h-10 w-10">
                                                <img class="rounded-full" src="images/200x200.png" alt="avatar" />
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                                    Alfredo Elliott
                                                </p>
                                                <p
                                                    class="mt-0.5 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                    58% completed
                                                </p>
                                            </div>
                                        </div>
                                        <div class="relative cursor-pointer">
                                            <button
                                                class="btn h-8 w-8 rounded-full bg-slate-150 p-0 font-medium text-slate-700 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-100 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5"
                                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                                </svg>
                                            </button>
                                            <div
                                                class="absolute top-0 right-0 -m-1 flex h-4 min-w-[1rem] items-center justify-center rounded-full bg-primary px-1 text-tiny font-medium leading-none text-white dark:bg-accent">
                                                3
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card p-3">
                                    <div class="flex items-center justify-between space-x-2">
                                        <div class="flex items-center space-x-3">
                                            <div class="avatar h-10 w-10">
                                                <img class="rounded-full" src="images/200x200.png" alt="avatar" />
                                                <div
                                                    class="absolute right-0 h-3 w-3 rounded-full border-2 border-white bg-primary dark:border-navy-700 dark:bg-accent">
                                                </div>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-700 line-clamp-1 dark:text-navy-100">
                                                    Derrick Simmons
                                                </p>
                                                <p
                                                    class="mt-0.5 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                    65% completed
                                                </p>
                                            </div>
                                        </div>
                                        <div class="relative cursor-pointer">
                                            <button
                                                class="btn h-8 w-8 rounded-full bg-slate-150 p-0 font-medium text-slate-700 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-100 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="1.5"
                                                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </x-dashboard-layout-wrapper>
</x-dashboard-layout>
