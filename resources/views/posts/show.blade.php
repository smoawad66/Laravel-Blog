<x-layout>
    <section class="px-6 py-8">
        <main class="mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 text-center">

                    <div class="border border-gray-900 shadow-md rounded-lg p-4">
                        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl">

                        <p class="mt-4 block text-gray-400 text-xs">
                            Published <time> {{ $post->created_at->diffForHumans() }} </time>
                        </p>

                        <div class="flex items-center lg:justify-center text-sm mt-8">
                            <img src="{{ $post->author->username == 'elsayed410' ? '/images/elsayed410.jpg' : "https://i.pravatar.cc/60?u={$post->author->id}" }}"
                                width="60" height="60" class="rounded-xl" alt="Lary avatar">
                            <div class="ml-3 text-left">
                                <x-author-button :author="$post->author" />
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-span-8 bg-gray-800 p-4 rounded-xl">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/"
                            class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Back to Posts
                        </a>

                        <div class="space-x-2">
                            <x-category-button :category="$post->category" />
                        </div>
                    </div>

                    <br>
                    <div class="flex justify-between mb-10">
                        <h1 class="font-bold text-3xl lg:text-4xl">
                            {{ Str::title($post->title) }}
                        </h1>

                        @auth
                            <!-- Toggle favourite -->
                            <form action="/posts/{{ $post->id }}" method="POST" id="fav_form">
                                @csrf
                                @method('PATCH')
                                <button id="fav" type="submit"
                                    title="{{ $isFavourite ? 'Unsave post' : 'Save post' }}">
                                    <a class="text-xl mr-4 text-blue-500">
                                        <i class="bi bi-heart{{ $isFavourite ? '-fill' : '' }}"></i>
                                    </a>
                                </button>
                                <input type="hidden" id="status" value="{{ $isFavourite }}">
                            </form>

                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                            <script src="{{ asset('fav.js') }}"></script>
                        @endauth

                    </div>

                    <div class="space-y-4 p-4 h-50 rounded-lg bg-gray-800 lg:text-lg leading-loose">
                        {{ $post->body }}
                    </div>
                </div>

                {{-- comments section --}}
                <section class="col-span-6  rounded-xl col-start-5 mt-10 space-y-6">
                    @auth
                        <form action="/posts/{{ $post->id }}" method="POST" class="p-6 rounded-xl bg-gray-800">
                            @csrf
                            <header class="flex items-center">
                                <img src="{{ $post->author->username == 'elsayed410' ? '/images/elsayed410.jpg' : 'https://i.pravatar.cc/60?u=auth()->user()->id' }}"
                                    alt="" width="40" height="40" class="rounded-xl">
                                <h2 class="ml-6">Leave a comment.</h2>
                            </header>

                            <div class="mt-4">
                                <textarea class="pl-3 pt-4 w-full text-sm bg-gray-700 rounded-xl outline-none resize-none" name="body" rows="5"
                                    placeholder="Type here ..." required>{{ old('body') }}</textarea>
                            </div>

                            <x-form.error name="body" />

                            <div class="flex justify-end border-t border-gray-200  mt-6 pt-6">
                                <x-form.button>Post</x-form.button>
                            </div>
                        </form>
                    @else
                        <p class="font-semibold">
                            <a href="/register" class="hover:underline">Register</a> or <a href="/login"
                                class="hover:underline">Login</a> to leave a comment!
                        </p>
                    @endauth

                    @foreach ($post->comments as $comment)
                        <x-post-comment :comment="$comment" />
                    @endforeach

                </section>

            </article>
        </main>
    </section>

</x-layout>
