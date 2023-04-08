@props(['faculty' => $faculty])
@php
    // if the faculty has no reviews, then set the average rating to 0
    if (
        \App\Models\Reviews::where('faculty_id', $faculty->id)
            ->where('isApproved', 1)
            ->count() != 0
    ) {
        $avgRating = \App\Models\Reviews::where('faculty_id', $faculty->id)
            ->where('isApproved', 1)
            ->avg('rating');
        $avgRating = number_format($avgRating, 2);
        $totalReviews = \App\Models\Reviews::where('faculty_id', $faculty->id)
            ->where('isApproved', 1)
            ->count();
        $fiveStar = \App\Models\Reviews::where('faculty_id', $faculty->id)
            ->where('rating', 5)
            ->where('isApproved', 1)
            ->count();
        $fourStar = \App\Models\Reviews::where('faculty_id', $faculty->id)
            ->where('rating', 4)
            ->where('isApproved', 1)
            ->count();
        $threeStar = \App\Models\Reviews::where('faculty_id', $faculty->id)
            ->where('rating', 3)
            ->where('isApproved', 1)
            ->count();
        $twoStar = \App\Models\Reviews::where('faculty_id', $faculty->id)
            ->where('rating', 2)
            ->where('isApproved', 1)
            ->count();
        $oneStar = \App\Models\Reviews::where('faculty_id', $faculty->id)
            ->where('rating', 1)
            ->where('isApproved', 1)
            ->count();
        $fiveStarPercent = ($fiveStar / $totalReviews) * 100;
        $fourStarPercent = ($fourStar / $totalReviews) * 100;
        $threeStarPercent = ($threeStar / $totalReviews) * 100;
        $twoStarPercent = ($twoStar / $totalReviews) * 100;
        $oneStarPercent = ($oneStar / $totalReviews) * 100;
        $avgrating_floor = floor($avgRating);
        $avgrating_substring = substr($avgRating, -2);
        $voted_star_count = $avgrating_floor;
        $avgrating_subthreshold = 40;
        $half_star_count = $avgrating_substring < $avgrating_subthreshold ? 0 : 1;
        $unvoted_star_count = 5 - $voted_star_count - $half_star_count;
    } else {
        $noReviews = true;
        $avgRating = 0;
        $totalReviews = 0;
        $fiveStar = 0;
        $fourStar = 0;
        $threeStar = 0;
        $twoStar = 0;
        $oneStar = 0;
        $fiveStarPercent = 0;
        $fourStarPercent = 0;
        $threeStarPercent = 0;
        $twoStarPercent = 0;
        $oneStarPercent = 0;
        $avgrating_floor = 0;
        $avgrating_substring = 0;
        $voted_star_count = 0;
        $avgrating_subthreshold = 40;
        $half_star_count = 0;
        $unvoted_star_count = 5;
    }
@endphp


<div class="grid grid-cols-1 gap-y-8 sm:grid-cols-2 gap-x-16">
    <div>
        <h3 class="text-lg font-bold text-base-content">
            Review & Ratings
        </h3>
        <x-average-stars :faculty="$faculty" />
        <p class="font-medium text-sm mt-2.5 text-base-content/70">
            Based on {{ $totalReviews }} reviews.
        </p>
    </div>
    <div>
        <ul class="space-y-2.5">
            <li class="grid grid-cols-5 items-center gap-x-4">
                <span class="font-medium text-sm base-100 space-nowrap text-base-content/70">
                    5 stars
                </span>
                <div class="col-span-3 relative w-full h-1.5 rounded-full bg-base-300">
                    <div class="absolute inset-y-0 left-0 rounded-full bg-base-content"
                        style="width: {{ $fiveStarPercent }}%">
                    </div>
                </div>
                <span class="font-medium text-sm base-100 space-nowrap text-base-content/70">
                    {{ $fiveStar }}
                </span>
            </li>
            <li class="grid grid-cols-5 items-center gap-x-4">
                <span class="font-medium text-sm base-100 space-nowrap text-base-content/70">
                    4 stars
                </span>
                <div class="col-span-3 relative w-full h-1.5 rounded-full bg-base-300">
                    <div class="absolute inset-y-0 left-0 rounded-full bg-base-content"
                        style="width: {{ $fourStarPercent }}%">
                    </div>
                </div>
                <span class="font-medium text-sm base-100 space-nowrap text-base-content/70">
                    {{ $fourStar }}
                </span>
            </li>
            <li class="grid grid-cols-5 items-center gap-x-4">
                <span class="font-medium text-sm base-100 space-nowrap text-base-content/70">
                    3 stars
                </span>
                <div class="col-span-3 relative w-full h-1.5 rounded-full bg-base-300">
                    <div class="absolute inset-y-0 left-0 rounded-full bg-base-content"
                        style="width: {{ $threeStarPercent }}%">
                    </div>
                </div>
                <span class="font-medium text-sm base-100 space-nowrap text-base-content/70">
                    {{ $threeStar }}
                </span>
            </li>
            <li class="grid grid-cols-5 items-center gap-x-4">
                <span class="font-medium text-sm base-100 space-nowrap text-base-content/70">
                    2 stars
                </span>
                <div class="col-span-3 relative w-full h-1.5 rounded-full bg-base-300">
                    <div class="absolute inset-y-0 left-0 rounded-full bg-base-content"
                        style="width: {{ $twoStarPercent }}%">
                    </div>
                </div>
                <span class="font-medium text-sm base-100 space-nowrap text-base-content/70">
                    {{ $twoStar }}
                </span>
            </li>
            <li class="grid grid-cols-5 items-center gap-x-4">
                <span class="font-medium text-sm base-100 space-nowrap text-base-content/70">
                    1 stars
                </span>
                <div class="col-span-3 relative w-full h-1.5 rounded-full bg-base-300">
                    <div class="absolute inset-y-0 left-0 rounded-full bg-base-content"
                        style="width: {{ $oneStarPercent }}%">
                    </div>
                </div>
                <span class="font-medium text-sm base-100 space-nowrap text-base-content/70">
                    {{ $oneStar }}
                </span>
            </li>
        </ul>
    </div>
</div>
