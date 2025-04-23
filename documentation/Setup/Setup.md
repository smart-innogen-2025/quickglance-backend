# Setup Prerequisites

Install postgreSQL and pgAdmin 4 for the database

[PostgreSQL and pgAdmin 4 installation guide (0:00 to 3:44 mins)](https://www.youtube.com/watch?v=hX0z0X2nq2c)

Make a copy of .env using the file env.example and then add your MySQL database credentials to establish a connection.

```typescript
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=quickglance_backend // Create a database on "pgAdmin 4" first
DB_USERNAME= // add your pgAdmin username here
DB_PASSWORD= // add your pgAdmin password here
```

Modify the "autoload" replace it to this:

```typescript
"autoload": {
        "psr-4": {
            "App\\": "app/",
            "Database\\Factories\\": "database/factories/",
            "Database\\Seeders\\": "database/seeders/"
        },
        "files": [
            "app/Helpers/helpers.php"
        ]
    },
```

![alt text](/documentation/Setup/composer-json.png)

After setting up the .env and composer.json run the following commands:

```
# Install package dependencies
$ composer install

# Generate the APP_KEY
$ php artisan key:generate

# Clear all composer's cache directories, Update Autoloader and Remove the cached bootstrap files
$ composer clear
$ composer dump-autoload
$ php artisan optimize:clear

# Drop all tables and re-run all migrations with seeders
$ php artisan migrate:fresh --seed

# Start the server
$ php artisan serve
```
