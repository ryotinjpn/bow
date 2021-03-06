# README
# イヌ専用動画・画像共有アプリ『BOW』
![logo](https://user-images.githubusercontent.com/59902916/89963165-e17a4500-dc81-11ea-9f6c-384774965f93.png)

## http://www.bowjp.com/
# 概要
本アプリケーションはイヌ好きが集い、お気に入り動画・画像を投稿し共有するサービスです。

開発目的は殺処分問題改善に貢献する事です。

捨てられたりペットショップで売れ残ったイヌは、次の里親や保護先が見つからない場合、保健所で殺処分されてしまいます。

本アプリケーション上に良質なイヌ飼い主コミュニティを形成。動物愛護センターに保護されているイヌと譲受人のマッチングを図る事で、問題改善に貢献出来ればと思い開発しました。

# 本番環境
- デプロイ先 : Heroku
- ログイン画面下部に「ゲストユーザーログイン」を実装
    - ユーザー登録なしで利用可能です。 

# 開発経緯
1. 譲受人を増やす事で殺処分数を減らす
    - 本アプリケーション上で良質なイヌ飼い主コミュニティを形成する。
      - コミュニテイの新規参入者を増やし、保護されているイヌと譲受人のマッチングを図る。
      - 良質なコミュニティを形成する事で、悪戯や悪意あるユーザーが入ることを防ぐ。
1. イヌ好きの人に楽しんでもらう
    - ユーザーが飼っているイヌの動画・画像を投稿し、いいねやコメントをもらう事で承認欲求を満たしてもらう。
    - 共通の好きな事があるユーザー同士で繋がりを持ってもらう。

# 機能一覧
- 画像投稿機能
- 動画投稿機能
- いいね機能
- コメント機能
- お気に入り登録
- ユーザー登録、更新、削除
- ログイン/ログアウト機能

# 使用技術
## フロントエンド
- HTML/CSS
- bootstrap4
## バックエンド
- PHP 7.4
- Laravel 7.24
## インフラ
- Heroku
- AWS
  - S3 
  - Route 53
- MySQL 5.6
- Apache 2.4

# 課題や今後実装したい機能
- フォロー機能
- 動物愛護センター位置、サイト情報検索機能
- 投稿検索
- ユーザー検索機能
- ダイレクトメッセージ機能
- グループ作成
- 画像トリミング機能
- 施設寄付の決済機能(PAY.JP API)
- CircleCI, Docker環境の構築

# DB設計
## Userテーブル
|Column|Type|Options|
|------|----|-------|
|name|string|null: false|
|email|string|null: false|
|encrypted_password|string|null: false|
|profile|text||
|image|text||
|youtube|text||

### Association
- has_many :posts
- has_many :comments


## Postテーブル
|Column|Type|Options|
|------|----|-------|
|content|text||
|picture|text||
|user_id|bigint|null: false|

### Association
- has_many :comments
- belongs_to :user


## Commentテーブル
|Column|Type|Options|
|------|----|-------|
|text|text||
|user_id|integer|null: false|
|post_id|integer|null: false|

### Association
- belongs_to :user
- belongs_to :post
