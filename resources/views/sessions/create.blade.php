<x-layout>
    <x-setting header="Log In" class="w-1/3">
        <form action="/login" method="post" class="mt-10">
            @csrf <!-- cross-side request forgery -->
            <x-form.input name="email" type="email" />
            <x-form.input name="password" type="password" />
            <x-form.button>Log In</x-form.button>
        </form>
    </x-setting>
    <x-flash name="failure" />
</x-layout>
