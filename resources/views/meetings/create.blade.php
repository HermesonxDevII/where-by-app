<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight items-center justify-center my-auto">
                {{ __('Criar Reunião') }}
            </h2>

            <a
                href="{{ route('meetings.index') }}"
                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br font-medium rounded-lg text-sm px-5 py-2 text-center me-2 transition duration-300"
            >Voltar</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-alerts />
                    <form
                        action="{{ route('meetings.store') }}"
                        method="POST"
                        class="flex flex-col gap-4"
                    >
                        @csrf()
                        <div>
                            <label
                                for="name"
                                class="block mb-2 text-sm font-medium text-gray-900"
                            >Nome</label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Digite o Nome da Reunião"
                                value="{{ old('name') }}"
                                required
                            />
                        </div>

                        <div>
                            <label
                                for="description"
                                class="block mb-2 text-sm font-medium text-gray-900"
                            >Descrição</label>

                            <input
                                type="text"
                                id="description"
                                name="description"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Digite a Descrição da Reunião"
                                value="{{ old('description') }}"
                            />
                        </div>

                        <div>
                            <label
                                for="end_dateTime"
                                class="block mb-2 text-sm font-medium text-gray-900"
                            >Data/Hora Final</label>

                            <input
                                type="datetime-local"
                                id="end_dateTime"
                                name="end_dateTime"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Selecione a Data/Hora que a transmissão termina"
                                value="{{ old('end_dateTime') }}"
                                required
                            />
                        </div>

                        <div class="flex flex-row gap-2">
                            <div class="w-full">
                                <label
                                    for="type"
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                >Tipo de Reunião</label>
                                
                                <select
                                    id="type"
                                    name="type"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required
                                >
                                    <option
                                        {{ old('type') ? '' : 'selected' }}
                                        disabled
                                    >Selecione uma opção</option>

                                    <option
                                        value="normal"
                                        {{ old('type') == 'normal' ? 'selected' : '' }}
                                    >Normal (4 Membros)</option>

                                    <option
                                        value="group"
                                        {{ old('type') == 'group' ? 'selected' : '' }}
                                    >Grupo (5 Membros ou Mais)</option>
                                </select>
                            </div>

                            <div class="w-full">
                                <label
                                    for="record_trigger"
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                >Gatilho para iniciar Gravação</label>
                                
                                <select
                                    id="record_trigger"
                                    name="record_trigger"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required
                                >
                                    <option
                                        {{ old('record_trigger') == '' ? 'selected' : '' }}
                                        disabled
                                    >Selecione uma opção</option>
                                    
                                    <option
                                        value="none"
                                        {{ old('record_trigger') == 'none' ? 'selected' : '' }}
                                    >Iniciar Manualmente</option>
                                    
                                    <option
                                        value="prompt"
                                        {{ old('record_trigger') == 'prompt' ? 'selected' : '' }}
                                    >Perguntar se quer iniciar</option>
                                    
                                    <option
                                        value="automatic"
                                        {{ old('record_trigger') == 'automatic' ? 'selected' : '' }}
                                    >Automatico (Quando tiver 1 pessoa)</option>
                                    
                                    <option
                                        value="automatic-2nd-participant"
                                        {{ old('record_trigger') == 'automatic-2nd-participant' ? 'selected' : '' }}
                                    >Automatico (Quando tiver mais de 1 pessoa)</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex flex-row gap-2">
                            <div class="w-full">
                                <label
                                    for="record_type"
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                >Tipo de Gravação</label>
                                
                                <select
                                    id="record_type"
                                    name="record_type"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required
                                >
                                    <option
                                        {{ old('record_type') == '' ? 'selected' : '' }}
                                        disabled
                                    >Selecione uma opção</option>
                                    
                                    <option
                                        value="local"
                                        {{ old('record_type') == 'local' ? 'selected' : '' }}
                                    >Local (Navegador)</option>
                                    
                                    <option
                                        value="cloud"
                                        {{ old('record_type') == 'cloud' ? 'selected' : '' }}
                                    >Cloud (Nuvem)</option>
                                </select>
                            </div>

                            <div class="w-full">
                                <label
                                    for="record_location"
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                >Local da Gravação</label>
                                
                                <select
                                    id="record_location"
                                    name="record_location"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required
                                >
                                    <option
                                        {{ old('record_location') == '' ? 'selected' : '' }}
                                        disabled
                                    >Selecione uma opção</option>
                                    
                                    <option
                                        value="s3"
                                        {{ old('record_location') == 's3' ? 'selected' : '' }}
                                        disabled
                                    >Amazon S3</option>
                                    
                                    <option
                                        value="whereby"
                                        {{ old('record_location') == 'whereby' ? 'selected' : '' }}
                                    >WhereBy</option>
                                </select>
                            </div>

                            <div class="w-full">
                                <label
                                    for="record_format"
                                    class="block mb-2 text-sm font-medium text-gray-900"
                                >Formato da Gravação</label>
                                
                                <select
                                    id="record_format"
                                    name="record_format"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required
                                >
                                    <option
                                        {{ old('record_format') == '' ? 'selected' : '' }}
                                        disabled
                                    >Selecione uma opção</option>
                                    
                                    <option
                                        value="mkv"
                                        {{ old('record_format') == 'mkv' ? 'selected' : '' }}
                                    >.mkv</option>
                                    
                                    <option
                                        value="mp4"
                                        {{ old('record_format') == 'mp4' ? 'selected' : '' }}
                                    >.mp4</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex flex-row gap-2">
                            <div class="flex items-center justify-center">
                                <input
                                    id="is_locked"
                                    name="is_locked"
                                    type="checkbox"
                                    value="1"
                                    @if(old('is_locked', false))
                                        checked
                                    @endif
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2"
                                />
                                <label
                                    for="is_locked"
                                    class="ms-2 text-sm"
                                >Sala Fechada</label>
                            </div>
                        </div>

                        <div class="flex flex-row gap-2">
                            <button
                                type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 transition duration-300"
                            >Iniciar</button>

                            <a
                                href="{{ route('meetings.index') }}"
                                class="text-white bg-red-700 hover:bg-red-800 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 transition duration-300"
                            >Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>