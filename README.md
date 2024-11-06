# Atte(勤怠記録システム)

## 作成した目的

このシステムは、社員の勤怠を簡単に記録・確認できるようにし、人事評価の基盤として役立てることを目的としています。

## アプリケーションの URL

## 機能一覧

- ユーザー認証機能：ログイン/ログアウト、メール認証機能
- 勤怠登録機能：勤務開始・終了時刻と休憩時間の記録
- 勤怠確認機能：各日の勤務情報の一覧表示、ユーザー毎の勤務情報の一覧表示

## 使用技術(実行環境)

- PHP 8.3.0
- Laravel 8.83.27
- MySQL 8.0.26

## テーブル設計図

![alt](table.png)

## ER 図

![alt](atte.png)

## 環境構築

**Docker セットアップ**

1. `git clone git@github.com:oidon122/atte.git`
2. DockerDesktop アプリを立ち上げる
3. `docker-compose up -d --build`

> _Mac の M1・M2 チップの PC の場合、`no matching manifest for linux/arm64/v8 in the manifest list entries`のメッセージが表示されビルドができないことがあります。
> エラーが発生する場合は、docker-compose.yml ファイルの「mysql」内に「platform」の項目を追加で記載してください_

```bash
mysql:
    platform: linux/x86_64(この文追加)
    image: mysql:8.0.26
    environment:
```

**Laravel 環境構築**

1. `docker-compose exec php bash`
2. `composer install`
3. 「.env.example」ファイルを 「.env」ファイルに命名を変更。または、新しく.env ファイルを作成
4. .env に以下の環境変数を追加

```text
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=no-reply@example.com
MAIL_FROM_NAME=atte
```

5. アプリケーションキーの作成

```bash
php artisan key:generate
```

6. マイグレーションの実行

```bash
php artisan migrate
```

7. シーディングの実行

```bash
php artisan db:seed
```

## URL

- 開発環境：http://localhost/
- phpMyAdmin：http://localhost:8080/
- Mailhog(開発用メール確認ツール)：http://localhost:8025
