<div class="print:hidden">
    @can('admin')
        <x-box-edit>
            <x-slot name="title">
                変更（管理者用）
            </x-slot>

            <form wire:submit.prevent="save">
                <x-jet-label for="released_at" value="{{ __('指定年月日') }}"/>
                <x-jet-input type="date" name="released_at" rows="2"
                             wire:model.defer="home.released_at"></x-jet-input>
                <div class="text-sm text-gray-500 dark:text-white mb-3">指定年月日。</div>

                <x-jet-label for="wam" value="{{ __('WAM URL') }}"/>
                <x-jet-input type="text" name="wam" wire:model.defer="home.wam" class="w-full"></x-jet-input>
                <div class="text-sm text-gray-500 dark:text-white mb-3">WAM
                    URLもしくは公式とは別のURLを入力。CSVインポートで上書きされないURLとして利用。
                </div>

                <x-jet-label for="map" value="{{ __('Googleマップ') }}"/>
                <x-textarea name="map" rows="2" wire:model.defer="home.map"></x-textarea>
                <div class="text-sm text-gray-500 dark:text-white">埋め込み用のHTML。</div>

                <x-jet-button class="mt-3">
                    {{ __('更新') }}
                </x-jet-button>

                <div class="text-sm text-gray-500 dark:text-white">他の項目と違いブラウザリロードしないと表示は変わらない。</div>
            </form>
        </x-box-edit>
    @endcan
</div>
