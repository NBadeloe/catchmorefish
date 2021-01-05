laravel version:7.28.4
composer version:1.10.15

to start:
add this file in xampp/htdocs
make catchmorefish database
edit DB_DATABASE in .env to catchmorefish
php migrate --seed
(migrate doesnt work?
check the order of the migrations in migrations)

to run application:
php artisan serve
npm run

login:
email:user@user.com
password:12345678

Where to find what:

app/http
Controllers->cruds

/routes
routes->what controller needs what url/route

/database
migrations-> database creates(migrations)
seeds->premade data inserts

/recources:
views/layouts/app.blade.php->normal navbar and side navbar
views->pages(each controller/crud had its own directory)
