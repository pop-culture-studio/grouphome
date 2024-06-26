<x-main-layout>
    <x-slot name="title">
        {{ __('管理者メニュー') }}
    </x-slot>

    <x-slot name="header">
        <h2 class="text-red-500 font-semibold text-xl leading-tight">
            <x-icon.lock class="inline"></x-icon.lock>{{ __('管理者メニュー') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-md sm:rounded-lg">
                <ul>
                    <li class="p-3">
                        <a href="{{ route('operator-requests.index') }}"
                           class="text-xl text-indigo-500 dark:text-white font-bold hover:underline">
                            {{ __('事業者申請') }} [{{ \App\Models\OperatorRequest::count() }}]
                        </a>
                    </li>
                    <li class="p-3">
                        <a href="{{ route('operator-home.index') }}"
                           class="text-xl text-indigo-500 dark:text-white font-bold hover:underline">
                            {{ __('事業者管理') }} [{{ \App\Models\User::count() }}]
                        </a>
                        <span class="text-gray-500 ml-3">事業者とグループホームの紐付けを解除。</span>
                    </li>
                    <li class="p-3">
                        <a href="{{ route('admin.home-create') }}"
                           class="text-xl text-indigo-500 dark:text-white font-bold hover:underline">
                            {{ __('グループホームを一時的に追加') }}
                        </a>
                        <span class="text-gray-500 ml-3">WAM NETに登録される前に一時的に追加する。WAM登録後は上書きされる。</span>
                    </li>
                    <li class="p-3">
                        <a href="{{ route('admin.contacts') }}"
                           class="text-xl text-indigo-500 dark:text-white font-bold hover:underline">
                            {{ __('お問い合わせ一覧') }} [{{ \App\Models\Contact::count() }}]
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-main-layout>
