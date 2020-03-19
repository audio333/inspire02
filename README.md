```bash
php artisan make:component PageBanner 				# New Laravel Component
php artisan make:controller PagesController

php artisan make:model -a Post
php artisan migrate
php artisan migrate:refresh
php artisan route:list
php artisan tinker 										# factory(\App\Post::class, 12)->create();
```