<!-- Page Wrapper -->
<div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak>
    <!-- Sidebar -->
    <div class="sidebar print:hidden">
        <!-- Main Sidebar -->
        <div class="main-sidebar">
            <div
                class="flex h-full w-full flex-col items-center border-r border-slate-150 bg-white dark:border-navy-700 dark:bg-navy-800">
                <!-- Application Logo -->
                <div class="flex pt-4">
                    <a href="/">
                        <img class="h-11 w-11 transition-transform duration-500 ease-in-out hover:rotate-[360deg]"
                            src="images/app-logo.svg" alt="logo" />
                    </a>
                </div>

                <!-- Main Sections Links -->
                <div class="is-scrollbar-hidden flex grow flex-col space-y-4 overflow-y-auto pt-6">
                    @include('dashboard.dashboard-menu')
                </div>

                <!-- Bottom Links -->
                <div class="flex flex-col items-center space-y-3 py-3">
                    <!-- Settings -->
                    <a href="form-layout-5.html"
                        class="flex h-11 w-11 items-center justify-center rounded-lg outline-none transition-colors duration-200 hover:bg-primary/20 focus:bg-primary/20 active:bg-primary/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                        <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-opacity="0.3" fill="currentColor"
                                d="M2 12.947v-1.771c0-1.047.85-1.913 1.899-1.913 1.81 0 2.549-1.288 1.64-2.868a1.919 1.919 0 0 1 .699-2.607l1.729-.996c.79-.474 1.81-.192 2.279.603l.11.192c.9 1.58 2.379 1.58 3.288 0l.11-.192c.47-.795 1.49-1.077 2.279-.603l1.73.996a1.92 1.92 0 0 1 .699 2.607c-.91 1.58-.17 2.868 1.639 2.868 1.04 0 1.899.856 1.899 1.912v1.772c0 1.047-.85 1.912-1.9 1.912-1.808 0-2.548 1.288-1.638 2.869.52.915.21 2.083-.7 2.606l-1.729.997c-.79.473-1.81.191-2.279-.604l-.11-.191c-.9-1.58-2.379-1.58-3.288 0l-.11.19c-.47.796-1.49 1.078-2.279.605l-1.73-.997a1.919 1.919 0 0 1-.699-2.606c.91-1.58.17-2.869-1.639-2.869A1.911 1.911 0 0 1 2 12.947Z" />
                            <path fill="currentColor"
                                d="M11.995 15.332c1.794 0 3.248-1.464 3.248-3.27 0-1.807-1.454-3.272-3.248-3.272-1.794 0-3.248 1.465-3.248 3.271 0 1.807 1.454 3.271 3.248 3.271Z" />
                        </svg>
                    </a>

                    <!-- Profile -->
                    <div x-data="usePopper({ placement: 'right-end', offset: 12 })" @click.outside="isShowPopper && (isShowPopper = false)"
                        class="flex">
                        <button @click="isShowPopper = !isShowPopper" x-ref="popperRef" class="avatar h-12 w-12">
                            <img class="rounded-full" src="images/200x200.png" alt="avatar" />
                            <span
                                class="absolute right-0 h-3.5 w-3.5 rounded-full border-2 border-white bg-success dark:border-navy-700"></span>
                        </button>

                        <div :class="isShowPopper && 'show'" class="popper-root fixed" x-ref="popperRoot">
                            <div
                                class="popper-box w-64 rounded-lg border border-slate-150 bg-white shadow-soft dark:border-navy-600 dark:bg-navy-700">
                                <div
                                    class="flex items-center space-x-4 rounded-t-lg bg-slate-100 py-5 px-4 dark:bg-navy-800">
                                    <div class="avatar h-14 w-14">
                                        <img class="rounded-full" src="images/200x200.png" alt="avatar" />
                                    </div>
                                    <div>
                                        <a href="#"
                                            class="text-base font-medium text-slate-700 hover:text-primary focus:text-primary dark:text-navy-100 dark:hover:text-accent-light dark:focus:text-accent-light">
                                            Travis Fuller
                                        </a>
                                        <p class="text-xs text-slate-400 dark:text-navy-300">
                                            Product Designer
                                        </p>
                                    </div>
                                </div>
                                <div class="flex flex-col pt-2 pb-5">
                                    <a href="#"
                                        class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                        <div
                                            class="flex h-8 w-8 items-center justify-center rounded-lg bg-warning text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>

                                        <div>
                                            <h2
                                                class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                                                Profile
                                            </h2>
                                            <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                Your profile setting
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#"
                                        class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                        <div
                                            class="flex h-8 w-8 items-center justify-center rounded-lg bg-info text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                            </svg>
                                        </div>

                                        <div>
                                            <h2
                                                class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                                                Messages
                                            </h2>
                                            <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                Your messages and tasks
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#"
                                        class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                        <div
                                            class="flex h-8 w-8 items-center justify-center rounded-lg bg-secondary text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </div>

                                        <div>
                                            <h2
                                                class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                                                Team
                                            </h2>
                                            <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                Your team activity
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#"
                                        class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                        <div
                                            class="flex h-8 w-8 items-center justify-center rounded-lg bg-error text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>

                                        <div>
                                            <h2
                                                class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                                                Activity
                                            </h2>
                                            <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                Your activity and events
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#"
                                        class="group flex items-center space-x-3 py-2 px-4 tracking-wide outline-none transition-all hover:bg-slate-100 focus:bg-slate-100 dark:hover:bg-navy-600 dark:focus:bg-navy-600">
                                        <div
                                            class="flex h-8 w-8 items-center justify-center rounded-lg bg-success text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </div>

                                        <div>
                                            <h2
                                                class="font-medium text-slate-700 transition-colors group-hover:text-primary group-focus:text-primary dark:text-navy-100 dark:group-hover:text-accent-light dark:group-focus:text-accent-light">
                                                Settings
                                            </h2>
                                            <div class="text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                Webapp settings
                                            </div>
                                        </div>
                                    </a>
                                    <div class="mt-3 px-4">
                                        <button
                                            class="btn h-9 w-full space-x-2 bg-primary text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="1.5"
                                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                            </svg>
                                            <span>Logout</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- App Header Wrapper-->
    <nav class="header print:hidden">
        <!-- App Header  -->
        <div class="header-container relative flex w-full bg-white dark:bg-navy-750 print:hidden">
            <!-- Header Items -->
            <div class="flex w-full items-center justify-between">
                <!-- Left: Sidebar Toggle Button -->
                <div class="h-7 w-7">
                </div>

                <!-- Right: Header buttons -->
                <div class="-mr-1.5 flex items-center space-x-2">
                    <!-- Dark Mode Toggle -->
                    <button @click="$store.global.isDarkModeEnabled = !$store.global.isDarkModeEnabled"
                        class="btn h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                        <svg x-show="$store.global.isDarkModeEnabled"
                            x-transition:enter="transition-transform duration-200 ease-out absolute origin-top"
                            x-transition:enter-start="scale-75" x-transition:enter-end="scale-100 static"
                            class="h-6 w-6 text-amber-400" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M11.75 3.412a.818.818 0 01-.07.917 6.332 6.332 0 00-1.4 3.971c0 3.564 2.98 6.494 6.706 6.494a6.86 6.86 0 002.856-.617.818.818 0 011.1 1.047C19.593 18.614 16.218 21 12.283 21 7.18 21 3 16.973 3 11.956c0-4.563 3.46-8.31 7.925-8.948a.818.818 0 01.826.404z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" x-show="!$store.global.isDarkModeEnabled"
                            x-transition:enter="transition-transform duration-200 ease-out absolute origin-top"
                            x-transition:enter-start="scale-75" x-transition:enter-end="scale-100 static"
                            class="h-6 w-6 text-amber-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>

                    <!-- Notification-->
                    <div x-effect="if($store.global.isSearchbarActive) isShowPopper = false" x-data="usePopper({ placement: 'bottom-end', offset: 12 })"
                        @click.outside="isShowPopper && (isShowPopper = false)" class="flex">
                        <button @click="isShowPopper = !isShowPopper" x-ref="popperRef"
                            class="btn relative h-8 w-8 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-500 dark:text-navy-100"
                                stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15.375 17.556h-6.75m6.75 0H21l-1.58-1.562a2.254 2.254 0 01-.67-1.596v-3.51a6.612 6.612 0 00-1.238-3.85 6.744 6.744 0 00-3.262-2.437v-.379c0-.59-.237-1.154-.659-1.571A2.265 2.265 0 0012 2c-.597 0-1.169.234-1.591.65a2.208 2.208 0 00-.659 1.572v.38c-2.621.915-4.5 3.385-4.5 6.287v3.51c0 .598-.24 1.172-.67 1.595L3 17.556h12.375zm0 0v1.11c0 .885-.356 1.733-.989 2.358A3.397 3.397 0 0112 22a3.397 3.397 0 01-2.386-.976 3.313 3.313 0 01-.989-2.357v-1.111h6.75z" />
                            </svg>

                            <span class="absolute -top-px -right-px flex h-3 w-3 items-center justify-center">
                                <span
                                    class="absolute inline-flex h-full w-full animate-ping rounded-full bg-secondary opacity-80"></span>
                                <span class="inline-flex h-2 w-2 rounded-full bg-secondary"></span>
                            </span>
                        </button>
                        <div :class="isShowPopper && 'show'" class="popper-root" x-ref="popperRoot">
                            <div x-data="{ activeTab: 'tabAll' }"
                                class="popper-box mx-4 mt-1 flex max-h-[calc(100vh-6rem)] w-[calc(100vw-2rem)] flex-col rounded-lg border border-slate-150 bg-white shadow-soft dark:border-navy-800 dark:bg-navy-700 dark:shadow-soft-dark sm:m-0 sm:w-80">
                                <div
                                    class="rounded-t-lg bg-slate-100 text-slate-600 dark:bg-navy-800 dark:text-navy-200">
                                    <div class="flex items-center justify-between px-4 pt-2">
                                        <div class="flex items-center space-x-2">
                                            <h3 class="font-medium text-slate-700 dark:text-navy-100">
                                                Notifications
                                            </h3>
                                            <div
                                                class="badge h-5 rounded-full bg-primary/10 px-1.5 text-primary dark:bg-accent-light/15 dark:text-accent-light">
                                                26
                                            </div>
                                        </div>

                                        <button
                                            class="btn -mr-1.5 h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="is-scrollbar-hidden flex shrink-0 overflow-x-auto px-3">
                                        <button @click="activeTab = 'tabAll'"
                                            :class="activeTab === 'tabAll' ?
                                                'border-primary dark:border-accent text-primary dark:text-accent-light' :
                                                'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                                            class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                                            <span>All</span>
                                        </button>
                                        <button @click="activeTab = 'tabAlerts'"
                                            :class="activeTab === 'tabAlerts' ?
                                                'border-primary dark:border-accent text-primary dark:text-accent-light' :
                                                'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                                            class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                                            <span>Alerts</span>
                                        </button>
                                        <button @click="activeTab = 'tabEvents'"
                                            :class="activeTab === 'tabEvents' ?
                                                'border-primary dark:border-accent text-primary dark:text-accent-light' :
                                                'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                                            class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                                            <span>Events</span>
                                        </button>
                                        <button @click="activeTab = 'tabLogs'"
                                            :class="activeTab === 'tabLogs' ?
                                                'border-primary dark:border-accent text-primary dark:text-accent-light' :
                                                'border-transparent hover:text-slate-800 focus:text-slate-800 dark:hover:text-navy-100 dark:focus:text-navy-100'"
                                            class="btn shrink-0 rounded-none border-b-2 px-3.5 py-2.5">
                                            <span>Logs</span>
                                        </button>
                                    </div>
                                </div>

                                <div class="tab-content flex flex-col overflow-hidden">
                                    <div x-show="activeTab === 'tabAll'"
                                        x-transition:enter="transition-all duration-300 easy-in-out"
                                        x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                                        x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
                                        class="is-scrollbar-hidden space-y-4 overflow-y-auto px-4 py-4">
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-secondary/10 dark:bg-secondary-light/15">
                                                <i
                                                    class="fa fa-user-edit text-secondary dark:text-secondary-light"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    User Photo Changed
                                                </p>
                                                <div
                                                    class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                    John Doe changed his avatar photo
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-info/10 dark:bg-info/15">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-info"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    Mon, June 14, 2021
                                                </p>
                                                <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                                                    <span class="shrink-0">08:00 - 09:00</span>
                                                    <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>

                                                    <span class="line-clamp-1">Frontend Conf</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-primary/10 dark:bg-accent-light/15">
                                                <i class="fa-solid fa-image text-primary dark:text-accent-light"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    Images Added
                                                </p>
                                                <div
                                                    class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                    Mores Clarke added new image gallery
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-success/10 dark:bg-success/15">
                                                <i class="fa fa-leaf text-success"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    Design Completed
                                                </p>
                                                <div
                                                    class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                    Robert Nolan completed the design of the CRM
                                                    application
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-info/10 dark:bg-info/15">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-info"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    Wed, June 21, 2021
                                                </p>
                                                <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                                                    <span class="shrink-0">16:00 - 20:00</span>
                                                    <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>

                                                    <span class="line-clamp-1">UI/UX Conf</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-warning/10 dark:bg-warning/15">
                                                <i class="fa fa-project-diagram text-warning"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    ER Diagram
                                                </p>
                                                <div
                                                    class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                    Team completed the ER diagram app
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-warning/10 dark:bg-warning/15">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-warning"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    THU, May 11, 2021
                                                </p>
                                                <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                                                    <span class="shrink-0">10:00 - 11:30</span>
                                                    <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>
                                                    <span class="line-clamp-1">Interview, Konnor Guzman
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-error/10 dark:bg-error/15">
                                                <i class="fa fa-history text-error"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    Weekly Report
                                                </p>
                                                <div
                                                    class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                    The weekly report was uploaded
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div x-show="activeTab === 'tabAlerts'"
                                        x-transition:enter="transition-all duration-300 easy-in-out"
                                        x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                                        x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
                                        class="is-scrollbar-hidden space-y-4 overflow-y-auto px-4 py-4">
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-secondary/10 dark:bg-secondary-light/15">
                                                <i
                                                    class="fa fa-user-edit text-secondary dark:text-secondary-light"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    User Photo Changed
                                                </p>
                                                <div
                                                    class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                    John Doe changed his avatar photo
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-primary/10 dark:bg-accent-light/15">
                                                <i class="fa-solid fa-image text-primary dark:text-accent-light"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    Images Added
                                                </p>
                                                <div
                                                    class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                    Mores Clarke added new image gallery
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-success/10 dark:bg-success/15">
                                                <i class="fa fa-leaf text-success"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    Design Completed
                                                </p>
                                                <div
                                                    class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                    Robert Nolan completed the design of the CRM
                                                    application
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-warning/10 dark:bg-warning/15">
                                                <i class="fa fa-project-diagram text-warning"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    ER Diagram
                                                </p>
                                                <div
                                                    class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                    Team completed the ER diagram app
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-error/10 dark:bg-error/15">
                                                <i class="fa fa-history text-error"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    Weekly Report
                                                </p>
                                                <div
                                                    class="mt-1 text-xs text-slate-400 line-clamp-1 dark:text-navy-300">
                                                    The weekly report was uploaded
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div x-show="activeTab === 'tabEvents'"
                                        x-transition:enter="transition-all duration-300 easy-in-out"
                                        x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                                        x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
                                        class="is-scrollbar-hidden space-y-4 overflow-y-auto px-4 py-4">
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-info/10 dark:bg-info/15">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-info"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    Mon, June 14, 2021
                                                </p>
                                                <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                                                    <span class="shrink-0">08:00 - 09:00</span>
                                                    <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>

                                                    <span class="line-clamp-1">Frontend Conf</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-info/10 dark:bg-info/15">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-info"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    Wed, June 21, 2021
                                                </p>
                                                <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                                                    <span class="shrink-0">16:00 - 20:00</span>
                                                    <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>

                                                    <span class="line-clamp-1">UI/UX Conf</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-warning/10 dark:bg-warning/15">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-warning"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    THU, May 11, 2021
                                                </p>
                                                <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                                                    <span class="shrink-0">10:00 - 11:30</span>
                                                    <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>
                                                    <span class="line-clamp-1">Interview, Konnor Guzman
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-info/10 dark:bg-info/15">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-info"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    Mon, Jul 16, 2021
                                                </p>
                                                <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                                                    <span class="shrink-0">06:00 - 16:00</span>
                                                    <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>

                                                    <span class="line-clamp-1">Laravel Conf</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-warning/10 dark:bg-warning/15">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-warning"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-600 dark:text-navy-100">
                                                    Wed, Jun 16, 2021
                                                </p>
                                                <div class="mt-1 flex text-xs text-slate-400 dark:text-navy-300">
                                                    <span class="shrink-0">15:30 - 11:30</span>
                                                    <div class="mx-2 my-1 w-px bg-slate-200 dark:bg-navy-500"></div>
                                                    <span class="line-clamp-1">Interview, Jonh Doe
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div x-show="activeTab === 'tabLogs'"
                                        x-transition:enter="transition-all duration-300 easy-in-out"
                                        x-transition:enter-start="opacity-0 [transform:translate3d(1rem,0,0)]"
                                        x-transition:enter-end="opacity-100 [transform:translate3d(0,0,0)]"
                                        class="is-scrollbar-hidden overflow-y-auto px-4">
                                        <div class="mt-8 pb-8 text-center">
                                            <img class="mx-auto w-36" src="images/illustrations/empty-girl-box.svg"
                                                alt="image" />
                                            <div class="mt-5">
                                                <p class="text-base font-semibold text-slate-700 dark:text-navy-100">
                                                    No any logs
                                                </p>
                                                <p class="text-slate-400 dark:text-navy-300">
                                                    There are no unread logs yet
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    {{ $slot }}

</div>
<!--
        This is a place for Alpine.js Teleport feature
        @see https://alpinejs.dev/directives/teleport
      -->
<div id="x-teleport-target"></div>
<script>
    window.addEventListener("DOMContentLoaded", () => Alpine.start());
</script>
