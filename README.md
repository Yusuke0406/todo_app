##　概要
1. タスクとやりたいことを管理することができるアプリです。タスクを完了するとポイントが貯まり、そのポイントでやりたいことを購入することができます。さらにユーザーは累計のタスク完了数をもとに強いサッカークラブへと移籍することができます。
 
## 機能一覧
 
- ユーザー登録、ログイン、編集
- カテゴリー追加、削除
- タスク追加、削除
- やりたいこと追加、削除
- ポイント機能
 
## 技術仕様
 #　開発環境
 - PHP/laravel/MAMP/phpMyAdmin/Github/Visual Studio Code
 #　フレームワークバージョン
 - Laravel Framework 7.17.2

## 間に合わなかった機能
 
1. データベースのclubの画像を変数に入れて表示することができませんでした。その代わりにHTMLにif文を使って表示しています。
2. タスクを投稿する時の音声認識ボタンが機能しないエラーを解決できなかったです。
 
## テーブル
### Usersテーブル
|Column|Type|Options|
|-------------|-------------|
|name| varchar|null: false|
|email|varchar|null: false,unique: true|
|password|varchar|null: false|
|point|integer|null: false|


### Categoriesテーブル
| Column | Type | Options |
| ------------- | ------------- |
| cat_name | varchar | null: false |
| user_id | bigintegr |null: false, foreign_key: true |


### Tasksテーブル
| Column | Type | Options |
| ------------- | ------------- |
| content | varchar | null: false,limit: 50 |
| due_date | datetime | null: false |
| completed | integer | null: false |
| user_id | bigintegr |null: false, foreign_key: true |
| cat_id | bigintegr |null: false, foreign_key: true |


### Wantsテーブル
| Column | Type | Options |
| ------------- | ------------- |
| content | varchar | null: false, limit: 30 |
| point | integer | null: false |
| user_id | bigintegr |null: false, foreign_key: true |

### Clubsテーブル
| Column | Type | Options |
| ------------- | ------------- |
| club | varchar | null: false,limit: 20 |
| image | mediumblog | null: false |
| point | integer | null: false |


