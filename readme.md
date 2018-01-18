## TECH TEST – LINK SHORTENER

- Install PHP7
`brew install php71`

- Install the driver to enable access from PHP to PostgreSQL database
`brew install php71-pdo-pgsql`

- Clone the repository https://github.com/GishaJamesB/Link-Shortner.git

```
git clone https://github.com/GishaJamesB/Link-Shortner.git link-shortner
cd link-shortner
php composer install
php artisan serve --port=4555
```

If you can create a local database, the database connection will be faster. To use local database please update .env file with the correct credentials. The current free plan seems to be very slow.

If you are using local database, you have to run the following command in the project directory.

```
php artisan migrate
```

### Screenshots
![Home page](https://github.com/GishaJamesB/Link-Shortner/blob/master/screenshots/link-submission-page.png)
![Link submission Output](https://github.com/GishaJamesB/Link-Shortner/blob/master/screenshots/shortened-url.png)
![Statistics page](https://github.com/GishaJamesB/Link-Shortner/blob/master/screenshots/statistics.png)
