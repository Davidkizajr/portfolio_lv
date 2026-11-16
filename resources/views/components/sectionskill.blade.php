@props(['title'])

<div class="mt-4">
    <h3 class="text-2xl font-bold mt-4">{{ $title }}</h3>
    <div class="mt-4 grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-flow-col lg:grid-cols-none lg:auto-cols-fr">
        {{ $slot }}
    </div>
</div>
