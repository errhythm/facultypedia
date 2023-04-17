@props(['faculty' => $faculty])
{{-- add \App\Models\Faculties::all() --}}
@php
    $courses = \App\Models\Courses::all();
    $user = \App\Models\User::where('id', $faculty->id)->get();
    $faculty = $user[0];
    $facultyCourses = \App\Models\Faculties::where('id', $faculty->id)->get();
    // get average review of that faculty
    $reviews = \App\Models\Reviews::where('faculty_id', $faculty->id)->get();
    $total = 0;
    $count = 0;
    foreach ($reviews as $review) {
        $total += $review->rating;
        $count++;
    }
    if ($count == 0) {
        $average = 0;
    } else {
        $average = $total / $count;
    }
    $average = round($average, 2);
    $average = number_format($average, 1);
@endphp
                <div
                    class="group relative p-6 rounded-md shadow hover:shadow-md bg-base-300 transition duration-500 text-base-content text-center pb-20">
                    <div class="mt-8">
                        <img src="https://api.dicebear.com/5.x/bottts-neutral/svg?seed={{ md5($faculty->id . $faculty->created_at) }}&scale=110"
                        class="rounded-full shadow-md h-20 w-20 mx-auto block" alt="{{ $faculty->id . $faculty->created_at }}" />

                        <div class="mt-3">
                            <a href="/profile/{{ $faculty->id }}"
                                class="text-lg text-primary-content font-medium hover:text-primary-content transition duration-500 block">
                                {{ $faculty->name }}
                            </a>
                            <span class="block text-sm text-base-content/80 lowercase">
                                {{ $faculty->email }}
                            </span>
                        </div>
                    </div>

                    <div class="flex items-center justify-around my-4">
                        <span class="text-base-content font-medium text-sm">
                            {{ $faculty->department }}
                        </span>
                    </div>
                    <x-faculty-courses :facultyCourses="$facultyCourses" :courses="$courses" />
                    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2">
                        <a href="/profile/{{ $faculty->id }}"
                            class="btn bg-primary-content/5 hover:bg-primary-content border-primary-content/10 hover:border-primary-content text-primary-content hover:text-base-100 rounded-md w-full">
                            View Profile
                        </a>
                    </div>

                    <div class="absolute top-6 left-6">
                        <span
                            class="bg-primary-content/5 text-primary-content text-sm font-medium px-4 py-1 rounded-full h-[28px]">
                            {{ $faculty->university_id }}
                        </span>
                    </div>
                    <div class="absolute top-6 right-6">
                        <a href=""
                            class="btn btn-icon btn-sm text-primary-content bg-base-200 hover:bg-base-300 hover:border-base-content rounded-full">
                            <i class="uil uil-star text-primary-content"></i>&nbsp;
                        {{ $average }}
                        </a>
                    </div>
                </div>
