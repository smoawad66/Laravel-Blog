@props(['name'])

<x-form.field>

    <x-form.label name="{{ $name }}" />

    <textarea class="border border-gray-600 outline-none bg-gray-700 placeholder-gray-400 rounded-lg p-2 w-full" name="{{ $name }}" id="{{ $name }}" 
    required placeholder="{{ucwords($name)}}">{{ old($name, $slot) }}</textarea>
    <x-form.error name="{{ $name }}" />

</x-form.field>
