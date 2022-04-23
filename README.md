## Setup project:
```
cp .env.example .env
```
Fill .env
```
composer i
php artisan key:generate
php artisan:migrate
php artisan command:create-user {name} {email} {password}
```
Enjoy 🙂