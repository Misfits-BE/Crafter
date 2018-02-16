# Crafter 

Crafter is the Laravel template that is used for (nearly) all ou projects. 

You may use our template but please notice that we offer no support whatsoever. We also don't follow for this projectsand won't guarantee that the code (especially the master branch) is stable. In short: when using this, you're on your own. 

## Install 

This guide assumes you're using Laravel Valet 

### Laravel App 

Download the master branch

```php 
git clone https://github.com/Misfits-BE/Crafter.git
```

Install the composer dependencies 

```bash 
composer install
```

Make a copy `.env.example` and rename to `.env`

Finally make sure you have a database named `crafter`, and run the migrations and seeds

```php 
php artisan migrate --seed
```

## Assets 

Installing Crafter's front end dependencies requires `npm`. 

```bash 
npm install
```

Crafter uses Laravel Mix to build assets. To build assets run:

```bash 
npm run dev 
```

## Customisation 

- Most of our projects are in Dutch. You can change the language in `config/app.php`. 

## Colofon 

### Contributing 

Generally we won't accept any PR requests to Crafter. If you have discovered a bug or have an idea to improve the code, 
contact us first before you start coding. 

### License 

Crafter and The Laravel framework are open-sourced software licensed under the MIT license
