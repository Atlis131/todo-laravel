# ToDo List

ToDo List is App written in Laravel 11 <br><br>
Features:

<ul>
    <li>Register / Login</li>
    <li>View, Create, Edit, Delete Tasks</li>
    <li>Filter tasks by Status, Priority, Due</li>
    <li>Send notification about upcoming tasks (1 day before)</li>
</ul>

## Setting up app

```bash
composer install

php artisan migrate

php artisan serve or set up using Apache/Nginx
```

## Things to change in .env

```bash
DB_CONNECTION=mysql
DB_HOST= // Address
DB_PORT=3306
DB_DATABASE= // DB Name (Needs to be created before)
DB_USERNAME= // DB Username
DB_PASSWORD= // DB Password

MAIL_MAILER=smtp
MAIL_HOST= // Host
MAIL_PORT= // Port
MAIL_USERNAME= // User
MAIL_PASSWORD= // Password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS= // From
MAIL_FROM_NAME=ToDo
```

## Sending Notifications

By default Notifications are set to send once a day at 1 am.

```bash
php artisan schedule:run    

Should be added to server crontab or ran manually

```
