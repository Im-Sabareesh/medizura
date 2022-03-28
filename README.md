# Websocket 🛰

This is only for receive message from webservice and send Websocket message into pusher

## Usage

1. Clone this repository
2. `composer install`
3. `cp .env.example .env`
4. `php artisan migrate`
5. `php artisan key:generate`
6. `php artisan websockets:serve`


## Known Issues:

If you face Undefined index: name issue during composer install 
Follow this link: (https://stackoverflow.com/questions/61177995/laravel-packagemanifest-php-undefined-index-name)
