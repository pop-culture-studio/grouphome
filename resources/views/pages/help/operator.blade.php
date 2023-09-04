<?php
use function Laravel\Folio\name;

name('help.operator');
?>

<x-main-layout>
    <x-slot name="title">
        {{ __('グループホーム事業者向けの使い方') }}
    </x-slot>

    <x-slot name="header">
        <h1 class="font-semibold text-xl leading-tight">
            {{ __('グループホーム事業者向けの使い方') }}
        </h1>
    </x-slot>

    <div class="py-6">

        <div class="sm:px-6 lg:px-8">

            <x-breadcrumbs-back/>

            <div class="prose dark:prose-invert prose-indigo prose-a:text-indigo-500 max-w-none p-3">

                <h2>事業者向けサービス</h2>
                <div>管理事業者として登録するとグループホームの詳細情報を入力する機能やお問い合わせを受け取る機能を利用できます。</div>

                <h2>ユーザー登録</h2>
                <ol>
                    <li><a href="{{ route('register') }}">ユーザー登録ページ</a>から登録します。正規の事業者であることが分かりやすいメールアドレスを使用すると承認作業が早くなります。
                    </li>
                    <li>確認用のメールが届きます。</li>
                </ol>

                <h2>グループホームの管理事業者として申請</h2>
                <ol>
                    <li>管理するグループホームを検索。</li>
                    <li>
                        グループホームのページの一番下に「管理事業者として申請」ボタンがあるので申請。
                        <img src="{{ asset('images/help/ope1.png') }}" class="w-auto sm:w-1/2 shadow rounded-md"
                             alt="申請ボタン">
                    </li>
                    <li>承認後管理できるようになりますのでしばらくお待ちください。</li>
                    <li>自由にユーザー登録できるため申請したユーザーが本物のグループホーム事業者かどうか確認できないので念の為<a
                            href="{{ route('contact') }}">お問い合わせ</a>から連絡を入れておくと承認作業が早くなります。
                    </li>
                    <li>
                        一つのグループホームに対して複数のユーザーが管理事業者になることもできます。事業者内でユーザーアカウントを共有したくない場合は複数のユーザーを作成してください。
                    </li>
                    <li>
                        管理事業者として承認されたら利用者からの「メールで問い合わせ」機能が使用可能になります。登録したメールアドレスがお問い合わせの送信先です。複数ユーザーの場合はすべてのユーザーにメールが送信されます。メールアドレスを変更するには<a
                            href="{{ route('profile.show') }}">プロフィールページ</a>から変更してください。
                    </li>
                </ol>

                <h2>ダッシュボード</h2>
                <ol>
                    <li>管理事業者として承認されたグループホームはダッシュボードの管理グループホーム一覧に表示されます。
                        <img src="{{ asset('images/help/ope2.png') }}" class="w-auto sm:w-1/2 shadow rounded-md"
                             alt="ダッシュボード">
                    </li>
                </ol>

                <h2>グループホーム情報の更新</h2>
                <ol>
                    <li>管理事業者はグループホームのページで直接変更できます。</li>
                    <li>「更新」ボタンのある項目はボタンを押したタイミングで更新、それ以外のチェックボックスなどは変更したらすぐに更新が反映されます。（画面は開発中のものです）
                        <video controls loop width="640">
                            <source src="{{ asset('images/help/ope3.mov') }}" type="video/mp4">
                        </video>
                    </li>
                    <li>
                        住所や電話番号の基本情報はWANのオープンデータをそのまま使用しているので変更するにはWAM側で変更してください。
                    </li>
                    <li>公式サイトなどで公開済みの情報は当サイトのスタッフが更新していることもあります。</li>
                </ol>

                <h2>ヒント</h2>
                <ul>
                    <li>
                        当サイト内では一つの事業所番号ごとに一つのグループホームしか登録できません。WAMの元データに同じ事業所番号で複数のグループホームが登録されている場合は一つしか残りません。変更が可能なら事業所番号を変更してください。
                    </li>
                    <li>
                        新しいグループホームの情報を追加するには先にWAMや自治体に登録してください。WAMのオープンデータが更新されたら追加されますがオープンデータは半年に一度しか更新されないので、すぐに掲載したい場合は以下の情報を<a
                            href="{{ route('contact') }}">お問い合わせ</a>から送信してください。
                        <ul>
                            <li>【事業所番号：10桁までの番号】</li>
                            <li>【グループホームの名称】</li>
                            <li>【法人の名称】</li>
                            <li>【グループホームの電話番号】</li>
                            <li>【グループホームの住所（市区町村）：都道府県から自治体まで】</li>
                            <li>【グループホームの住所（番地以降）】</li>
                            <li>【グループホームのURL：省略可】</li>
                        </ul>
                    </li>
                    <li>WAMのオープンデータが更新された後はWAM側の情報に上書きされます。上記はWAMが更新される前に掲載するための特殊な登録方法です。</li>
                </ul>

                <h2>削除依頼への対応</h2>
                <ul>
                    <li>
                        グループホームが閉鎖済みの場合や当サイトへ掲載したくない場合は<a href="{{ route('contact') }}">お問い合わせ</a>から連絡してください。
                    </li>
                </ul>

                <h2>事業者以外がグループホーム情報を変更していた場合の対応</h2>
                <ul>
                    <li>
                        申請手続きが必要なので関係ない他者が変更する可能性は低いものの間違った情報が掲載されている場合
                    </li>
                    <li><a href="{{ route('register') }}">ユーザー登録</a>して正規の事業者として申請。</li>
                    <li><a href="{{ route('contact') }}">お問い合わせ</a>から連絡してください。</li>
                    <li>どちらが正規の事業者か調査して対応を決めます。先に登録していたほうも実は関係者だったという可能性もあるので調査が必要です。</li>
                    <li>基本的な住所や電話番号が間違ってる場合はWAM側で変更してください。</li>
                    <li>「メールで問い合わせる」が表示されていない場合は他者は登録していません。当サイトスタッフが公式サイトなどの公開情報を基に入力しています。事業者として申請すれば変更できます。<img src="{{ asset('images/help/mail1.png') }}" class="w-auto sm:w-1/2 shadow rounded-md" alt="問い合わせる"></li>

                </ul>

            </div>
        </div>

    </div>
</x-main-layout>
