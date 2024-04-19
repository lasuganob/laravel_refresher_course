<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Specifications:
- PHP version: 8.1.9
- Node version: 18.7.0
- NPM version: 8.15.0

## Run locally
**Note:** I used ***Laragon*** as my development environment.

1. Clone repository and switch to `dev` branch.
2. Set virtual hosts in laragon settings to `{name}.local`.
3. Setup DB in `phpmyadmin`, make sure the DB name matches with the `DB_DATABASE` value in `.env`.
4. Run `npm install` to install dependencies.
5. Run `php artisan migrate` to build DB Schema.
6. Run `php artisan db:seed --class="UserSeeder"` to seed users. Assign an `admin` by manually changing it's role in `users` table (you need to login to phpmyadmin to do this). 
7. Run `php artisan db:seed --class="PostSeeder"` - you might want to modify the number of records to seed, currently it is set to 20000 records.
8. Run `php artisan serve`.
9. Run `npm run dev` to compile resources and enable hot reload.

### Additional Notes
This laravel project still needs to be refactored as this is only my playground for coding, feel free to comment and correct my mistakes or my implementation.
