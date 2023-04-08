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
        // avgRating give 2 decimal values
        $avgRating = number_format($avgRating, 1);
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
<div class="flex items-center mt-1 mb-4">
    <div class="flex items-center space-x-px">
        @for ($i = 0; $i < floor($avgRating); $i++)
            <svg class="w-5 h-5 text-warning" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                </path>
            </svg>
        @endfor
        @if (substr($avgRating, -2) > $avgrating_subthreshold)
            {{-- make the star half text-warning and half text-base-200 --}}
            <svg class="w-5 h-5 text-warning" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                </path>
            </svg>
        @endif
        @for ($i = 0; $i < $unvoted_star_count; $i++)
             <svg class="w-5 h-5 text-base-300" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                </path>
                                            </svg>
        @endfor
    </div>
    <span class="font-semibold text-xs ml-1 text-base-content/70">
        {{ $avgRating }} ({{ $totalReviews }} reviews)
    </span>
</div>
