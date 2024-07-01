<x-layout>
    <x-setting header="Manage posts" class="w-5/6">

        <div class="flex flex-col">
            <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full">
                            <thead class="bg-gray-900 text-white border-b border-gray-500">
                                <tr>
                                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                        Title
                                    </th>
                                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                        Category
                                    </th>
                                    <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($posts->count())
                                    @foreach ($posts as $post)
                                        <tr class="text-white border border-gray-600">

                                            <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                                                <a class="text-gray-200 hover:underline"
                                                    href="/posts/{{ $post->id }}">{{ $post->title }}</a></td>

                                            <td class="text-sm font-light px-6 py-4 whitespace-nowrap">
                                                <x-category-button :category="$post->category" /></td>

                                            <td class="flex text-sm font-light px-6 py-4 whitespace-nowrap">
                                                <a class="text-blue-500 hover:underline"
                                                    href="/admin/posts/{{ $post->id }}/edit">Edit</a>
                                                <form class="ml-4" method="POST" action="/admin/posts/{{ $post->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="post" value="{{ $post }}">
                                                    <button type="submit" class="text-red-600">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                @else
                                    <tr class="bg-white border-b text-center">
                                        <td colspan="3">No posts yet, please check back later.</td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <br/>
        {{ $posts->links() }}

    </x-setting>
</x-layout>
