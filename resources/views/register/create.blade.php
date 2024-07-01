<x-layout>
    <x-setting header="Register" class="w-1/3">
        <form action="/register" method="post" class="mt-10">
            @csrf <!-- cross-side request forgery -->
            <x-form.input name="name" />
            <x-form.input name="username" />
            <x-form.input name="email" type="email" />
            <x-form.input name="password" type="password" />
            <x-form.button>Register</x-form.button>
        </form>
    </x-setting>
</x-layout>
