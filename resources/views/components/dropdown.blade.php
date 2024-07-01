@props(['bg' => 'transparent'])

<div x-data="{ show: false }" @click.away="show = false" {{ $attributes->merge(['class' => 'relative']) }}>

    <div @click = 'show = ! show' class="w-full px-2 bg-{{ $bg }} rounded-lg cursor-pointer">
        {{ $trigger }}
    </div>

    <div x-show="show" class="py-2 absolute text-white bg-gray-800 w-full mt-2 z-50 rounded-xl overflow-auto max-h-52"
        style="display: none">
        {{ $slot }}
    </div>

</div>
