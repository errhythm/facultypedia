@props(['faculty' => $faculty])
@php
// if the faculty has no reviews, then set the average rating to 0
if (\App\Models\Reviews::where('faculty_id', $faculty->id)->where('isApproved', 1)->count() != 0) {
    $avgRating = \App\Models\Reviews::where('faculty_id', $faculty->id)->where('isApproved', 1)->avg('rating');
    // avgRating give 2 decimal values
    $avgRating = number_format($avgRating, 2);
    $totalReviews = \App\Models\Reviews::where('faculty_id', $faculty->id)->where('isApproved', 1)->count();
    $fiveStar = \App\Models\Reviews::where('faculty_id', $faculty->id)->where('rating', 5)->where('isApproved', 1)->count();
    $fourStar = \App\Models\Reviews::where('faculty_id', $faculty->id)->where('rating', 4)->where('isApproved', 1)->count();
    $threeStar = \App\Models\Reviews::where('faculty_id', $faculty->id)->where('rating', 3)->where('isApproved', 1)->count();
    $twoStar = \App\Models\Reviews::where('faculty_id', $faculty->id)->where('rating', 2)->where('isApproved', 1)->count();
    $oneStar = \App\Models\Reviews::where('faculty_id', $faculty->id)->where('rating', 1)->where('isApproved', 1)->count();
    $fiveStarPercent = ($fiveStar / $totalReviews) * 100;
    $fourStarPercent = ($fourStar / $totalReviews) * 100;
    $threeStarPercent = ($threeStar / $totalReviews) * 100;
    $twoStarPercent = ($twoStar / $totalReviews) * 100;
    $oneStarPercent = ($oneStar / $totalReviews) * 100;
    $avgrating_floor = floor($avgRating);
    $avgrating_substring = substr($avgRating, -2);
    $voted_star_count = $avgrating_floor;
    $avgrating_subthreshold = 40;
    $half_star_count = ($avgrating_substring < $avgrating_subthreshold) ? 0 : 1;
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
<span class="rating">
@for ($i = 0; $i < floor($avgRating); $i++)
    <i class="icon_star voted"></i>
@endfor
@if (substr($avgRating, -2) > $avgrating_subthreshold)
    <i class="icon_star-half_alt voted"></i>
@endif
@for ($i = 0; $i < $unvoted_star_count; $i++)
    <i class="icon_star"></i>
@endfor
<small>({{$totalReviews}})</small>
</span>
