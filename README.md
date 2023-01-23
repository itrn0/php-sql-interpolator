# PHP SQL Interpolator

PHP SQL Interpolator is a library that allows you to safely interpolate variables into SQL queries. The library is designed to prevent SQL injection.

## Installation

You can install the library via composer:

```bash
composer require itrn0/php-sql-interpolator
```

## Usage

To use the library, you need to create a new instance of the SqlInterpolator class and use the __invoke method to interpolate variables into your SQL query.

```php
$interp = new SqlInterpolator();
$userId = 1002;
$query = <<<SQL
    SELECT * FROM users WHERE id = {$interp($userId)} 
        OR name IN ({$interp('Alice', 'Bob')})
SQL;
$params = $interp->getParams(); // { ":param_1" => 1002, ... }

// database query example
$db->query($query, $params);
```