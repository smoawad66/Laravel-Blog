<!DOCTYPE html>

<html class="dark" style="scroll-behavior: smooth">

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">

<body style="font-family: Open Sans, sans-serif; color:white; background-color: #040a14">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo-white.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 flex items-center md:mt-0">

                @guest <!-- equ. to if(! auth()->check()) -->
                    <a href="/register" class="mr-5 text-xs font-bold uppercase">Register</a>
                    <a href="/login" class="text-xs mr-3 font-bold uppercase">Login</a>
                @else
                    <x-dropdown class="mr-4 border-2 rounded-full border-gray-800">
                        <x-slot name="trigger">
                            <span class="text-xs py-2 block text-white hover:text-blue-500 font-bold uppercase">Welcome,
                                {{ auth()->user()->trunc('name', 14) }}
                            </span>
                        </x-slot>


                        {{-- @if (auth()->user()->can('admin'))  --}}
                        {{-- @can('admin') --}}
                        @admin
                            <x-dropdown-item href="/admin/posts" :active="request()->is('admin/posts')">Manage posts</x-dropdown-item>
                            <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')">New post</x-dropdown-item>
                        @endadmin

                        <x-dropdown-item href="/favourite" :active="request()->is('favourite')">Favourite posts</x-dropdown-item>

                        <x-dropdown-item :active="false">
                            <form class="inline" action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="text-sm">Logout</button>
                            </form>
                        </x-dropdown-item>

                    </x-dropdown>

                @endguest

                <a href="#subscribe"
                    class="transition-colors duration-300 bg-blue-600 ml-3 hover:bg-blue-700 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

        {{ $slot }}

        <footer id="subscribe"
            class="bg-gray-800 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/larydefault.svg" alt="" class="mx-auto -mb-6"
                style="width: 145px; margin-bottom: 20px;" />
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative mb-2 inline-block mx-auto lg:bg-gray-200 rounded-full">
                    <form method="POST" action="/newsletter" class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" name="email" type="text" placeholder="Your email address"
                                class="text-black lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none"
                                required>
                        </div>

                        <button type="submit"
                            class="transition-colors duration-300 bg-blue-600 hover:bg-blue-700 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                            Subscribe
                        </button>
                    </form>
                </div>

                <x-form.error name="email" />

            </div>
        </footer>
    </section>

    <x-flash name='success' />

</body>

</html>
