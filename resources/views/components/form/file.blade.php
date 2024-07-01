<x-form.field>

    <x-form.label name="{{ $name }}" />

    <input class="border border-gray-600 outline-none bg-gray-700 placeholder-gray-400 p-2 rounded-xl  w-full" type="file" name="{{ $name }}"
        {{ $attributes(['value' => old($name)]) }} id="{{ $name }}">

    <x-form.error name="{{ $name }}" />

</x-form.field>
