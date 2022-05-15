## Setup
Get source code from Git Repository
```bash
cd /path/to/foldercode
composer i
cp .env.example .env
php artisan key:generate
```
- You have to setup database connection, paste this to your .env file

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=dbname
DB_USERNAME=root
DB_PASSWORD=
```
- Run command

```bash
php artisan migrate
php artisan db:seed

```
## Dev


php artisan migrate:fresh --seed
php artisan db:seed --class=UserSeeder

- Build css
```bash
npm i
npm run watch
```