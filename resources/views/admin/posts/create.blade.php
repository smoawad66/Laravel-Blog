<x-layout>
    <x-setting header="Publish new post" class="w-1/2">

        <form action="/admin/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <x-form.input name="title" />
            <x-form.input name="slug" />
            <x-form.file name="thumbnail" />
            <x-form.textarea name="excerpt" />
            <x-form.textarea name="body" />

            <x-form.field>
                <x-form.label name="category" />
                <select name="category_id" class="px-3 py-1.5 rounded-md outline-none border border-gray-600 bg-gray-700" id="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" 
                            {{ $category->id == old('category_id') ? 'selected' : '' }}
                            >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>
                <x-form.error name="category_id" />
            </x-form.field>

            <x-form.button>Publish</x-form.button>
        </form>

    </x-setting>
</x-layout>
