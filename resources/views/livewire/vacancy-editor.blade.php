<div>
    <x-box-header class="mt-6">
        <x-slot name="left">
            最新の空室情報
        </x-slot>
        <x-slot name="right">
            <time datetime="{{ $home->vacancy->updated_at }}"
                  title="{{ $home->vacancy->updated_at->toDateString() }}">
                {{ $home->vacancy->updated_at->diffForHumans() }}
            </time>更新
        </x-slot>
    </x-box-header>

    <x-box class="p-3">
        <x-rounded-tag :enabled="true">{{ $home->vacancy->filled ? __('満室') : __('空室あり') }}</x-rounded-tag>

        @if(filled($home->vacancy->message))
            <div class="mt-3 text-md">{!! nl2br(e($home->vacancy->message)) !!}</div>
        @endif
    </x-box>

    @canany(['update', 'admin'], $home)
        <x-box-edit>
            <x-slot name="title">
                変更
            </x-slot>
            <form wire:submit.prevent="save">
                <x-jet-label for="vacancy_filled" class="mb-3 cursor-pointer">
                    <x-jet-checkbox name="vacancy_filled"
                                    id="vacancy_filled"
                                    class="checked:text-red-500"
                                    wire:model.defer="home.vacancy.filled"/>
                    {{ __('満室') }}
                </x-jet-label>

                <x-jet-label for="vacancy_message" value="{{ __('メッセージ') }}"/>
                <x-textarea name="vacancy_message" rows="2" wire:model.defer="home.vacancy.message"></x-textarea>
                <x-jet-input-error for="vacancy_message" class="mt-3"/>

                <x-jet-button class="mt-3">
                    {{ __('更新') }}
                </x-jet-button>
            </form>
        </x-box-edit>
    @endcanany
</div>
