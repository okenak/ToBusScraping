# 都バスの時刻表をスクレイピングするツール
都バスの停留所の時刻表ページから時刻データだけを抽出するだけのためのツールです（平日のみ対応）

[都バス：時刻表／五十音選択リンク](https://tobus.jp/blsys/navi?VCD=cresultttbl&ECD=ttsy&LCD=&slst=325&pl=1&RTMCD=23&DYDIV=1&DSDIV=1&DT=20140401&OFFC=3&plky=846&RTMKY=1167&DSTKEY=0&lrid=2&tgo=1)

## 導入方法
事前に[Composer](https://getcomposer.org/)の導入が必要です
```
composer install
```

## 使い方
【勝どき橋南詰】 業１０ 新橋行（平日）の時刻表データを抽出して標準出力します
```
php ToBus.php run:getTimeTable "http://tobus.jp/blsys/navi?LCD=&VCD=cresultttbl&ECD=show&slst=325&pl=1&RTMCD=40&lrid=2&tgo=1"
```
【銀座西六丁目】 業１０ とうきょうスカイツリー駅前行（平日）の時刻表データを抽出してファイルへ出力します
```
php ToBus.php run:putTimeTable "https://tobus.jp/blsys/navi?LCD=&VCD=cresultttbl&ECD=show&slst=445&pl=4&RTMCD=40&lrid=1&tgo=1" ./timeTable.json
```