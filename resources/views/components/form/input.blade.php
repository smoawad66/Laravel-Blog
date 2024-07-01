@props(['name', 'type' => 'text'])

<x-form.field>

    <x-form.label name="{{ $name }}" />

    <input class="border border-gray-600 outline-none bg-gray-700 placeholder-gray-400 p-2 rounded-xl w-full" type="{{ $type }}" name="{{ $name }}"
        {{ $attributes(['value' => old($name)]) }} id="{{ $name }}" placeholder="{{ucwords($name)}}" required>

    <x-form.error name="{{ $name }}" />

</x-form.field>
