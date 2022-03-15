<div>
    <div class="mt-6 flex justify-between">
    <span class="bg-indigo-500 text-white px-6 py-1 dark:bg-gray-800">
        共有設備
    </span>
        <span class="bg-indigo-500 text-white px-6 py-1 dark:bg-gray-800 dark:text-white">
            <time datetime="{{ $home->facility->updated_at }}"
                  title="{{ $home->facility->updated_at->toDateString() }}">
                {{ $home->facility->updated_at->diffForHumans() }}
            </time>更新
        </span>
    </div>
    <x-box class="p-3 flex flex-wrap">
        @foreach(config('facility') as $key => $name)
            <x-rounded-tag :enabled="$home->facility->$key">{{ $name }}</x-rounded-tag>
        @endforeach
    </x-box>

    @canany(['update', 'admin'], $home)
        <x-box-edit class="flex flex-wrap">
            <x-slot name="title">
                変更
            </x-slot>
            @foreach(config('facility') as $key => $name)
                <x-jet-label for="facility_{{ $key }}" class="mr-3 cursor-pointer">
                    <x-jet-checkbox name="facility_{{ $key }}"
                                    id="facility_{{ $key }}"
                                    class="checked:text-red-500"
                                    wire:model="home.facility.{{ $key }}"/>
                    {{ $name }}
                </x-jet-label>
            @endforeach
        </x-box-edit>
    @endcanany
</div>
