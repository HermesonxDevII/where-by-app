<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight items-center justify-center my-auto">
                {{ __('Ver Reunião') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900 h-[calc(100vh-200px)]">
                    <whereby-embed room="{{ $meeting->room_url }}" />
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