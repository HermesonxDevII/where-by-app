<button
  type="button"
  @click="locked = !locked"
  {{
    $attributes->merge([
      'class' => 'absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 focus:outline-none hover:text-gray-700 transition-colors'
    ])
  }}
>
  <!-- Closed lock -->
  <svg
    x-show="locked"
    class="w-5 h-5"
    fill="none"
    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
  </svg>

  <!-- Opened lock -->
  <svg
    x-show="!locked"
    x-cloak class="w-5 h-5"
    fill="none"
    stroke="currentColor"
    viewBox="0 0 24 24"
    xmlns="http://www.w3.org/2000/svg"
  >
    <path
      stroke-linecap="round"
      stroke-linejoin="round"
      stroke-width="2"
      d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"
    ></path>
  </svg>
</button>
