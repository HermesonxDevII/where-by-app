<button
  type="button"
  @click="
    navigator.clipboard.writeText($refs.copyInput.value)
      .then(() => Toast.fire({ icon: 'success', title: 'Copiado com Sucesso!' }))
      .catch(() => Toast.fire({ icon: 'error', title: 'Houve um erro ao tentar copiar' }))
  "
  {{
    $attributes->merge([
      'class' => 'absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 focus:outline-none hover:text-gray-700 transition-colors'
    ])
  }}
>
  <svg
    class="w-5 h-5"
    fill="none"
    stroke="currentColor"
    viewBox="0 0 24 24"
    xmlns="http://www.w3.org/2000/svg"
  >
    <path
      stroke-linecap="round"
      stroke-linejoin="round"
      stroke-width="2"
      d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"
    ></path>
  </svg>
</button>
