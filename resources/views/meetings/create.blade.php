<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight items-center justify-center my-auto">
                {{ __('Criar Reunião') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form
                        action="{{ route('meetings.store') }}"
                        method="POST"
                        class="flex flex-col gap-3"
                    >
                        @csrf()
                        <div>
                            <label
                                for="datetime_stream"
                                class="block mb-2 text-sm font-medium text-gray-900"
                            >Data/Hora Final</label>

                            <input
                                type="datetime-local"
                                id="datetime_stream"
                                name="datetime_stream"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Selecione a Data/Hora que a transmissão termina"
                                value="{{ old('datetime_stream') }}"
                                required
                            />
                        </div>

                        <div class="flex flex-row gap-2">
                            <button
                                type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition duration-300"
                            >Iniciar</button>

                            <a
                                href="{{ route('meetings.index') }}"
                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 transition duration-300"
                            >Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>