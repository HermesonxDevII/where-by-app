<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight items-center justify-center my-auto">
                {{ __('Ver Reunião') }}
            </h2>

            <div class="flex flex-row gap-2">
                <a
                    href="{{ route('meetings.index') }}"
                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br font-medium rounded-lg text-sm px-5 py-2 text-center me-2 transition duration-300"
                >Sair</a>

                <button
                    data-modal-target="popup-modal"
                    data-modal-toggle="popup-modal"
                    class="text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br font-medium rounded-lg text-sm px-5 py-2 text-center me-2 transition duration-300"
                    type="button"
                >Deletar</button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900 h-[calc(100vh-200px)]">
                    <x-alerts />

                    <x-meeting-modal :meeting="$meeting" />

                    <whereby-embed
                        room="{{$isHost
                            ? $meeting->host_room_url
                            : $meeting->viewer_room_url
                        }}"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    whereby-embed {
        width: inherit;
        height: inherit;
        padding: inherit;
        margin: inherit;
    }
</style>