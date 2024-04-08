## Turbo Laravel Task Lists App

This is an example app of that uses [Turbo Laravel](https://turbo-laravel.com).

### Running it Locally

To run this app locally, you must:

1. Create the `.env` file, install the Composer dependencies, and generate the app key:

```bash
cp .env.example .env
composer install
php artisan key:generate
```

2. Install the NPM dependencies and compile the assets:

```bash
npm install && npm run build
```

3. You're going to have to start 3 processes (from different terminals), the local web server, the queue worker process, and the Reverb WebSockets server:

```bash
php artisan serve
php artisan queue:work --tries=1 --sleep=0
php artisan revert:start
```
