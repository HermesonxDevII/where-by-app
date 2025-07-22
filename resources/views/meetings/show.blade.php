<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight items-center justify-center my-auto">
                {{ __('Ver Reunião') }}
            </h2>

            <a
                href="{{ route('meetings.index') }}"
                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br font-medium rounded-lg text-sm px-5 py-2 text-center me-2 transition duration-300"
            >Sair</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900 h-[calc(100vh-200px)]">
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

<script
    src="https://cdn.srv.whereby.com/embed/v2-embed.js"
    type="module"
></script>