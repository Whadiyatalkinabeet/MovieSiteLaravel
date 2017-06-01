# MovieSiteLaravel 
A copy of an older php project rewritten using Laravel.

We should convert the site to use MongoDB rather than mySQL, it will make it a lot easier to store users and their favourites. 

To clone and run locally (From https://stackoverflow.com/questions/38602321/cloning-laravel-project-from-github):

1. Download the project
2. Go to the file using cd
3. Type composer install
4. Download a new .env template and place in the root directory of the project - https://github.com/laravel/laravel/blob/master/.env.example (env contains sensitive database information and is never pushed to github.)
5. Type php artisan key:generate
6. Open the .env file and change the database name to moviesite, username to root and leave the password field empty.
7. Type php artisan migrate
8. Go to localhost:8000 or 127.0.0.1:8000




