@if (session()->has($name) && $name == 'success')
    <div class="fixed bottom-3 right-3 rounded-xl text-sm text-white bg-green-600 px-3 py-3" x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 4000)" x-show="show">
        <p>{{ session('success') }}</p>
    </div>


@elseif (session()->has($name) && $name == 'failure')
    <div class="fixed bottom-3 right-3 rounded-xl text-sm text-white bg-red-600 px-3 py-3" x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 4000)" x-show="show">
        <p>{{ session('failure') }}</p>
    </div>

@endif
