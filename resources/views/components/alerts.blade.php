@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div
            class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:text-red-400"
            role="alert"
        >
            <span class="font-medium">{{ $error }}</span>
        </div>
    @endforeach
@endif

@if (session()->has('message'))
    <div
        class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:text-green-400"
        role="alert"
    >
        <span class="font-medium">{{ session('message') }}</span>
    </div>
@endif