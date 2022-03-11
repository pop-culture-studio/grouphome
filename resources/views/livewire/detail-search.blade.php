<div>
    <div class="border-4 border-gray-500 p-3 m-3">
        <h2 class="text-4xl font-bold my-3">詳細検索</h2>
        <p class="text-sm text-gray-700 mb-2">検索条件を変更するとすぐに表示が変わります。</p>

        <h3 class="text-lg font-bold my-3">{{ __('キーワード検索') }}</h3>

        <x-jet-input name="q" type="search"
                     class="block max-w-full text-black bg-white dark:bg-gray-800 dark:text-white"
                     wire:model.lazy="q"
                     placeholder="{{ 'キーワード検索' }}"
        />

        <h3 class="text-lg font-bold my-3">{{ __('対象区分') }}</h3>
        <p class="text-sm text-gray-500 mb-2"></p>

        @foreach($levels as $index => $level)
            <div class="inline-block mb-2">
                <x-jet-label for="level_{{ $index }}" class="mr-3 cursor-pointer">
                    <x-jet-checkbox name="level_{{ $index }}"
                                    id="level_{{ $index }}"
                                    class="checked:text-indigo-500"
                                    wire:model="levels.{{ $index }}"/>
                    区分{{ $index === 0 ? 'なし' : $index }}以上
                </x-jet-label>
            </div>
        @endforeach

        <h3 class="text-lg font-bold my-3">{{ __('サービス類型') }}</h3>
        <p class="text-sm text-gray-500 mb-2"></p>

        @foreach($types as $index => $type)
            <div class="inline-block mb-2">
                <x-jet-label for="type_{{ $index }}" class="mr-3 cursor-pointer">
                    <x-jet-checkbox name="type_{{ $index }}"
                                    id="type_{{ $index }}"
                                    class="checked:text-indigo-500"
                                    wire:model="types.{{ $index }}"/>
                    {{ Arr::get(config('type'), $index-1, '不明') }}
                </x-jet-label>
            </div>
        @endforeach

        <h3 class="text-lg font-bold my-3">{{ __('共有設備') }}</h3>
        <p class="text-sm text-gray-500 mb-2"></p>

        @foreach($facilities as $index => $facility)
            <div class="inline-block mb-2">
                <x-jet-label for="facility_{{ $index }}" class="mr-3 cursor-pointer">
                    <x-jet-checkbox name="facility_{{ $index }}"
                                    id="facility_{{ $index }}"
                                    class="checked:text-indigo-500"
                                    wire:model="facilities.{{ $index }}"/>
                    {{ config('facility.'.$index) }}
                </x-jet-label>
            </div>
        @endforeach

        <h3 class="text-lg font-bold my-3">{{ __('居室設備') }}</h3>
        <p class="text-sm text-gray-500 mb-2"></p>

        @foreach($equipments as $index => $equipment)
            <div class="inline-block mb-2">
                <x-jet-label for="equipment_{{ $index }}" class="mr-3 cursor-pointer">
                    <x-jet-checkbox name="equipment_{{ $index }}"
                                    id="equipment_{{ $index }}"
                                    class="checked:text-indigo-500"
                                    wire:model="equipments.{{ $index }}"/>
                    {{ config('equipment.'.$index) }}
                </x-jet-label>
            </div>
        @endforeach

        <h3 class="text-lg font-bold my-3">{{ __('空室') }}</h3>

        <select name="vacancy"
                wire:model="vacancy"
                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block flex-auto dark:bg-gray-800">
            <option value="">指定しない</option>
            <option value="0">{{ __('空室あり') }}</option>
            <option value="1">{{ __('満室') }}</option>
        </select>

        <h3 class="text-lg font-bold my-3">{{ __('都道府県') }}</h3>

        <select name="pref_id"
                wire:model="pref_id"
                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block flex-auto dark:bg-gray-800">
            <option value="">指定しない</option>
            @foreach(\App\Models\Pref::oldest('id')->get() as $pre)
                <option value="{{ $pre->id }}">{{ $pre->name }}</option>
            @endforeach
        </select>

        @if(count($areas ?? []) > 0)
            <select name="area"
                    wire:model="area"
                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block flex-auto dark:bg-gray-800">
                <option value="">指定しない</option>
                @foreach($areas as $area_name)
                    <option value="{{ $area_name }}">{{ $area_name }}</option>
                @endforeach
            </select>
        @endif

        <h3 class="text-lg font-bold my-3">{{ __('並べ替え') }}</h3>

        <select name="sort"
                wire:model="sort"
                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block flex-auto dark:bg-gray-800">
            <option value="">なし</option>
            <option value="updated">更新が新しい順</option>
            <option value="low">費用が安い順</option>
            <option value="high">費用が高い順</option>
            <option value="address">住所</option>
            <option value="release">指定年月日(新着順)</option>
            <option value="name">グループホーム名</option>
            <option value="pref">都道府県(北から)</option>
            <option value="id">事業所番号(降順)</option>
        </select>
    </div>

    <div wire:loading.class="opacity-50">
        @includeIf('livewire.home-index')
    </div>
</div>