## Create Environment

```
$ cp server/.env.development .env
$ docker-compose up -d
$ docker exec -it light-php bash
$ composer install
$ php artisan migrate
```

Access http://localhost:8080
