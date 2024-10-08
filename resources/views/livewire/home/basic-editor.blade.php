<div class="print:hidden">
    @can('admin')
        <x-box-edit>
            <x-slot name="title">
                変更（管理者用）
            </x-slot>

            <form wire:submit="save">
                <x-label for="released_at" value="{{ __('指定年月日') }}"/>
                <x-input type="date" name="released_at" id="released_at" rows="2"
                             wire:model="form.released_at"></x-input>
                <div class="text-sm text-gray-500 dark:text-white mb-3">指定年月日。</div>

                <x-label for="wam" value="{{ __('WAM URL') }}"/>
                <x-input type="text" name="wam" id="wam" wire:model="form.wam" class="w-full"></x-input>
                <div class="text-sm text-gray-500 dark:text-white mb-3">WAM
                    URLもしくは公式とは別のURLを入力。CSVインポートで上書きされないURLとして利用。
                </div>

                <x-label for="map" value="{{ __('Googleマップ') }}"/>
                <x-textarea name="map" id="map" rows="2" wire:model="form.map"></x-textarea>
                <div class="text-sm text-gray-500 dark:text-white">埋め込み用のHTML。（管理事業者でも自由にhtml入力可能にはできないので管理者専用）</div>

                <x-button class="mt-3">
                    {{ __('更新') }}
                </x-button>

                <div class="text-sm text-gray-500 dark:text-white">他の項目と違いブラウザリロードしないと表示は変わらない。</div>
            </form>
        </x-box-edit>
    @endcan
</div>
