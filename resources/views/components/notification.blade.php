{{-- create a notification by alpinejs to show all the time --}}

{{-- @props(['message']) --}}

<div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
    class="fixed bottom-0 right-0 bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg">
    <div class="flex">
        <div class="py-1">
        </div>
        <div>
            <p class="font-bold">Notification</p>
            <p class="text-sm">Hi</p>
        </div>
    </div>
</div>
