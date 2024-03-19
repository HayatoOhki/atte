# 勤怠管理システム
## 環境構築
### Dockerビルド
1. git clone git@github.com:HayatoOhki/ability-test.git
2. docker-compose up -d --build  
※MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせて docker-compose.yml ファイルを編集してください。
### Laravel環境構築
1. docker-compose exec php bash
2. composer install
3. .env.exampleファイルから.envを作成し、環境変数を変更
4. php artisan key:generate
5. php artisan migrate
6. php artisan db:seed
## 使用環境
・PHP 7.4  
・Laravel 8.83  
・MySQL 8.0
## ER図
![index drawio](https://github.com/HayatoOhki/ability-test/assets/157372211/39002491-dbca-4003-85fb-94a2e3152b5f)
## URL
・開発環境：http://localhost/  
・phpMyAdmin：http://localhost:8080/
