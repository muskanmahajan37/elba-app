# Elba-Application
## Prerequisites


* PHP 8.0.2

```bash
https://www.php.net/downloads
```
Composer - Dependency Manager for PHP
```bash
https://getcomposer.org/
```
* Laravel 8.* </br>
* MySQL

### Environment setup 
Update environment variables.

```
cp .env_example .env
```
Update database variables with your configurations. </br>
After that run:
```
php artisan key:generate
```
and you should be good to go.


---
## Installation
Install dependencies by running:
```bash
composer install
```


## Routes
```
+--------+----------+--------------------+------+------------------------------------------------------+------------+
| Domain | Method   | URI                | Name | Action                                               | Middleware |
+--------+----------+--------------------+------+------------------------------------------------------+------------+
|        | GET|HEAD | api/departments    |      | App\Http\Controllers\DepartmentController@findAll    | api        |
|        | GET|HEAD | api/employees      |      | App\Http\Controllers\EmployeeController@findAll      | api        |
|        | GET|HEAD | api/employees/{id} |      | App\Http\Controllers\EmployeeController@findById     | api        |
|        | GET|HEAD | import             |      | App\Http\Controllers\ImportExcelController@importCsv | web        |
+--------+----------+--------------------+------+------------------------------------------------------+------------+

```

## Run the application
Run database migrations:
```
php artisan migrate:fresh
```

Run laravel server:
```
php artisan serve
```

Visit:
```
http://localhost:8000/import
```
to import data from the excel which is located under `public` directory


for other API endpoints refer to the `Routes` section.

## Run tests

