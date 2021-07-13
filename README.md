### Как развернуть проект

#### Запуск проекта через `Docker`

* скопировать `.env.example` в `.env`
* применить настройки окружения в `.env`
* запустить сервис `web` - `docker-compose up -d web`, автоматически запустится сервис `php`
* в контейнере сервиса `php` выполнить команды: `composer install -n`, `php artisan key:generate`, `php artisan orchid:link`

#### Запуск проекта обычным способом

* скопировать `.env.example` в `.env`
* применить настройки окружения в `.env`
* выполнить команды: `composer install -n`, `php artisan key:generate`, `php artisan orchid:link`
