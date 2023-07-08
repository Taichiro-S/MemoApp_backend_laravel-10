# MemoApp

就職用ポートフォリオの１つとして作成した Web アプリケーション [MemoApp](https://github.com/Taichiro-S/MemoApp-docker) のバックエンドのソースコードです。言語は [PHP](https://www.php.net/manual/ja/index.php)を使用し、フレームワークとして [Laravel](https://laravel.com/docs/10.x) を使用しています。

アプリケーションとしての機能や開発環境については[こちら](https://github.com/Taichiro-S/MemoApp-docker)にまとめてあります。

ここでは、

1. バックエンドで特にこだわった点
2. バックエンドで使用したライブラリ

について説明します。

## 1. バックエンドで特にこだわった点

Laravel 自体が多くの機能を備えているため、Web アプリケーションに求められる大体の機能について、デフォルトの機能で対応できてしまうと思います。
以下に示すものも、一応自分でも意識して作った部分ではありますが、Laravel のデフォルト機能をそのまま使っています。

### ページネーション

### Policy 設定によるデータの保護

### カスケードデリート

実装予定...

-   マルチログイン
-   複数のテーブルを一度に操作する際のトランザクション
-   [Telescope](https://github.com/laravel/telescope) ( デバッガ )
-   [LaraStan](https://github.com/nunomaduro/larastan) ( 静的解析 )
-   テスト ( PHPUnit )

## 2. バックエンドで使用したライブラリ

-   **_[Breeze](https://laravel.com/docs/10.x/starter-kits#laravel-breeze)_** ( 1.21 ) : 認証のための基本的な機能を提供するライブラリ
    ログイン、ユーザー登録、パスワードリセット、メール確認、パスワード確認などの基本的な機能を提供します。Sanctum と組み合わせて SPA 認証機能を構築することができます。
    <br/>
-   **_[Sanctum](https://laravel.com/docs/10.x/sanctum)_** ( 3.2 ) : API トークン認証 と SPA 認証のためのライブラリ
    本アプリでは React で作成した SPA 認証のために Cookie ベースのセッション認証を使用しています。認証はステートフルであり Cookie を使用するため、トークンを使用した CSRF 保護の機能も提供しています。また、オリジンが異なるドメインの認証には CORS 設定も必要ですが、ここでは説明は割愛します。
    SPA 認証の流れは少し複雑なので、[こちら](https://dev.to/nicolus/laravel-sanctum-explained-spa-authentication-45g1) の記事の図が参考になるかと思います。
    <br/>
-   **_[Faker](https://github.com/fzaninotto/Faker)_** ( 1.9.1 ) : ダミーデータ生成のためのライブラリ
    多種多様な型のデータを生成できるライブラリです。Factory, Seeder と組み合わせてデータベースにデータを流し込むことで、アプリケーションの挙動を確認できます。日本語にも対応しています。
