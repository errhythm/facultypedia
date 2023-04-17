<!-- COMMON SCRIPTS -->

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>


{{-- if there is any sesson message --}}
@if (session()->has('message'))
    <div x-data>
        <div id="notificationWrapperTopRight" class="fixed bottom-4 max-w-sm right-4 space-y-2"></div>
        <template id="notificationAlertAnimated">
            <div role="alert" id="notificationAlertAnimated"
                class="p-4 bg-accent/30 shadow-lg rounded-lg text-accent-content border border-base-content data-[notify-show=true]:animate-slide-in data-[notify-show=false]:animate-slide-out">
                {notificationText}
            </div>
        </template>

        <div x-init="$notify('{{ session('message') }}')" x-transition></div>
        <script>
            window.notificationOptions = {
                wrapperId: 'notificationWrapperTopRight',
                templateId: 'notificationAlertAnimated',
                autoClose: 3000,
                autoRemove: 4000,
            }
        </script>
    </div>
@endif
