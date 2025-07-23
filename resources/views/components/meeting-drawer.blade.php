<div
    id="drawer-right-example"
    class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-80"
    tabindex="-1"
    aria-labelledby="drawer-right-label"
>
    <h5
        id="drawer-right-label"
        class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400"
    >
        <svg
            class="w-4 h-4 me-2.5"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="currentColor"
            viewBox="0 0 20 20"
        >
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"
            />
        </svg>
        Mudar Cor da Reunião
    </h5>

    <button
        type="button"
        data-drawer-hide="drawer-right-example"
        aria-controls="drawer-right-example"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center"
    >
        <svg
            class="w-3 h-3"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 14 14"
        >
            <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
            />
        </svg>
        <span class="sr-only">Close menu</span>
    </button>

    <form
        action="{{ route('meetings.change_color', $meeting->id) }}"
        method="POST"
        class="flex flex-col gap-4"
    >
        @csrf()
        <div>
            <label
                for="primary_color"
                class="block mb-2 text-sm font-medium text-gray-900"
            >Cor Primária</label>

            <input
                type="color"
                id="primary_color"
                name="primary_color"
                class="h-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5"
                placeholder="Digite o Nome da Reunião"
                value="{{ $meeting->primary_color ?? old('primary_color') }}"
            />
        </div>

        <div>
            <label
                for="secondary_color"
                class="block mb-2 text-sm font-medium text-gray-900"
            >Cor Secundária</label>

            <input
                type="color"
                id="secondary_color"
                name="secondary_color"
                class="h-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5"
                placeholder="Digite a Descrição da Reunião"
                value="{{ $meeting->secondary_color ?? old('secondary_color') }}"
            />
        </div>

        <div>
            <label
                for="focus_color"
                class="block mb-2 text-sm font-medium text-gray-900"
            >Cor de Foco</label>

            <input
                type="color"
                id="focus_color"
                name="focus_color"
                class="h-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5"
                placeholder="Digite a Descrição da Reunião"
                value="{{ $meeting->focus_color ?? old('focus_color') }}"
            />
        </div>

        <div class="flex flex-row gap-2">
            <button
                type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition duration-300"
            >Salvar</button>

            <button
                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-md text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800 transition duration-300"
                type="button"
                data-drawer-hide="drawer-right-example"
                aria-controls="drawer-right-example"
            >Cancelar</button>
        </div>
    </form>
</div>