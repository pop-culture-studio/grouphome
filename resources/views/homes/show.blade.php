<x-main-layout>
    <x-slot name="title">
        {{ $home->name }} | {{ $home->pref->name }}
    </x-slot>

    <x-slot name="description">
        {{ $home->description }}
    </x-slot>

    <x-slot name="ogp">
        <x-ogp>
            <x-slot name="title">
                {{ $home->name }}
            </x-slot>

            <x-slot name="description">
                {{ $home->description }}
            </x-slot>

            @if(filled($home->photo->cover) && Storage::exists($home->photo->cover))
                <x-slot name="image">
                    {{ Storage::url($home->photo->cover) }}
                </x-slot>
            @endif
        </x-ogp>
    </x-slot>

    <div class="py-6">
        <div class="sm:px-6 lg:px-8">

            <x-breadcrumbs-back/>

            <div class="m-3">
                @includeIf('homes.cta')

                @include('homes.header')

                <x-box>
                    @include('homes.cover')

                    <div class="p-3">
                        <h1 class="text-7xl pb-3 text-indigo-500 dark:text-white font-extrabold tracking-widest break-all">
                            <ruby>
                                {{ $home->name ?? '' }}
                                <rp>(</rp>
                                <rt class="text-xs text-gray-500">{{ $home->name_kana }}</rt>
                                <rp>)</rp>
                            </ruby>
                        </h1>

                        <table class="table-auto border-collapse border-spacing-x-2">
                            <tr>
                                <th class="bg-indigo-100 dark:bg-gray-800 p-2">住所</th>
                                <td class="pl-3">
                                    {{ $home->address }}
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-indigo-100 dark:bg-gray-800 p-2">運営法人</th>
                                <td class="pl-3">
                                    {{ $home->company }}
                                </td>
                            </tr>
                            @if($home->users()->exists())
                                <tr>
                                    <th class="bg-indigo-100 dark:bg-gray-800 p-2">電話番号</th>
                                    <td class="pl-3">
                                        {{ $home->tel }}
                                    </td>
                                </tr>
                            @endif
                            <tr>
                                <th class="bg-indigo-100 dark:bg-gray-800 p-2">事業所番号</th>
                                <td class="pl-3"
                                    title="当サイト内では同じ事業所番号のグループホームはひとつしか表示されません">
                                    {{ $home->id }}
                                </td>
                            </tr>
                            @isset($home->url)
                                <tr>
                                    <th class="bg-indigo-100 dark:bg-gray-800 p-2">URL</th>
                                    <td class="pl-3">
                                        <a href="{{ $home->url }}" target="_blank"
                                           class="text-indigo-500 dark:text-white hover:underline" rel="nofollow">
                                            {{ Str::truncate($home->url, 50) }}
                                        </a>
                                    </td>
                                </tr>
                            @endisset

                            @isset($home->wam)
                                <tr>
                                    <th class="bg-indigo-100 dark:bg-gray-800 p-2">URL</th>
                                    <td class="pl-3">
                                        <a href="{{ $home->wam }}" target="_blank"
                                           class="text-indigo-500 dark:text-white hover:underline" rel="nofollow">
                                            {{ Str::truncate($home->wam, 50) }}
                                        </a>
                                    </td>
                                </tr>
                            @endisset

                            @isset($home->released_at)
                                <tr>
                                    <th class="bg-indigo-100 dark:bg-gray-800 p-2">指定年月日</th>
                                    <td class="pl-3">
                                        {{ $home->released_at->toDateString() }}
                                    </td>
                                </tr>
                            @endisset

                            <tr>
                                <th class="bg-indigo-100 dark:bg-gray-800 p-2">WAM</th>
                                <td class="pl-3">
                                    <a href="https://www.google.com/search?q={{ rawurlencode($home->name.' site:www.wam.go.jp/sfkohyoout/') }}"
                                       class="text-indigo-500 dark:text-white hover:underline"
                                       target="_blank" rel="nofollow">Google検索</a>
                                    <a href="https://www.bing.com/search?q={{ rawurlencode($home->name.' site:www.wam.go.jp/sfkohyoout/') }}"
                                       class="text-indigo-500 dark:text-white hover:underline"
                                       target="_blank" rel="nofollow">Bing検索</a>
                                </td>
                            </tr>
                        </table>

                    </div>
                </x-box>

                <livewire:home.basic-editor :home="$home"></livewire:home.basic-editor>

                <livewire:home.introduction-editor :home="$home"></livewire:home.introduction-editor>

                <livewire:home.vacancy-editor :home="$home"></livewire:home.vacancy-editor>

                <livewire:home.condition-editor :home="$home"></livewire:home.condition-editor>

                <livewire:home.cost-editor :home="$home"></livewire:home.cost-editor>

                <livewire:home.facility-editor :home="$home"></livewire:home.facility-editor>

                <livewire:home.equipment-editor :home="$home"></livewire:home.equipment-editor>

                <livewire:home.houserule-editor :home="$home"></livewire:home.houserule-editor>

                @include('homes.photo')

                @include('homes.map')

                @include('homes.related')

                @include('homes.operator')

                @include('homes.mail')
            </div>

        </div>
    </div>
</x-main-layout>
