<article
    {{ $attributes->merge(['class' => 'transition-colors h-full bg-gray-800 duration-300 hover:bg-gray-900 border border-white border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    
    <div class="py-6 px-5 flex flex-col h-full">

        <div>
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="mt-8 flex flex-col flex-grow justify-between">

            <header>
                <div class="space-x-2">
                    <x-category-button :category="$post->category" />
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/posts/{{ $post->id }}">
                            {{ $post->title }}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time> {{ $post->created_at->diffForHumans() }} </time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-4 space-y-4">
                {!! $post->excerpt !!}
            </div>

            <footer class="flex justify-between  items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="{{ $post->author->username == 'elsayed410' ? '/images/elsayed410.jpg' : "https://i.pravatar.cc/60?u={$post->author->id}" }}"
                        width="60" height="60" class="rounded-xl" alt="Lary avatar">
                    <div class="ml-3">
                        <x-author-button :author="$post->author" />
                    </div>
                </div>

                <div>
                    <a href="/posts/{{ $post->id }}"
                        class="transition-colors duration-300 text-xs font-semibold bg-gray-700 hover:bg-gray-800 rounded-full py-2 px-4">Read
                        More</a>
                </div>
            </footer>

        </div>
    </div>
</article>
