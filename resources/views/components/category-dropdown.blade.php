<x-dropdown bg="gray-800" class="w-fit">

    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 rounded-full text-white text-sm font-semibold w-full text-left flex ">
            {{ isset($curCategory) ? ucwords($curCategory->name) : 'Categories' }}
            <x-icon name='down-arrow' class="absolute pointer-events-none" style="right: 12px;" />
        </button>
    </x-slot>

    @php
        $q = http_build_query(request()->except('category', 'page'));
        $c = $q ? '&' : null;
    @endphp

    <x-dropdown-item href="/?{{ $q }}" :active="request()->routeIs('home') && is_null(request()->getQueryString())">
        All
    </x-dropdown-item>

    @foreach ($categories as $category)
        <x-dropdown-item href="/?category={{ $category->slug . $c . $q }}" :active="request('category') == $category->slug">
            {{ ucwords($category->name) }}
        </x-dropdown-item>
    @endforeach

</x-dropdown>
