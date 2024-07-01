<section class="mx-auto">
    <main {{ $attributes->merge(['class' => 'mx-auto mt-10 bg-gray-800 border border-gray-700 p-6 rounded-xl']) }}>
        <h2 class="mb-4 text-lg font-semibold">{{ $header }}</h2>
        {{ $slot }}
    </main>
</section>
