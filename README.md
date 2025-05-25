# Kad Kahwin Site :ring:

A simple Laravel application to create a wedding invitation page, with an admin panel to manage the details.

## Getting Started

-   Clone the repository. Then, install required things.
    ```bash
    composer install
    npm install
    ```
-   Copy the `.env.example` file to `.env` and fill in the required environment variables.
    ```bash
    cp .env.example .env
    ```
-   Set the application key:
    ```bash
    php artisan key:generate
    ```
-   Migrate the database:
    ```bash
    php artisan migrate
    ```
-   Modify Seeder in `database/seeders/MajlisDetailSeeder.php` and run the seeder:
    ```bash
    php artisan db:seed --class=MajlisDetailSeeder
    ```
-   Start the development server:
    ```bash
    composer run dev
    ```

You should now see the Kad Kahwin page at http://localhost:8000/fulan-fulanah & http://localhost:8000/fulanah-fulan.

Admin panels is accessible at http://localhost:8000/admin. But first, you need to create a user.

```bash
php artisan make:filament-user
```

## Deploying

<!-- TODO: Cerita pasal hardcoded value contoh dalam filament -->

Check out https://www.cloudpanel.io/. You'll need a server, and a domain.

For deploying on production, setup required requirement from Filament: https://filamentphp.com/docs/2.x/admin/users#authorizing-access-to-the-admin-panel

Also, if you're logging in to Filament, but it throws you error Method not supported. Try running this:

```bash
php artisan vendor:publish --force --tag=livewire:assets
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
