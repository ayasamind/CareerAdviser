## 開発環境構築

```
$ cp server/.env.development .env
$ docker-compose up -d
$ docker exec -it light-php bash
$ composer install
$ php artisan migrate
$ php artisan db:seed
```

Access http://localhost:8080


## ステージング環境

https://ca-com.herokuapp.com

環境変数設定

```
$ sh heroku.sh
```

## LPのデプロイ

require aws-cli

Update ~/.aws/config
```
[profile ca-com]
output = json
region = ap-northeast-1
aws_access_key_id = ******
aws_secret_access_key = ******
```

Then Run Command

```
$ sh deploy_production.sh
```
