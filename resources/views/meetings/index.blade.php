<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight items-center justify-center my-auto">
                {{ __('Meetings') }}
            </h2>

            <a
                href="{{ route('meetings.create') }}"
                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br font-medium rounded-lg text-sm px-5 py-2 text-center me-2 transition duration-300"
            >Criar reunião</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-alerts />
                    
                    @forelse ($meetings as $meeting)
                        <x-meeting-card :meeting="$meeting" />
                    @empty
                        <div
                            class="p-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:text-blue-400"
                            role="alert"
                        >
                            <span class="font-medium">Nenhuma reunião encontrada.</span>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>