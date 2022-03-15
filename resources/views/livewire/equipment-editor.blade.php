<div>
    <div class="mt-6 flex justify-between">
    <span class="bg-indigo-500 text-white px-6 py-1 dark:bg-gray-800">
        居室設備
    </span>
        <span class="bg-indigo-500 text-white px-6 py-1 dark:bg-gray-800 dark:text-white">
            <time datetime="{{ $home->equipment->updated_at }}"
                  title="{{ $home->equipment->updated_at->toDateString() }}">
                {{ $home->equipment->updated_at->diffForHumans() }}
            </time>更新
        </span>
    </div>
    <x-box class="p-3 flex flex-wrap">
        @foreach(config('equipment') as $key => $name)
            <x-rounded-tag :enabled="$home->equipment->$key">{{ $name }}</x-rounded-tag>
        @endforeach
    </x-box>

    @canany(['update', 'admin'], $home)
        <div class="mt-0">
            <span class="bg-red-500 text-white px-6 pb-1">
                変更
            </span>
            <div class="border-4 border-red-500 p-3 flex flex-wrap">
                @foreach(config('equipment') as $key => $name)
                    <x-jet-label for="equipment_{{ $key }}" class="mr-3 cursor-pointer">
                        <x-jet-checkbox name="equipment_{{ $key }}"
                                        id="equipment_{{ $key }}"
                                        class="checked:text-red-500"
                                        wire:model="home.equipment.{{ $key }}"/>
                        {{ $name }}
                    </x-jet-label>
                @endforeach
            </div>
        </div>
    @endcanany
</div>
