@props(['mode' => $mode])

@php
$user_id = Auth::user()->id;

// get pending reviews
$pendingReviews = \App\Models\Reviews::where('isApproved', 0)
        ->where('isDeleted', 0)
        ->count();

// get pending consultations for that user
$pendingConsultations = \App\Models\Consultations::where('faculty_id', $user_id)
            ->where('is_approved', 'Pending')
            ->count();

@endphp


@php
    $arrow = '';
    if ($mode == 0) {
        $arrow = 'M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z';
    } else {
        $arrow = 'M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z';
    }

    $activeClass = 'text-base-100 bg-primary/60';
    $inactiveClass = 'text-base-content/90 hover:text-base-100 hover:bg-primary/50';


    // {{-- icons --}}
    $consultationIcon = 'M 6.25 2.5 C 6.25 1.121094 7.371094 0 8.75 0 L 22.5 0 C 23.878906 0 25 1.121094 25 2.5 L 25 13.75 C 25 15.128906 23.878906 16.25 22.5 16.25 L 13.15625 16.25 C 12.695312 15.253906 11.988281 14.394531 11.109375 13.75 L 15 13.75 L 15 12.5 C 15 11.808594 15.558594 11.25 16.25 11.25 L 18.75 11.25 C 19.441406 11.25 20 11.808594 20 12.5 L 20 13.75 L 22.5 13.75 L 22.5 2.5 L 8.75 2.5 L 8.75 4.417969 C 8.015625 3.992188 7.160156 3.75 6.25 3.75 Z M 6.25 5 C 8.320312 5 10 6.679688 10 8.75 C 10 10.820312 8.320312 12.5 6.25 12.5 C 4.179688 12.5 2.5 10.820312 2.5 8.75 C 2.5 6.679688 4.179688 5 6.25 5 Z M 5.207031 13.75 L 7.289062 13.75 C 10.167969 13.75 12.5 16.082031 12.5 18.957031 C 12.5 19.53125 12.035156 20 11.457031 20 L 1.042969 20 C 0.464844 20 0 19.535156 0 18.957031 C 0 16.082031 2.332031 13.75 5.207031 13.75 Z M 5.207031 13.75';
    $reviewIcon = 'M22,9.67A1,1,0,0,0,21.14,9l-5.69-.83L12.9,3a1,1,0,0,0-1.8,0L8.55,8.16,2.86,9a1,1,0,0,0-.81.68,1,1,0,0,0,.25,1l4.13,4-1,5.68a1,1,0,0,0,.4,1,1,1,0,0,0,1.05.07L12,18.76l5.1,2.68a.93.93,0,0,0,.46.12,1,1,0,0,0,.59-.19,1,1,0,0,0,.4-1l-1-5.68,4.13-4A1,1,0,0,0,22,9.67Zm-6.15,4a1,1,0,0,0-.29.89l.72,4.19-3.76-2a1,1,0,0,0-.94,0l-3.76,2,.72-4.19a1,1,0,0,0-.29-.89l-3-3,4.21-.61a1,1,0,0,0,.76-.55L12,5.7l1.88,3.82a1,1,0,0,0,.76.55l4.21.61Z';
    $settingsIcon = 'M19.9 12.66a1 1 0 0 1 0-1.32l1.28-1.44a1 1 0 0 0 .12-1.17l-2-3.46a1 1 0 0 0-1.07-.48l-1.88.38a1 1 0 0 1-1.15-.66l-.61-1.83a1 1 0 0 0-.95-.68h-4a1 1 0 0 0-1 .68l-.56 1.83a1 1 0 0 1-1.15.66L5 4.79a1 1 0 0 0-1 .48L2 8.73a1 1 0 0 0 .1 1.17l1.27 1.44a1 1 0 0 1 0 1.32L2.1 14.1a1 1 0 0 0-.1 1.17l2 3.46a1 1 0 0 0 1.07.48l1.88-.38a1 1 0 0 1 1.15.66l.61 1.83a1 1 0 0 0 1 .68h4a1 1 0 0 0 .95-.68l.61-1.83a1 1 0 0 1 1.15-.66l1.88.38a1 1 0 0 0 1.07-.48l2-3.46a1 1 0 0 0-.12-1.17ZM18.41 14l.8.9-1.28 2.22-1.18-.24a3 3 0 0 0-3.45 2L12.92 20h-2.56L10 18.86a3 3 0 0 0-3.45-2l-1.18.24-1.3-2.21.8-.9a3 3 0 0 0 0-4l-.8-.9 1.28-2.2 1.18.24a3 3 0 0 0 3.45-2L10.36 4h2.56l.38 1.14a3 3 0 0 0 3.45 2l1.18-.24 1.28 2.22-.8.9a3 3 0 0 0 0 3.98Zm-6.77-6a4 4 0 1 0 4 4 4 4 0 0 0-4-4Zm0 6a2 2 0 1 1 2-2 2 2 0 0 1-2 2Z';
    $logoutIcon = "M4,12a1,1,0,0,0,1,1h7.59l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l4-4a1,1,0,0,0,.21-.33,1,1,0,0,0,0-.76,1,1,0,0,0-.21-.33l-4-4a1,1,0,1,0-1.42,1.42L12.59,11H5A1,1,0,0,0,4,12ZM17,2H7A3,3,0,0,0,4,5V8A1,1,0,0,0,6,8V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V16a1,1,0,0,0-2,0v3a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V5A3,3,0,0,0,17,2Z";
    $dashboardIcon = 'M10 13H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1Zm-1 6H5v-4h4ZM20 3h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1Zm-1 6h-4V5h4Zm1 7h-2v-2a1 1 0 0 0-2 0v2h-2a1 1 0 0 0 0 2h2v2a1 1 0 0 0 2 0v-2h2a1 1 0 0 0 0-2ZM10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1ZM9 9H5V5h4Z';
    $usersIcon = 'M12,2A10,10,0,0,0,4.65,18.76h0a10,10,0,0,0,14.7,0h0A10,10,0,0,0,12,2Zm0,18a8,8,0,0,1-5.55-2.25,6,6,0,0,1,11.1,0A8,8,0,0,1,12,20ZM10,10a2,2,0,1,1,2,2A2,2,0,0,1,10,10Zm8.91,6A8,8,0,0,0,15,12.62a4,4,0,1,0-6,0A8,8,0,0,0,5.09,16,7.92,7.92,0,0,1,4,12a8,8,0,0,1,16,0A7.92,7.92,0,0,1,18.91,16Z';
