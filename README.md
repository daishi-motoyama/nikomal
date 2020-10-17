<p align="center"><img src="https://user-images.githubusercontent.com/65531136/95590284-d6287780-0a80-11eb-9fd0-a46974a14466.png" max-width="400" max-height="100"></p>

## アプリ概要

あらゆる動物達の「笑顔」を投稿・共有するアプリです。  
またユーザー同士でフォローやいいねやコメントをして、交流することもできます。

## 制作背景

「訪れた人のほんの僅かでも、癒しや笑顔になれるお手伝いができればいいな」  
これが、私がアプリを制作にあたる際の想いでした。  
次に、どうしたらその想いを実現できるかと考え、「動物の笑顔」に着目しました。  
元々私は動物が大好きで、実際に動く動物だけでなく、写真等でも閲覧したりします。
その中で、動物の人の感情に与える影響力は多大だと感じ、特に彼らの幸せそうに見える  
笑顔等の表情は、見ている側にも幸せな感情を与えてくれると思いました。  
しかしその表情は一瞬であったりします。  
ですので、その一瞬を写真という形で残し、訪れた人にも笑顔になっていただける  
そう感じ「動物の笑顔」をテーマにしました。
飼っているペット、動物園にいた動物達など彼らの楽しそうな一瞬を、思い出として残し  
共有し、新型ウィルスも流行している世の中で、nikomalに訪れた人に笑顔や癒しになれる  
お手伝いができれば幸いです。

## アプリリンク
[nikomalリンク](https://nikomal.com)

- 非ログイン状態の場合は、投稿閲覧・検索のみ可能です。ログインすると新規投稿・コメント等可能になります。
- 「かんたんログイン」ボタンをクリックすると、メールアドレス等入力せず、お試しユーザーとしてログインできます。
- メールアドレス`admin@example.com` パスワード`admin0987654321`で『管理ユーザー』としてログインできます。
- 『管理ユーザー』は、他ユーザーのアカウント・投稿・コメントの削除権限を持ちます。

## 機能一覧

- ユーザー機能
    - ユーザー登録、ログイン、ログアウト
    - ユーザー一覧表示、プロフィール編集、登録情報編集
        - メールアドレスとパスワード再設定時のメール通知確認
    - アバター画像プレビュー
- 投稿機能
    - 投稿一覧表示、投稿詳細表示、投稿削除、新規投稿、投稿編集
    - 投稿画像プレビュー
    - 投稿カテゴリー選択は、select2を使用
    - 投稿一覧表示は、masonry + imagesloadedを使用
- コメント機能
    - コメント一覧表示、新規コメント投稿、コメント削除
    - Ajaxを使用
- いいね機能
    - いいねユーザー・投稿一覧表示、人気順表示機能
    - いいね登録・解除Ajaxを使用
    - いいね投稿一覧、人気順表示は、masonry + imagesloadedを使用
- フォロー機能
    - フォロー・フォロワー一覧表示
    - フォロー登録・解除Ajaxを使用
- 検索機能
    - キーワード・カテゴリー検索
    - カテゴリー検索は、select2を使用
    - 検索表示は、masonry + imagesloadedを使用
- ページネーション機能
    - 投稿一覧、人気順表示、検索表示、いいね投稿一覧、フォロー・フォロワー一覧、ユーザー一覧、コメント一覧はinfinite scrollを使用
- 管理ユーザー機能
    - 一般ユーザーのアカウント、投稿、コメントを削除する権限
- その他
    - フラッシュメッセージにtoastrを使用
    - スムーススクロール

## 使用画面
<p align="center"><img src="https://user-images.githubusercontent.com/65531136/96328594-c4962f80-107f-11eb-977e-9663647e802a.png" width="100%"></p>

## 使用技術

### フロントエンド
- HTML / CSS
- JavaScript
- Jquery 3.5.1

### バックエンド
- PHP 7.3.21
- Laravel 6.18.41

### テスト
- PHPUnit 8.5.8
- Laravel Dusk 6.7
- Larastan 0.6.4

### インフラ
- AWS（ EC2 / ALB / Route53 / ACM / RDS / VPC / SES / S3 )

### データベース
- RDS for MySQL 5.7.31

### Webサーバー
- Nginx

### CI
- CircleCI

## AWS構成図
<p align="center"><img src="https://user-images.githubusercontent.com/65531136/96327561-9ad80b00-1075-11eb-8a7c-cfe397325028.png" width="100%"></p>

## ER図
<p align="center"><img src="https://user-images.githubusercontent.com/65531136/95578893-a7ee6c00-0a6f-11eb-8983-18a75e780be3.png" width="100%"></p>