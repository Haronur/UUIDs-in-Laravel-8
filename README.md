<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

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

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
## -- Generate dummy data in Laravel 8 using Model Factory -- 
Run `php artisan migrate --seed` (it has some seeded data for your testing)

## -- Implementing UUIDs as primary keys --

#### Step 1 Let's make that a Trait 
To create a new Trait, create a `\App\Http\Traits\` folder (only my preference, you can put it somewhere else too), and also a new file for the Trait. We will call the file `UsesUuid.php`.
- Here is the code for the trait:
```
<?php

namespace App\Http\Traits;

use Illuminate\Support\Str;

trait UsesUuid
{
  protected static function bootUsesUuid() {
    static::creating(function ($model) {
      if (! $model->getKey()) {
        $model->{$model->getKeyName()} = (string) Str::uuid();
      }
    });
  }

  public function getIncrementing()
  {
      return false;
  }

  public function getKeyType()
  {
      return 'string';
  }
}
```
#### Finally run those below command:
```
php artisan migrate:refresh
php artisan db:seed
```
- And Check your Database table in my case at `phpMyAdmin named` named  `uuids-in-laravel-8`

## Gererate Some Files and back to numbered IDs from (UUIDs)
- Run those below command:

```php artisan make:migration create_products_table --create=products
   php artisan make:model Product
   php artisan make:factory ProductFactory --model=Product
   php artisan make:seeder ProductSeeder
```
#### Finally run those below command:
```
php artisan migrate:refresh
php artisan db:seed
```
- And Check your Database table in my case at `phpMyAdmin named` named  `uuids-in-laravel-8`

## -- Referencing UUIDs as foreign keys --
- To reference a UUID on a table as a foreign key, you simply change the type of the foreign key field on your table. For example, this...
``` 
   Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('category_id')->nullable();
        $table->foreign('category_id')->references('id')->on('categories');
        $table->string('name');
        $table->text('description');
        $table->integer('price');
        $table->timestamps();
    });
```
- ... where we created a unsignedBigInteger to reference the category_id foreign key, changes to this:
```
  Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->uuid('category_id')->nullable();
        $table->foreign('category_id')->references('id')->on('categories');
        $table->string('name');
        $table->text('description');
        $table->integer('price');
        $table->timestamps();
    });
```
