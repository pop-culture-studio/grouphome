<x-main-layout>
    <x-slot name="ogp">
        <x-ogp>
            <x-slot name="title">
                {{ config('app.name') }}
            </x-slot>

            <x-slot name="description">
                {{ config('app.name') }}
            </x-slot>
        </x-ogp>
    </x-slot>

    <x-slot name="side">

    </x-slot>

    <div class="py-6">
        <div class="sm:px-6 lg:px-8">
            <x-breadcrumbs-back/>

            <div class="p-3 bg-indigo-50 dark:bg-black sm:hidden">
                @include('search.easy')
            </div>

            <livewire:home-index></livewire:home-index>

        </div>
    </div>
</x-main-layout>
