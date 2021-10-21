How to install project
- run 'composer install'
- copy .envexample file and rename to .env then edit .env file change database to your database
- run 'php artisan key:generate'
- run 'php artisan migrate'
- run 'php artisan db:seed --class=CreateUsersSeeder'
- run 'php artisan db:seed --class=CreateDigitalCurrencySeeder'
- and then run 'php artisan serve' to check this project


