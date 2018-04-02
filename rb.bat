set n=%1
if "%1"=="" set n=1
php artisan migrate:rollback --step %n%
