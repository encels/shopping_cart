## Installation

1. Clone the GitHub repository:

```git clone https://github.com/encels/shopping_cart.git```

2. Enter the project directory:

```cd shopping_cart```

3. Create an `.env` file from the `.env.example` file:

```cp .env.example .env```

4. Edit the `.env` file and configure your database information.

5. Run the following commands to install the dependencies.

```composer install```

6. Run the migrations:

```php artisan migrate```

7. Run the seeder:

```php artisan db:seed```

8. To run the web server, you can use the following command:

```php -S localhost:8000 -t public/```

Now you can access the project at the following address: `http://localhost:8000`.

## Technical Details
The project is made in Lumen 10.x and uses a MySQL database. The migrations and the seeder can be found in the `database` directory.

## Documentation
The project API documentation can be found at the following link: https://documenter.getpostman.com/view/2223722/2s946h9saL

## Credits
The project was created by *encels*.

## Testing:
For the run the test please use the following command:

```vendor/bin/phpunit --testdox```