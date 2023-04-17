<x-dashboard>
    <div class="py-6">
        <div class="px-4 ml-auto mt-8 sm:px-6 md:px-8">
            <section class="px-4 py-5 sm:p-6">
                <div class="sm:flex sm:items-center sm:justify-between items-center">
                    <h2 class="text-xl font-bold text-base-content/80">{{ $heading }} - <a href="{{ route('profile', $user->id )}}">{{ $user->name }}</a></h2>
                     {{-- delete user no button --}}
                            <div class="">
                                <label for="deleteUser" class="text-sm font-medium cursor-pointer">Delete User</label>
                            </div>
                </div>

                <div class="grid lg:grid-cols-3 gap-5">
                <form action="" class="mt-12 max-w-3xl">
                    <div class="space-y-8">
                        {{-- Name --}}
                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-5">
                            <label for=""
                                class="block text-sm font-bold text-base-content sm:mt-px sm:pt-2">Name</label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input type="text" name="name" id="name" autocomplete="name"
                                    class="block w-full px-4 py-3 text-base-content border border-base-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
                                    value="{{ $user->name }}">
                            </div>
                        </div>
                        {{-- Email --}}
                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-5">
                            <label for=""
                                class="block text-sm font-bold text-base-content sm:mt-px sm:pt-2">Email</label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input type="text" name="email" id="email" autocomplete="email"
                                    class="block w-full px-4 py-3 text-base-content border border-base-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
                                    value="{{ $user->email }}">
                            </div>
                        </div>
                        {{-- University ID --}}
                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-5">
                            <label for=""
                                class="block text-sm font-bold text-base-content sm:mt-px sm:pt-2">University ID</label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <input type="text" name="university_id" id="university_id" autocomplete="university_id"
                                    class="block w-full px-4 py-3 text-base-content border border-base-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
                                    value="{{ $user->university_id }}">
                            </div>
                        </div>
                        {{-- role dropdown --}}
                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-5">
                            <label for="role"
                                class="block text-sm font-bold text-base-content sm:mt-px sm:pt-2">Role</label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <select id="role" name="role"
                                    class="block w-full px-4 py-3 text-base-content border border-base-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                                    <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>Student</option>
                                    <option value="faculty" {{ $user->role == 'faculty' ? 'selected' : '' }}>Faculty</option>
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </div>
                        </div>
                        {{-- update button --}}
                        <div class="sm:grid sm:grid-cols-6 sm:items-start sm:gap-5">
                            <div></div>
                            <div></div>
                            <label for="role"
                                class="block text-sm font-bold text-base-content sm:mt-px sm:pt-2"></label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-primary border border-transparent rounded-md shadow-sm hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                                    Update
                                </button>
                            </div>

                        </div>



                    </div>

                </form>
                {{-- show the profile picture --}}
                <a class="m-auto" href="{{ route('profile', $user->id )}}"><img class="object-cover w-48 h-48 rounded-lg m-auto hidden lg:block"
                                                                    src="https://api.dicebear.com/5.x/bottts-neutral/svg?seed={{ md5($user->id . $user->created_at) }}&scale=110"
                                                                    alt="{{ $user->name }}>
                                                                                <div
                                                                                    class="py-2
                                                                    text-sm font-medium text-base-content/70"></a>
                </div>



            </section>
        </div>
    </div>

    <input type="checkbox" id="deleteUser" class="modal-toggle" />
            <label for="deleteUser" class="modal cursor-pointer">
        <label class="modal-box relative" for="">
            <h3 class="text-lg font-bold">Are you sure?</h3>
            <p class="py-4">Are you sure you want to delete this user? This cannot be undone.</p>
            <div class="modal-action">
                <label for="deleteUser" class="btn btn-ghost">Cancel</label>
                <form action="{{ route('deleteUser', $user->id) }}" method="POST">
                    @csrf
                    <button class="btn btn-error">Delete</button>
                </form>
            </div>
        </label>
    </label>

</x-dashboard>