@endphp


@php
    function printMenuItem($route, $icon, $title, $activeClass, $inactiveClass, $notification = null)
    {
        echo '<a href="' . route($route) . '" class="flex items-center px-4 py-2.5 text-sm font-medium transition-all duration-200 ' . (request()->routeIs($route) ? $activeClass : $inactiveClass) . ' rounded-lg group">';
        echo '<svg class="flex-shrink-0 w-5 h-5 mr-4 " xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24">';
        echo '<path fill="currentColor" d="' . $icon . '"/>';
        echo '</svg>';
        echo $title;
        if ($notification != null || $notification != 0) {
        echo '<span class="mx-2 inline-flex justify-center items-center w-5 h-5 text-xs font-semibold rounded-full text-base-content/80 bg-primary">
                      '. $notification .'
                  </span>';
        }
        echo '</a>';
    }

    // dashboard
    printMenuItem('dashboard', $dashboardIcon, 'Dashboard', $activeClass, $inactiveClass);

    echo '<hr class="border-base-content/20" />';

    if (Auth::user()->role == 'admin') {
        // reviews
        printMenuItem('reviews', $reviewIcon, 'Reviews', $activeClass, $inactiveClass);

        // pending reviews
        printMenuItem('pendingReviews', $reviewIcon, 'Pending Reviews', $activeClass, $inactiveClass, $pendingReviews);

        echo '<hr class="border-base-content/20" />';

        // users
        printMenuItem('allUsers', $usersIcon, 'Users', $activeClass, $inactiveClass);

        // faculty
        printMenuItem('allFaculties', $usersIcon, 'Faculty', $activeClass, $inactiveClass);

        // students
        printMenuItem('allStudents', $usersIcon, 'Students', $activeClass, $inactiveClass);

        echo '<hr class="border-base-content/20"/>';

        // courses
        printMenuItem('allCourses', 'M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25', 'Courses', $activeClass, $inactiveClass);
    }

    if (Auth::user()->role == 'student') {
        printMenuItem('studentReviews', $reviewIcon, 'Reviews', $activeClass, $inactiveClass);

        echo '<hr class="border-base-content/20" />';

        // showAllConsultations
        printMenuItem('allConsultations_student', $consultationIcon, 'All Consultations', $activeClass, $inactiveClass);
        printMenuItem('showAllConsultations_student', $consultationIcon, 'My Consultations', $activeClass, $inactiveClass);
    }

    if (Auth::user()->role == 'faculty') {
        // show all reviews
        printMenuItem('facultyReviews', $reviewIcon, 'Reviews', $activeClass, $inactiveClass);

        echo '<hr class="border-base-content/20" />';

        printMenuItem('createConsultation', 'M12,2A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8,8,0,0,1,12,20Zm4-9H13V8a1,1,0,0,0-2,0v3H8a1,1,0,0,0,0,2h3v3a1,1,0,0,0,2,0V13h3a1,1,0,0,0,0-2Z', 'Add Slot', $activeClass, $inactiveClass);

        // showAllConsultations
        printMenuItem('allConsultations', $consultationIcon, 'All Consultations', $activeClass, $inactiveClass);
        printMenuItem('showAllConsultations', $consultationIcon, 'My Consultations', $activeClass, $inactiveClass, $pendingConsultations);


        echo '<hr class="border-base-content/20" />';
        // courses
        printMenuItem('viewCourses_faculty', 'M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25', 'Courses', $activeClass, $inactiveClass);

    }

    echo '<hr class="border-base-content/20"/>';
    // settings
    printMenuItem('settings', $settingsIcon, 'Settings', $activeClass, $inactiveClass);

    echo '<hr class="border-base-content/20"/>';
    // logout
    printMenuItem('logout', $logoutIcon, 'Logout', $activeClass, $inactiveClass);
@endphp
