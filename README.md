# daex_cms

    

## Setup

### Prerequisites

  - PHP >= 7.2.5
  - Laravel >= 7.29

### Installations

    # clone codebase

    # install composer packages
    $ composer install

### Redis

    # start redis
    $ brew services start redis

### Migrations

    For generating table schema in your local database

    # create database table schema
    $ php artisan migrate

    Note: for schema conflict, or schema crash, you can run the following reset command to reset your schema

    # cleanup database table schema
    $ php artisan migrate:reset

### Seeds

    # generate seed data in database
    $ php artisan db:seed

### Testing

    $ ./vendor/bin/phpunit
