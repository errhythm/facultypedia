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
    $avgrating_subthreshold = 50;
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
    $avgrating_subthreshold = 50;
    $half_star_count = 0;
    $unvoted_star_count = 5;
}
@endphp

<div class="row">
    <div class="col-lg-3">
        <div id="review_summary">
            <strong>{{$avgRating}}</strong>
            <div class="rating">
                @for ($i = 0; $i < floor($avgRating); $i++)
                    <i class="icon_star voted"></i>
                @endfor
                @if (substr($avgRating, -2) > $avgrating_subthreshold)
                    <i class="icon_star-half_alt voted"></i>
                @endif
                @for ($i = 0; $i < $unvoted_star_count; $i++)
                    <i class="icon_star"></i>
                @endfor
            </div>
            <small>Based on {{$totalReviews}} reviews</small>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="row">
            <div class="col-lg-10 col-9">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: {{$fiveStarPercent}}%"
                        aria-valuenow="{{$fiveStarPercent}}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="col-lg-2 col-3"><small><strong>5 stars</strong></small></div>
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-lg-10 col-9">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: {{$fourStarPercent}}%"
                        aria-valuenow="{{$fourStarPercent}}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="col-lg-2 col-3"><small><strong>4 stars</strong></small></div>
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-lg-10 col-9">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: {{$threeStarPercent}}%"
                        aria-valuenow="{{$threeStarPercent}}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="col-lg-2 col-3"><small><strong>3 stars</strong></small></div>
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-lg-10 col-9">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: {{$twoStarPercent}}%"
                        aria-valuenow="{{$twoStarPercent}}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="col-lg-2 col-3"><small><strong>2 stars</strong></small></div>
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-lg-10 col-9">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: {{$oneStarPercent}}%"
                        aria-valuenow="{{$oneStarPercent}}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="col-lg-2 col-3"><small><strong>1 stars</strong></small></div>
        </div>
        <!-- /row -->
    </div>
</div>
