php artisan config:cache
php artisan config:clear
php artisan route:cache
php artisan route:clear
php artisan optimize --force
composer dumpautoload -o
echo "Clear and optimizing is ready for production ";
find ./public/assets/autopub/img/ -type f -delete
echo "Clear all images ";