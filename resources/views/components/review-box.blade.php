@props(['review' => $review])

@php
    // get user info from user model in user_id
    $user = \App\Models\User::find($review->user_id);
    // format the created_at date and time
    $date = date('F d, Y', strtotime($review->created_at));
@endphp
<div class="review-box clearfix">
    <figure class="rev-thumb"><img src="http://via.placeholder.com/150x150.jpg"
            alt="">
    </figure>
    <div class="rev-content">
        <div class="rev-info">
            @if ($review->isAnonymous == 0)
                <h6>{{ $user->name }}</h6>
            @else
                <h6>Anonymous</h6>
            @endif
            – {{ $date }}
        </div>
        <div class="rating" style="padding-bottom: 0.5em;">
            @for ($i = 0; $i < $review->rating; $i++)
                <i class="icon_star voted"></i>
            @endfor
            @for ($i = 0; $i < 5 - $review->rating; $i++)
                <i class="icon_star"></i>
            @endfor
        </div>
        <div class="rev-text">
            <p>
                {{ $review->review }}
            </p>
        </div>
    </div>
</div>
