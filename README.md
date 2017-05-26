# MovieSiteLaravel 
Fully working log in system. Documentation - https://laravel.com/docs/5.4/authentication#authentication-quickstart

To clone and run locally (From https://stackoverflow.com/questions/38602321/cloning-laravel-project-from-github):

1. Download the project
2. Go to the file using cd
3. Type composer install
4. Type copy .env.example .env if using cmd (You will have to download a .env template, git doesn't seem to want to commit my .env files - https://github.com/laravel/laravel/blob/master/.env.example)
5. Type php artisan key:generate
6. Open the .env file and change the database name to whatever you have, username to root and leave the password field empty.
7. Type php artisan migrate
8. Go to localhost:8000




