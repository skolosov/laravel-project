docker compose exec app composer install
docker compose exec app php artisan key:generate
docker compose exec app npm install --save-dev vite laravel-vite-plugin
docker compose exec app npm run build
