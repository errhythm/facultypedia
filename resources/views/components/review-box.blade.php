@props(['review' => $review])

@php
    $user = \App\Models\User::find($review->user_id);
    $date = date('F d, Y', strtotime($review->created_at));
    $userIdentifier = strtoupper(substr(md5($review->user_id), 0, 4));
@endphp
<div class="review-box clearfix">
    <figure class="rev-thumb"><img src="https://api.dicebear.com/5.x/bottts-neutral/svg?seed={{ md5($user->id . $user->created_at) }}&rotate=20&scale=110"
            alt="">
    </figure>
    <div class="rev-content">
        <div class="rev-info">
            @auth

            {{-- if review is not isAnonymous and the logged in user role is student --}}
            @if ($review->isAnonymous == 0 && Auth::user()->role == 'student')
                <h6>{{ $user->name }}</h6>
            @elseif (Auth::user()->role == 'faculty')
                <h6>Anonymous</h6><i class="icon-info-circled-alt" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Anonymous#{{ $userIdentifier }}"></i>
            @endauth
            @else
                <h6>Anonymous</h6><i class="icon-info-circled-alt" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Anonymous#{{ $userIdentifier }}"></i>
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
