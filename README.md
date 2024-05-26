## Merchant Katering

Web ini menggunkan framework laravel 10, mysql sebegai database

-   [laravel](https://laravel.com/docs/routing)
-   [PHP V^8.1](https://www.php.net/)
-   [MySQL v5.7](https://dev.mysql.com/doc/refman/5.7/en/index.html)


## Installation

```
git clone https://github.com/moanfs/marketplace.git
```

## usege

1. install

```
cd marketplace
composer install
```
2. rename .evn.example to .env
3. setelah itu generate key dengan copy dibawah

```
php artisan key:generate
```

4. migrasi database dan seeder

```
php artisan migrate
```

```
php artisan db:seed --class=RoleSeeder
```

```
php artisan serve
```

## database structure
 ![database](https://github.com/moanfs/marketplace/blob/main/public/img/db.png)


