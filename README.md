# グループホーム

## Excelファイル
グループホームの一覧情報は各都道府県サイトのExcelファイルで取得できる。[障害福祉サービス等情報検索](https://www.wam.go.jp/sfkohyoout/) からも取得できるけどグループホームはExcelファイルからの方が良さそう。

元のExcelファイルが使いにくいことが多いので現実的にはGoogleスプレッドシートをマスターデータにする。  
都道府県サイトのExcelファイルや障害福祉サービス等情報検索などを見てGoogleスプレッドシートに入力していく。  
Googleスプレッドシートから出力したCSVファイルをインポート。

### Googleスプレッドシートへのデータ入力の注意点・共通版
- 英数字は半角で入力。
- 「事業所番号」は必須。グループホームごとに重複しない番号を指定。「事業所番号」と「枝番」に分かれてる時はそのまま残す。
- 「指定年月日」も必須。元のExcelファイルに和暦で入力されてる時は西暦に変換。
- 事業所名、住所、事業者などの基本情報はすべて必須。
- 「住所」は都道府県も含めて入力。
- 元のExcelファイルにないデータは障害福祉サービス等情報検索で検索してGoogleスプレッドシートに入力。
- 「Googleマップ」は住所で検索してGoogleマップの共有→地図を埋め込む→「HTMLをコピー」のhtmlをそのまま入力。空なら住所から自動でマップ表示（自動では正しく表示されない時にGoogleスプレッドシートに埋め込み用htmlを入力する）
- 「URL」は公式サイトのURLを検索して入力。
- 元ファイルがPDFしかない場合、PDFをGoogleドキュメントで読み込んだ後コピペでスプレッドシートに入力できることがある。これで読み込めるのは初回だけなので更新時はPDFを見て一つずつコピペで入力。
- 「対象区分」は利用者視点では重要。区分が原因で利用できないことがある。障害支援区分0-6で入力。
- 「類型」も利用者視点では重要。1:介護サービス包括型、2:外部サービス利用型、3:日中サービス支援型。元のExcelに項目があるなら入力方法は合わせる。ない場合は1,2,3で入力。
- 「体験利用必須」入居には先に体験利用が必須と説明してる所もあるけど何も説明しないまま体験しない人の入居を断る所があるので体験利用が必須かどうかは重要な情報。必須なら「1」
- 利用者視点では最初に「立地、対象区分、類型」で絞り込む。グループホームは少ないのでこれだけで候補はかなり少なくなる。

### 北海道
https://www.pref.hokkaido.lg.jp/hf/shf/jigyousyosisetuichiran.html

https://docs.google.com/spreadsheets/d/13C84NExZCNd0c2foLAwaZsI9lOLlgwhuHQNGLsiqRi0/edit?usp=sharing

### 青森
https://www.pref.aomori.lg.jp/soshiki/kenko/syofuku/syougai_jigyousya_ichiran.html

https://docs.google.com/spreadsheets/d/10LbhcdW_gInjOoZzdSXhoty-TjTg48U52_UD3t2tdr4/edit?usp=sharing

### 岩手
https://www.pref.iwate.jp/kurashikankyou/fukushi/shougai/jigyousha/1004057/1004058.html

https://docs.google.com/spreadsheets/d/1CUJ8ITOWyV-D01RgSjYGvBbwPXrk7mqLnf_6NEMfh6Q/edit?usp=sharing

### 宮城
https://www.pref.miyagi.jp/site/syoufuku-top/ksb22.html

https://docs.google.com/spreadsheets/d/1XMks9yAp_-diUb2ryxpBvAJLx-aUksjiuKXNaeBRwGo/edit?usp=sharing

### 秋田
https://www.pref.akita.lg.jp/pages/archive/18864

https://docs.google.com/spreadsheets/d/1EW8i9LBYnrYz8PAXoQTP06I9FjX-07x2vClXAaNNE4s/edit?usp=sharing

### 山形
？  
障害福祉サービス等情報検索で検索するしかなさそう。

https://www.city.yamagata-yamagata.lg.jp/kenkofukushi/syougaisha/1008376/1004625.html

空のスプレッドシートに入力していく。  
https://docs.google.com/spreadsheets/d/1eXT6fG7Jpzh2GBKw-0iXAcT5EnrMHdghPDdS3LlWPMI/

### 福島
（中核市除く）  
https://www.pref.fukushima.lg.jp/sec/21035c/jigyousyojouhou.html

https://docs.google.com/spreadsheets/d/1iCgbn_e6s_ictGDTe7bZ5xgsVHRnOL1WXkSqOjJJqj0/edit?usp=sharing

### 茨城
扱いやすいExcelファイル。  
https://www.pref.ibaraki.jp/hokenfukushi/shofuku/seishin/shofuku/c/c-6.html

https://docs.google.com/spreadsheets/d/1JGUBYqdIFHYUqKxRBNt_4Ohlzfw3GfafAIu8mQiqF-8/edit?usp=sharing

### 栃木
かなり修正が必要だったので1事業者ごとに1事業所のみ残して他は削除。  
https://www.pref.tochigi.lg.jp/e05/welfare/shougaisha/fukushi/shogai_jigyosha.html

https://docs.google.com/spreadsheets/d/1_WboRoTQGUwlGcy9sJFT161_j4EP4qsTHYrp8WtQnT4/edit?usp=sharing

### 群馬
https://www.pref.gunma.jp/02/d4200334.html

空のスプレッドシートに入力していく。  
https://docs.google.com/spreadsheets/d/14Una1eJObEnN3yQfNxYUdafBnt5uRGoz67mU39rIuUY/

### 埼玉
https://www.pref.saitama.lg.jp/a0605/s107/index.html

https://docs.google.com/spreadsheets/d/17sQJ2O3iLgbx4zFdgpo76sjioVuWUvovjQOzTmdYfL0/edit?usp=sharing

### 千葉
事業者番号も指定年月日もないので障害福祉サービス等情報検索で検索  
https://www.pref.chiba.lg.jp/kenshidou/fukushishisetsu/mokuji.html

https://docs.google.com/spreadsheets/d/1DfsmxrYaJT_j3NG0QyQ9J3xbfgvYgfFk0x-dTHrskm8/edit?usp=sharing

### 東京
https://www.shougaifukushi.metro.tokyo.lg.jp/Lib/LibDspList.php?catid=100-001

https://docs.google.com/spreadsheets/d/1_6xmk71Tao0R7w68jFp70amB3Nq56BmzFF3GWyGw0Yc/edit?usp=sharing

### 神奈川
？  
https://www.rakuraku.or.jp/shienhi/

空のスプレッドシートに入力していく。  
https://docs.google.com/spreadsheets/d/1dYbvVcBtGAMefoi1mkVVuOnu8WkAAMCCfzCiR55cdM0/

### 新潟
https://www.pref.niigata.lg.jp/sec/shougaifukushi/1356826760234.html

https://docs.google.com/spreadsheets/d/1B1lE1WLGQqOQ2N-oF8pcQrlVYb74OabDmpiCpkoNnU0/edit?usp=sharing

### 富山
富山市以外  
https://www.pref.toyama.jp/1209/kurashi/kenkou/shougaisha/jigyousha/kj00008459.html  

富山市  
https://www.city.toyama.toyama.jp/fukushihokenbu/shogaifukushika/jigyousyojouhou.html

https://docs.google.com/spreadsheets/d/1AvwCEkhTcZI9EFkOWfBUnLzdL1-4ZF9FszG2q-AMrBQ/edit?usp=sharing

### 石川
https://www.pref.ishikawa.lg.jp/fukusi/jiritsushienfukushi/jigyousyashiteiichiran.html

- 事業者番号が重複してるので後からインポートされた方だけ残る。
- 住所情報が足りない。「所在地[1]」が町の所に郡がないので追加作業が必要。  

https://docs.google.com/spreadsheets/d/1BuHzQAxBbGE7EbvH1nEvGJ4FM2LU5BZQEwU0XEx-y_8/edit?usp=sharing

### 福井
PDF  
https://www.pref.fukui.lg.jp/doc/shougai/syogaishisetu.html

https://docs.google.com/spreadsheets/d/1NIFFXgDSricLHxE2jZD1IoTlNAmaShdNl_9CgsRqN6Y/

### 山梨
PDF  
https://www.pref.yamanashi.jp/shogai-fks/shogai-sisetsu.html

https://docs.google.com/spreadsheets/d/1aBWDI7LY2qsfFIl-A__OfXcPGrRu3aPN7pBiO0aBcoA/

### 長野
事業所番号なし。障害福祉サービス等情報検索で検索
https://www.pref.nagano.lg.jp/shogai-shien/kenko/shogai/shogai/joho/jigyosha/ichiranhyo.html

https://docs.google.com/spreadsheets/d/1NU4O_V7DrrKj6Phjt6r3QVnPJt1ekH2d3nxRguEueos/edit?usp=sharing

### 岐阜
https://www.pref.gifu.lg.jp/page/26315.html

https://docs.google.com/spreadsheets/d/1VIBdE8iM4NI7i7v3xQSQ8Kr5YsDwO6aY9KDM-PnggxY/edit?usp=sharing

### 静岡
http://www.pref.shizuoka.jp/kousei/ko-240/kaigo/shougai-shidou/jigyousyo.html

https://docs.google.com/spreadsheets/d/1kGV4DLo4bHiSlUsUHFqfxZ91SH8nnOpZCOOYf7sklH4/edit?usp=sharing

### 愛知
？

名古屋市はここから検索後CSVでダウンロード可能。  
https://www.kaigo-wel.city.nagoya.jp/view/wel/jigyosho/

https://docs.google.com/spreadsheets/d/1HWFU_1PYNC-E844oM0Yq8_5nm-dO6dyDccO8N27_52c/edit?usp=sharing

### 三重
https://www.pref.mie.lg.jp/SHOHO/HP/60549032672_00077.htm

https://docs.google.com/spreadsheets/d/14M6EDPrDPAiPkoJdOKgo9EwUCrlGBlosIAyalwWOaoY/edit?usp=sharing

### 滋賀
事業所番号、指定年月日なし。  
https://www.pref.shiga.lg.jp/ippan/kenkouiryouhukushi/syougaifukushi/303429.html

事業所で障害福祉サービス等情報検索で検索→事業所番号、事業者、指定年月日を調べてスプレッドシートに入力。  
https://docs.google.com/spreadsheets/d/179cE-R44e1umpRQeMJY_lp7K0VC5DpK4kIhwH5tT-4k/edit?usp=sharing

### 京都
https://www.pref.kyoto.jp/shogaishien/syogaifukushi.html

https://docs.google.com/spreadsheets/d/1rYtKR3RRmHmWVrZw6gRNjsRkxRzZvx94Doo_wHI8g_Y/edit?usp=sharing

### 大阪
https://www.pref.osaka.lg.jp/chiikiseikatsu/syougaijisien/itiran.html

https://docs.google.com/spreadsheets/d/1welDEERrdvvMPCY6a9lDQ09Xs90eYkPYLmBeAQwGMkk/edit?usp=sharing

### 兵庫
https://web.pref.hyogo.lg.jp/kf08/hw19_000000221.html

https://docs.google.com/spreadsheets/d/1gTimBD7eaDQvbYXmjzIACFY5kC-tODPVNONRqPKKSr8/edit?usp=sharing

### 奈良
左のメニューにExcel。指定年月日なし。  
https://www.pref.nara.jp/module/35104.htm#moduleid35104

https://docs.google.com/spreadsheets/d/1RTcgRLhglrAo-2M7ce064-pU0yVetAen1pB20rOf4OM/edit?usp=sharing

### 和歌山
PDF  
https://www.pref.wakayama.lg.jp/prefg/040100/shisetsu/index.html

https://docs.google.com/spreadsheets/d/1vWrU9ppk_WrmkC_W1WUWnGpMBgDziIraeJ7xQTnhGoM/

### 鳥取
？  
https://www.pref.tottori.lg.jp/254597.htm

空のスプレッドシートに入力していく。  
https://docs.google.com/spreadsheets/d/1-Y88JEhm4Mpzyc1HwZp5OQhEceJldB2s522v5TRRcCE/

### 島根
事業所番号なし。  
https://www.pref.shimane.lg.jp/medical/fukushi/syougai/ichiran/

https://docs.google.com/spreadsheets/d/1OH0iwMb_Tt8rHSoqsQXd_XWCNoKIBgTMP9WiULkcKxY/edit?usp=sharing

### 岡山
PDF  
https://www.pref.okayama.jp/page/639934.html

PDFから変換したけど郵便番号・所在地・電話番号・運営主体が繋がってるので修正作業が必要。  
https://docs.google.com/spreadsheets/d/1gQN6NhQHdyAtGxMh8LtMrSI1jW7rd-uUuDanmq5pVTU/

### 広島
新規のみ？。  
https://www.pref.hiroshima.lg.jp/soshiki/62/shiteikokuji.html

空のスプレッドシートに入力していく。  
https://docs.google.com/spreadsheets/d/12WOCiL7PyMLOvXO_FsU6oTp5WT7tg3l57T9fnEOCbyM/

### 山口
事業所番号なし。  
https://www.pref.yamaguchi.lg.jp/cms/a13200/s-meibo/202106010001.html

https://docs.google.com/spreadsheets/d/1aQ6nw-3o4QQ0zgaTyeC1DnUMZLk3951p0KVZb0qGUnk/

### 徳島
事業所番号なし。  
https://ouropendata.jp/dataset/1719.html

https://docs.google.com/spreadsheets/d/1lULcB1bel7MIdTtoFPBlnVMqmz5yFwwE4usnYTpq7_0/edit?usp=sharing

### 香川
PDF  
https://www.pref.kagawa.lg.jp/shogaifukushi/shisetsu/jigyosho_ichiran.html

指定年月日は元号さえ省略してるので西暦に変換が必要。  
https://docs.google.com/spreadsheets/d/1hFeyVQ533JbUaFsbu_dGcJGyqa_FPY8GnV7v8TKiOpA/

### 愛媛
事業所番号なし。  
https://www.pref.ehime.jp/h20700/fukushi/syougai/ken_shi/index.html

https://docs.google.com/spreadsheets/d/1JDTfGC8Y_TVGm3PZNza0Kjbpre_NPN2aJ0QMY1WLH1U/edit?usp=sharing

### 高知
事業所番号・住所なし。  
https://www.pref.kochi.lg.jp/soshiki/060301/kouji.html

https://docs.google.com/spreadsheets/d/1wJ1BUbIXQyk0xZo0R3MEiz6tYkuWsV674pixId79Muk/edit?usp=sharing

### 福岡
更新頻度：毎月。  
手間：低。  
https://www.pref.fukuoka.lg.jp/contents/shougaishashiteijigyousyo.html  
https://www.pref.fukuoka.lg.jp/contents/shinkishitei-haishi.html

https://docs.google.com/spreadsheets/d/1OoyzFwfJfijb9cY_shjbt6fLK0RgnSPsPL4c24uJWOI/edit?usp=sharing

### 佐賀
https://www.pref.saga.lg.jp/kiji0033428/index.html

https://docs.google.com/spreadsheets/d/1_KXGT9aLM8G35DvJT8rHrpWo32G-4gIJ7CIzRI6u-CY/edit?usp=sharing

### 長崎
https://www.pref.nagasaki.jp/bunrui/hukushi-hoken/shogaisha/shisetsu-shogai/ichiran-shisetsu-shogaisha/

長崎市。PDF  
https://www.city.nagasaki.lg.jp/fukushi/440000/449006/p027150.html

郵便番号と住所の分離、電話番号とFAXの分離、指定年月日の西暦化などの作業が必要。  
https://docs.google.com/spreadsheets/d/1nipjOhVF1e4YL6IJren8IBhGxpvdhFT_SFikaD7s1UE/

### 熊本
https://www.pref.kumamoto.jp/soshiki/39/50669.html

https://docs.google.com/spreadsheets/d/10Wm6aJNLVkdZl_8GToNdyrypMg6M_JkE4D7bqo89jEc/edit?usp=sharing

### 大分
？

大分市。PDF  
http://www.city.oita.oita.jp/o089/kenko/fukushi/1323838778549.html

郵便番号と住所の分離、指定年月日の検索作業が必要。  
https://docs.google.com/spreadsheets/d/1erwZMpNX7jAvCB3gUhv0RPbPq3DX_PCi7iibTCy_bBk/

### 宮崎
？

宮崎市。  
https://www.city.miyazaki.miyazaki.jp/health/disabilities_welfare/other_services/272423.html

事業者番号なし。  
https://docs.google.com/spreadsheets/d/1k_45z5dqCXYH2gcs8DJu4qrgIl0DMSezwpFHa0vRg3I/edit?usp=sharing

### 鹿児島
表6。事業者番号なし。  
http://www.pref.kagoshima.jp/ae04/kenko-fukushi/syogai-syakai/syakaifukushi/hokenfukushishisetu-list.html

https://docs.google.com/spreadsheets/d/14IbqvtnepP1dGRQzVjk55mO3W1JPa0co7M27toGVuv8/edit?usp=sharing

### 沖縄
https://www.pref.okinawa.lg.jp/site/kodomo/shogaifukushi/old/20738.html

https://docs.google.com/spreadsheets/d/1T7z1aABewPy18J0hAgjco5ySwjyPnGQUV9kga51pP5o/edit?usp=sharing


## 開発
```
git clone
composer install
cp .env.example .env
php artisan key:generate

sail up -d
sail art migrate:fresh --seed
sail art download
sail art import
```

## LICENSE
AGPL  
