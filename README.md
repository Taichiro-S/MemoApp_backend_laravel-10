# MemoApp

就職用ポートフォリオの１つとして作成した Web アプリケーション [MemoApp](https://github.com/Taichiro-S/MemoApp-docker) のバックエンドのソースコードです。言語は [PHP](https://www.php.net/manual/ja/index.php)を使用し、フレームワークとして [Laravel](https://laravel.com/docs/10.x) を使用しています。

アプリケーションとしての機能や開発環境については[こちら](https://github.com/Taichiro-S/MemoApp-docker)にまとめてあります。

ここでは、

1. バックエンドで特にこだわった点
2. バックエンドで使用したライブラリ

について説明します。

## 1. バックエンドで特にこだわった点

### ページネーション

大量のデータを一度に画面に描画しようとすると、ページのロードに時間がかかり、UX の低下につながります。そのため、本アプリでは一回のリクエストに対して 10 件のデータを返し、複数のページに分けてデータを表示させることで、この問題に対応しています。

### Policy 設定によるデータの保護

ユーザの作成したデータに対して、どのユーザの、どのデータに対する、どのような操作を許容するか、といった設定をすることで、悪意あるユーザによるデータの改竄を防ぎます。

### カスケードデリート

あるデータを削除したときに、そのデータの id などを外部キーとして参照する他のデータが存在した場合、自動的にそのデータも削除する仕組みを導入しています。

**こだわった点、とは言ったものの、実は Laravel のデフォルト機能で簡単に実装できてしまいます。**

「**もう少しこだわりたかった点**」を以下に記載しておきます（これから実装予定...？）。

-   マルチログイン（ユーザと管理者）
-   [Telescope](https://github.com/laravel/telescope) ( デバッガ )
-   [LaraStan](https://github.com/nunomaduro/larastan) ( 静的解析 )
-   テスト ( PHPUnit )

## 2. バックエンドで使用したライブラリ

-   **_[Breeze](https://laravel.com/docs/10.x/starter-kits#laravel-breeze)_** ( 1.21 ) : 認証のための基本的な機能を提供するライブラリ  
    ログイン、ユーザー登録、パスワードリセット、メール確認、パスワード確認などの基本的な機能を提供します。Sanctum と組み合わせて SPA 認証を実装することができます。
    <br/>
-   **_[Sanctum](https://laravel.com/docs/10.x/sanctum)_** ( 3.2 ) : API トークン認証 と SPA 認証のためのライブラリ  
    本アプリでは React で作成した SPA 認証のために Cookie ベースのセッション認証を使用しています。認証はステートフルであり Cookie を使用するため、トークンを使用した CSRF 保護の機能も提供しています。また、オリジンが異なるドメインの認証には CORS 設定も必要ですが、ここでは説明は割愛します。
    SPA 認証の流れは少し複雑なので、自分自身まだ理解が曖昧なところがあります。[こちら](https://dev.to/nicolus/laravel-sanctum-explained-spa-authentication-45g1) の記事の図が参考になるかと思います。
    <br/>
-   **_[Faker](https://github.com/fzaninotto/Faker)_** ( 1.9.1 ) : ダミーデータ生成のためのライブラリ  
    多種多様な型のデータを生成できるライブラリです。Factory, Seeder と組み合わせてデータベースにデータを流し込むことで、アプリケーションの挙動を確認できます。日本語にも対応しています。
