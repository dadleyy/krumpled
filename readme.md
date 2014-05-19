### Krumpled

Krumpled is an all-in-one money management and bank account tracking solution. The application is designed to give users the ability to see their finances as a calendar over time, allowing them to see exactly where they stand one day at a time.

## Requirements (system)

- Apache 2+
- PHP 5.5+
- Mysql

## Building

The project uses [composer](https://getcomposer.org), [npm](http://nodejs.org) and [bower](http://bower.io) for it's packages and dependencies.

```
composer install --prefer-dist
npm install
bower install
php artisan migrate
```

## Running locally

To run this locally, install apache and PHP 5.5+ with a virtual directory pointed at the `public` directory. You will also need to have your database configured on your local machine, so take a look at the `app/config/database.php` setup for local environments.
