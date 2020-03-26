```bash
php artisan make:component PageBanner 				# New Laravel Component
php artisan make:controller PagesController

php artisan make:model -a Post
php artisan migrate
php artisan migrate:refresh
php artisan route:list
php artisan tinker 										# factory(\App\Post::class, 12)->create();

php artisan make:model -a Category
php artisan migrate
php artisan tinker 										# factory(\App\Category::class, 8)->create();
```
Package: Laravel Media Library
Github: https://github.com/spatie/laravel-medialibrary
Docs (Installation & Setup): https://docs.spatie.be/laravel-medialibrary/v7/installation-setup/

```bash
php artisan storage:link
php artisan make:migration add_subtitle_to_professors_table --table=professors
```

> update APP_URL (port) in .env file and use:

```bash
php artisan serve
```
