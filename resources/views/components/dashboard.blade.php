<x-layout :header=true :footer=true>
    <div class="flex flex-1">
        <div class="hidden xl:flex xl:w-64 xl:flex-col border-black">
            <div class="flex flex-col pt-5 overflow-y-auto">
                <div class="flex flex-col justify-between flex-1 h-full px-4">
                    <div class="space-y-4">
                        <nav class="flex-1 space-y-2">
                            <x-menuadmin :mode=0 />
                        </nav>

                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col flex-1 overflow-x-hidden">
            <main class="min-h-screen">
                {{ $slot }}
            </main>
        </div>
    </div>
</x-layout>
