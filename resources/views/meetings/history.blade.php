<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight items-center justify-center my-auto">
                {{ __('Histórico de Reuniões') }}
            </h2>

            <div class="flex flex-row gap-2">
                <a
                    href="{{ route('meetings.recovery_history') }}"
                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br font-medium rounded-lg text-sm px-5 py-2 text-center me-2 transition duration-300"
                >Recuperar Histórico</a>

                <a
                    href="{{ route('meetings.index') }}"
                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br font-medium rounded-lg text-sm px-5 py-2 text-center me-2 transition duration-300"
                >Voltar</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @forelse ($meetings as $meeting)
                        <x-meeting-card :meeting='$meeting' />
                    @empty
                        <div
                            class="p-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:text-blue-400"
                            role="alert"
                        >
                            <span class="font-medium">Nenhuma reunião encontrada.</span>
                        </div>
                    @endforelse
                </div>

                <div class="flex flex-row justify-center items-center mb-5">
                    {{ $meetings->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>