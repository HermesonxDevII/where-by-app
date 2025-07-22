<div
    id="alert-additional-content-1"
    class="p-4 mb-4 text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:text-blue-400"
    role="alert"
>
    <div class="flex items-center">
        <svg
            class="shrink-0 w-4 h-4 me-2"
            aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg"
            fill="currentColor"
            viewBox="0 0 20 20"
        >
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"
            />
        </svg>
        <span class="sr-only">Info</span>
        <h3 class="text-lg font-medium">{{ $meeting->name }} (Live Disponivel)</h3>
    </div>

    <div class="mt-2 mb-4 text-sm">
        <p class="font-bold">{{ $meeting->description }}</p>
    </div>

    <div class="flex flex-col gap-2 mt-2 mb-4 text-sm">
        <div>
            <p class="font-bold">Inicio: {{ $meeting->start_date }}</p>
            <p class="font-bold">Fim: {{ $meeting->end_date }}</p>
        </div>

        Clique no botão abaixo para acessar
    </div>
    
    <div class="flex">
        <a
            href="{{ route('meetings.show', $meeting->id) }}"
            class="flex flex-row justify-center items-center text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br font-medium rounded-lg text-sm px-5 py-2 text-center me-2 transition duration-300"
        >
            <svg
                class="me-2 h-3 w-3"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 20 14"
            >
                <path
                    d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"
                />
            </svg>
            Assistir
        </a>
    </div>
</div>