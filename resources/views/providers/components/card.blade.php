@props(['provider'])

<div
  x-data="{ open: false }"
  class="w-full bg-gray-100 rounded-lg overflow-hidden"
>
  <button
    @click="open = !open"
    class="w-full h-14 flex items-center justify-between px-5 hover:bg-gray-200 transition-colors duration-200 cursor-pointer focus:outline-none"
  >
    <span class="font-bold text-gray-800">{{ $provider->name }}</span>

    <div class="flex items-center gap-2">
      {{-- Status --}}
      <span
        class="w-4 h-4 rounded-full {{ $provider->active ? 'bg-green-500' : 'bg-red-500' }}"
        title="{{ $provider->active ? 'Provedor Ativo' : 'Provedor Inativo' }}"
      ></span>

      {{-- Chevron --}}
      <svg
        class="w-5 h-5 text-gray-500 transition-transform duration-300"
        :class="open ? 'rotate-180' : ''"
        fill="none" stroke="currentColor"
        viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M19 9l-7 7-7-7"
        ></path>
      </svg>
    </div>
  </button>

  <div
    x-show="open"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 translate-y-[-10px]"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 translate-y-[-10px]"
    class="px-5 pb-5 pt-2 border-t border-gray-200"
    style="display: none;"
  >
    <form
      action="{{ route('providers.update', [$provider->id]) }}"
      method="POST"
      class="flex flex-col gap-4"
    >
      @csrf()
      @method('PUT')

      {{-- Active field --}}
      <div class="flex flex-row items-center justify-between">
        <x-label>Ativo</x-label>

        <label class="inline-flex items-center cursor-pointer">
          <input type="hidden" name="active" value="0">

          <input
            type="checkbox"
            name="active"
            value="1"
            class="sr-only peer"
            @checked(old('active', $provider->active ?? false))
          >

          <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
        </label>
      </div>

      {{-- Base URL field --}}
      <div x-data="{ locked: true }">
        <x-label>URL Base</x-label>
        <div class="relative">
          <input
            type="text"
            id="base_url"
            name="base_url"
            x-ref="copyInput"
            :readonly="locked"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-16 read-only:opacity-60 read-only:bg-gray-200"
            placeholder="Digite a URL Base"
            value="{{ old('base_url', $provider->base_url ?? '') }}"
            required
          />
          <div class="absolute inset-y-0 right-0 pr-3 flex items-center gap-1">
            <x-providers::copy-button class="!static !pr-0" x-show="locked" x-cloak />
            <x-providers::lock-toggle class="!static !pr-0" />
          </div>
        </div>
      </div>

      {{-- Base API URL field --}}
      @if ($provider->isZoom())
        <div x-data="{ locked: true }">
          <x-label>URL Base da API</x-label>
          <div class="relative">
            <input
              type="text"
              id="base_api_url"
              name="base_api_url"
              x-ref="copyInput"
              :readonly="locked"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-16 read-only:opacity-60 read-only:bg-gray-200"
              placeholder="Digite a URL Base da API"
              value="{{ old('base_api_url', $provider->base_api_url ?? '') }}"
            />
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center gap-1">
              <x-providers::copy-button class="!static !pr-0" x-show="locked" x-cloak />
              <x-providers::lock-toggle class="!static !pr-0" />
            </div>
          </div>
        </div>
      @endif

      {{-- Account ID field --}}
      @if ($provider->isZoom())
        @php $hasAccountId = !empty($provider->account_id); @endphp
        <div x-data="{ show: false, locked: {{ $hasAccountId ? 'true' : 'false' }} }">
          <x-label>ID da Conta</x-label>

          <div class="relative">
            <input
              :type="show && !locked ? 'text' : 'password'"
              id="account_id"
              name="account_id"
              x-ref="copyInput"
              :readonly="locked"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 {{ $hasAccountId ? 'pr-20' : 'pr-10' }}"
              :class="locked ? 'read-only:opacity-60 read-only:bg-gray-200' : ''"
              placeholder="Digite o ID da Conta"
              value="{{ old('account_id', $provider->account_id ?? '') }}"
            />

            @if ($hasAccountId)
              <div class="absolute inset-y-0 right-0 pr-3 flex items-center gap-1">
                <x-providers::copy-button class="!static !pr-0" x-show="locked" x-cloak />
                <x-providers::password-toggle class="!static !pr-0" x-show="!locked" x-cloak />
                <x-providers::lock-toggle class="!static !pr-0" />
              </div>
            @else
              <x-providers::password-toggle />
            @endif
          </div>
        </div>
      @endif

      {{-- Client ID field --}}
      @if ($provider->isZoom())
        @php $hasClientId = !empty($provider->client_id); @endphp
        <div x-data="{ show: false, locked: {{ $hasClientId ? 'true' : 'false' }} }">
          <x-label>ID do Cliente</x-label>

          <div class="relative">
            <input
              :type="show && !locked ? 'text' : 'password'"
              id="client_id"
              name="client_id"
              x-ref="copyInput"
              :readonly="locked"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 {{ $hasClientId ? 'pr-20' : 'pr-10' }}"
              :class="locked ? 'read-only:opacity-60 read-only:bg-gray-200' : ''"
              placeholder="Digite o ID do Cliente"
              value="{{ old('client_id', $provider->client_id ?? '') }}"
            />

            @if ($hasClientId)
              <div class="absolute inset-y-0 right-0 pr-3 flex items-center gap-1">
                <x-providers::copy-button class="!static !pr-0" x-show="locked" x-cloak />
                <x-providers::password-toggle class="!static !pr-0" x-show="!locked" x-cloak />
                <x-providers::lock-toggle class="!static !pr-0" />
              </div>
            @else
              <x-providers::password-toggle />
            @endif
          </div>
        </div>
      @endif

      {{-- Client Secret field --}}
      @if ($provider->isZoom())
        @php $hasClientSecret = !empty($provider->client_secret); @endphp
        <div x-data="{ show: false, locked: {{ $hasClientSecret ? 'true' : 'false' }} }">
          <x-label>ID Secreto do Cliente</x-label>

          <div class="relative">
            <input
              :type="show && !locked ? 'text' : 'password'"
              id="client_secret"
              name="client_secret"
              x-ref="copyInput"
              :readonly="locked"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 {{ $hasClientSecret ? 'pr-20' : 'pr-10' }}"
              :class="locked ? 'read-only:opacity-60 read-only:bg-gray-200' : ''"
              placeholder="Digite o ID Secreto do Cliente"
              value="{{ old('client_secret', $provider->client_secret ?? '') }}"
            />

            @if ($hasClientSecret)
              <div class="absolute inset-y-0 right-0 pr-3 flex items-center gap-1">
                <x-providers::copy-button class="!static !pr-0" x-show="locked" x-cloak />
                <x-providers::password-toggle class="!static !pr-0" x-show="!locked" x-cloak />
                <x-providers::lock-toggle class="!static !pr-0" />
              </div>
            @else
              <x-providers::password-toggle />
            @endif
          </div>
        </div>
      @endif

      {{-- Secret Token field --}}
      @php $hasSecretToken = !empty($provider->secret_token); @endphp
      <div x-data="{ show: false, locked: {{ $hasSecretToken ? 'true' : 'false' }} }">
        <x-label>Token Secreto</x-label>

        <div class="relative">
          <input
            :type="show && !locked ? 'text' : 'password'"
            id="secret_token"
            name="secret_token"
            x-ref="copyInput"
            :readonly="locked"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 {{ $hasSecretToken ? 'pr-20' : 'pr-10' }}"
            :class="locked ? 'read-only:opacity-60 read-only:bg-gray-200' : ''"
            placeholder="Digite o Token"
            value="{{ old('secret_token', $provider->secret_token ?? '') }}"
          />

          @if ($hasSecretToken)
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center gap-1">
              <x-providers::copy-button class="!static !pr-0" x-show="locked" x-cloak />
              <x-providers::password-toggle class="!static !pr-0" x-show="!locked" x-cloak />
              <x-providers::lock-toggle class="!static !pr-0" />
            </div>
          @else
            <x-providers::password-toggle />
          @endif
        </div>
      </div>

      {{-- Buttons --}}
      <div class="flex flex-row gap-2">
        <button
          type="submit"
          class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 transition duration-300"
        >Salvar</button>

        <button
          type="reset"
          @click="open = false"
          class="text-white bg-red-700 hover:bg-red-800 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 transition duration-300"
        >Cancelar</button>
      </div>
    </form>
  </div>
</div>
