@if ($meeting->getRawOriginal('end_date') >= now())
    <div
        id="alert-additional-content-1"
        class="p-4 mb-4 text-green-800 border border-green-300 rounded-lg bg-green-50 dark:text-green-400"
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
            <h3 class="flex flex-row gap-2 text-lg font-medium items-center">
                {{ $meeting->name }}

                @if ($meeting->getRawOriginal('end_date') >= now())
                    <span class="bg-green-500 text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm">Online</span>
                @else
                    <span class="bg-red-500 text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm">Offline</span>
                @endif
            </h3>
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
                class="flex flex-row justify-center items-center text-white bg-gradient-to-r from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br font-medium rounded-lg text-sm px-5 py-2 text-center me-2 transition duration-300"
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
@else
    <div
        id="alert-additional-content-1"
        class="p-4 mb-4 text-red-800 border border-red-300 rounded-lg bg-red-50 dark:text-red-400"
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
            <h3 class="flex flex-row gap-2 text-lg font-medium items-center">
                {{ $meeting->name }}

                <span class="bg-red-500 text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm">Offline</span>
            </h3>
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
                href="{{ route('meetings.info', $meeting->id) }}"
                class="flex flex-row justify-center items-center text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br font-medium rounded-lg text-sm px-5 py-2 text-center me-2 transition duration-300"
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
                Informações
            </a>
        </div>
    </div>
@endif