<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight items-center justify-center my-auto">
                {{ __('Informações da Reunião') }}
            </h2>

            <a
                href="{{ route('meetings.history') }}"
                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br font-medium rounded-lg text-sm px-5 py-2 text-center me-2 transition duration-300"
            >Voltar</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-alerts />

                    <div class="flex flex-col gap-4">
                        <div>
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900"
                            >Nome</label>

                            <input
                                type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                value="{{ $meeting->name }}"
                                disabled
                            />
                        </div>

                        <div class="w-full">
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900"
                            >Descrição</label>

                            <input
                                type="text"
                                class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500"
                                value="{{ $meeting->description }}"
                                disabled
                            />
                        </div>

                        <div class="flex flex-row gap-2">
                            <div class="w-full">
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                >Inicio</label>

                                <input
                                    type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    value="{{ $meeting->start_date }}"
                                    disabled
                                />
                            </div>

                            <div class="w-full">
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                >Fim</label>

                                <input
                                    type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    value="{{ $meeting->end_date }}"
                                    disabled
                                />
                            </div>
                        </div>

                        <div class="flex flex-row gap-2">
                            <div class="w-full">
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                >Quem iniciou</label>

                                <input
                                    type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    value="{{ $user->name }}"
                                    disabled
                                />
                            </div>

                            <div class="w-full">
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                >Nome da Sala</label>

                                <input
                                    type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    value="{{ $meeting->room_name }}"
                                    disabled
                                />
                            </div>
                        </div>

                        <div class="flex flex-row gap-2">
                            <div class="w-full">
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                >URL</label>

                                <input
                                    type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    value="{{ $meeting->room_url }}"
                                    disabled
                                />
                            </div>

                            <div class="w-full">
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                >ID</label>

                                <input
                                    type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    value="{{ $meeting->meeting_id }}"
                                    disabled
                                />
                            </div>
                        </div>

                        <div class="flex flex-row gap-2">
                            <div class="w-full">
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                >URL do Host</label>

                                <input
                                    type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    value="{{ $meeting->host_room_url }}"
                                    disabled
                                />
                            </div>

                            <div class="w-full">
                                <label
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                >URL do viewer</label>

                                <input
                                    type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    value="{{ $meeting->viewer_room_url }}"
                                    disabled
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>