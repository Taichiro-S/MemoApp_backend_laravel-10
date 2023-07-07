# MemoApp

就職用ポートフォリオの１つとして作成した Web アプリケーション [MemoApp](https://github.com/Taichiro-S/MemoApp-docker) のバックエンドのソースコードです。言語は [PHP](https://www.php.net/manual/ja/index.php)を使用し、フレームワークとして [Laravel](https://laravel.com/docs/10.x) ( version 10 ) を使用しています。

アプリケーションとしての機能は[こちら](https://github.com/Taichiro-S/MemoApp-docker)にまとめてあります。

ここでは、

1. バックエンドで特にこだわった点
2. バックエンドで使用したライブラリ

について説明します。

## 1. バックエンドで特にこだわった点

###

TanStack Query というデータキャッシュのライブラリ ( 詳細は以下の説明を参照ください ) を利用して、データベースから取得したページごとのデータについて、前のページのデータをクライアントサイドでキャッシュしておくことでデータの再取得を減らし、また、次のページのデータをプリフェッチすることにより、ページのロード時間を短縮しています。

## 2. バックエンドで使用したライブラリ

-   **_[Axios](https://github.com/axios/axios)_** ( 1.4.0 ) : Http クライアント
    ブラウザまたは Node サーバから Http リクエストを送信するためのライブラリです。通信を CSRF 攻撃から保護するための仕組みをサポートしています。ブラウザの標準ライブラリである [fetch](https://developer.mozilla.org/ja/docs/Web/API/Fetch_API/Using_Fetch) よりも直感的に使いやすいという特徴があります。
