
## Product Displayer

This Application is a laravel app with (SPA-feeling) that renders the products of categories


## The stack

- Laravel 
- Livewire
- Tailwindcss
- Pest

## Setup

- Clone the project
- Run `composer install`
- Run `composer post-root-package-install`
- Run `npm install`
- Run `npx tailwindcss -i ./resources/css/app.css -o ./public/css/app.css`
- Run `php artisan migrate --seed`
- Run `php artisan serve` Or `valet link` and visit http://product-displayer.test/

