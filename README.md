## Create Environment

```
$ cp server/.env.development .env
$ docker-compose up -d
$ docker exec -it light-php bash
$ composer install
$ php artisan migrate
$ php artisan db:seed
```

Access http://localhost:8080


## LPのデプロイ

```
$ sh deploy_production.sh
```
