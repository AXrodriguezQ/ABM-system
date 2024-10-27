<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
<p align="center">
<a href="https://www.mysql.com/" target="_blank"><img src="https://somospnt.com/images/blog/cover/mysql.jpg" width="400" alt="MySql image"></a>
<a href="https://jwt.io/" target="_blank"><img src="https://avatao.com/media/JWT-blogpost.png" width="400" alt="JWT logo"></a>
</p>

## AMB/CRUD Project

This project consists of a login to access an administrator panel where registered users are managed and only those users can create new ones.

# Instructions

Clone or download the project then follow these steps, remember that you have to have xampp and composer on your machine to be able to start the application.

- Install dependencies

Open your terminal and navigate to the project folder. Then, run the following command to install Composer dependencies:

```bash
composer install
```

-  Configure the .env file

Si no tienes un archivo .env, copia el archivo de ejemplo:

```bash
cp .env.example .env
```

Then, open the .env file and configure the variables according to your needs, such as the database connection:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_la_base_de_datos
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_contraseña

-  Generate the application key

Run the following command to generate a unique key for your application:

```bash
php artisan key:generate
```

-  Migrate the database

Run this command for the migrations:

```bash
php artisan migrate
```

-  Sowing data

Run this command to seed the information and populate the database:

```bash
php artisan db:seed
```

-  Setting permissions (in some cases)

If you are in a Unix environment, make sure the storage and bootstrap/cache folders have the correct permissions:

```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

-  Start the development server

After completing these steps, the server can now be started:

```bash
php artisan serve
```

## Postman collection

Go to postman and then paste this file that is in the root of the project to have all the endpoints documented and with their respective information.
AMB-CRUD system.postman_collection.json

If you don't have the environment variables for postman you can paste this file to get them.
Environment AMB.postman_environment.json

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
