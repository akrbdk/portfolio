### How to Deploy the Project

#### Running the Project with `Docker`

* Copy `.env.example` to `.env`
* Apply environment settings in `.env`
* Start the `web` service: `docker-compose up -d web`. The `php` service will start automatically.
* In the `php` service container, execute the following commands: `composer install -n`, `php artisan key:generate`, `php artisan orchid:link`

#### Running the Project Manually

* Copy `.env.example` to `.env`
* Apply environment settings in `.env`
* Execute the following commands: `composer install -n`, `php artisan key:generate`, `php artisan orchid:link`
