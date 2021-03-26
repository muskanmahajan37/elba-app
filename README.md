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
+--------+----------+----------------------+------+------------------------------------------------------+------------+
| Domain | Method   | URI                  | Name | Action                                               | Middleware |
+--------+----------+----------------------+------+------------------------------------------------------+------------+
|        | GET|HEAD | /                    |      | Closure                                              | web        |
|        | GET|HEAD | api/departments      |      | App\Http\Controllers\DepartmentController@findAll    | api        |
|        | GET|HEAD | api/departments/{id} |      | App\Http\Controllers\DepartmentController@findById   | api        |
|        | GET|HEAD | api/employees        |      | App\Http\Controllers\EmployeeController@findAll      | api        |
|        | GET|HEAD | api/employees/{id}   |      | App\Http\Controllers\EmployeeController@findById     | api        |
|        | GET|HEAD | data/import          |      | App\Http\Controllers\ImportExcelController@importCsv | web        |
+--------+----------+----------------------+------+------------------------------------------------------+------------+

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

### Importing data
To import the data I just have created a simple endpoint on `/data/import`, so we can simply hit that endpoint and then the application will read from `employees.csv` which is located in `public` directory.
</br>

The feature supports updating data, adding new data, etc.. </br>
You can update the data in the csv, or add new ones, then just hit again the `/data/import` and the data should be updated in database.




## Run tests
There are 10 tests in total. </br>
To run test we have two options:
* composer test,
or </br>
* php artisan test


For tests, I have set up factories for each model (Employee,Department).
Then I've called the factories to create some dummy data, so I can use while
testing the endpoints. </br>

Each test uses a fresh database (sqlite), so we can clearly test the application independently.




