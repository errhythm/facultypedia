@props(['faculty' => $faculty])
{{-- add \App\Models\Faculties::all() --}}
@php
    $courses = \App\Models\Courses::all();
    $user = \App\Models\User::where('id', $faculty->id)->get();
    $faculty = $user[0];
    $facultyCourses = \App\Models\Faculties::where('id', $faculty->id)->get();
@endphp



                <div
                    class="group relative p-6 rounded-md shadow hover:shadow-md bg-base-300 transition duration-500 text-base-content text-center">
                    <div class="mt-8">
                        <img src="https://api.dicebear.com/5.x/bottts-neutral/svg?seed={{ md5($faculty->id . $faculty->created_at) }}&scale=110"
                        class="rounded-full shadow-md h-20 w-20 mx-auto block" alt="{{ $faculty->id . $faculty->created_at }}" />

                        <div class="mt-3">
                            <a href="page-job-candidate-detail.html"
                                class="text-lg text-base-content font-medium hover:text-primary-content transition duration-500 block">
                                {{ $faculty->name }}
                            </a>
                            <span class="block text-sm text-base-content">
                                {{ $faculty->email }}
                            </span>
                        </div>
                    </div>

                    <div class="flex items-center justify-around my-4">
                        <span class="text-base-content">
                            <i class="uil uil-map-marker text-base-content mr-1"></i>
                            {{ $faculty->department }}
                        </span>
                        <span class="text-base-content">
                            <i class="uil uil-dollar-sign text-base-content mr-1"></i>
                            {{ $faculty->university_id }}
                        </span>
                    </div>

                    <x-faculty-courses :facultyCourses="$facultyCourses" :courses="$courses" />

                    <div class="mt-4">
                        <a href="/profile/{{ $faculty->id }}"
                            class="btn bg-primary-content/5 hover:bg-primary-content border-primary-content/10 hover:border-primary-content text-primary-content hover:text-base-100 rounded-md w-full">
                            View Profile
                        </a>
                    </div>

                    <div class="absolute top-6 left-6">
                        <span
                            class="bg-primary-content/5 text-primary-content text-sm font-medium px-4 py-1 rounded-full h-[28px]">
                            Featured
                        </span>
                    </div>
                    <div class="absolute top-6 right-6">
                        <a href=""
                            class="btn btn-icon btn-sm bg-base-200 hover:bg-base-300 hover:border-base-content rounded-full">
                            <i class="uil uil-bookmark text-primary-content"></i>
                        </a>
                    </div>
                </div>
