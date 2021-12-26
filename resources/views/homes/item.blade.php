<div class="m-6">
    @include('homes.header')

    <div class="border-4 border-indigo-500 p-3 dark:border-gray-800">
        <a href="{{ route('home.show', $home) }}">
            <h2 class="text-5xl text-indigo-500 dark:text-white font-extrabold tracking-widest hover:text-indigo-600 dark:hover:text-white dark:hover:underline">
                {{ $home->name }}
            </h2>
        </a>
        <div class="text-md my-3">{{ $home->address }}</div>
    </div>

    <div class="mt-0 mb-3 flex justify-between">
        @if($home->level > 0)
            <span class="bg-indigo-400 text-white px-6 pb-1 dark:bg-gray-800 dark:text-white">
                区分{{ $home->level }}以上
        </span>
        @endif
    </div>

</div>
