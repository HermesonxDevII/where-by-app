<x-app-layout>
  <x-slot name="header">
    <div class="flex flex-row justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight items-center justify-center my-auto">
        {{ __('Provedores') }}
      </h2>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <x-alerts />

          <div class="flex flex-col gap-3">
            @forelse ($providers as $provider)
              <x-providers::card :provider="$provider" />
            @empty
              <div
                class="p-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:text-blue-400"
                role="alert"
              >
                <span class="font-medium">Nenhum provedor encontrado.</span>
              </div>
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
