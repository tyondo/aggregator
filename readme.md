
##Production ready but still under ACTIVE development:

This is a blog package for laravel. Most of the packages available
tend to force the user to use an administration panel or have them
as the base package.

This package is meant to be dropped into an existing app to provide
blogging functionality with media management capability.

The package can be used from laravel 5.3 and above. To install:

Run:
````
composer require tyondo/aggregator
````
in the config/app.php add:
````
Tyondo\Aggregator\TyondoAggregatorServiceProvider::class,
````
If you are a developer, you can contribute and extend by cloning it in:
packages/tyondo folder and then in your composer.json file add:

````
"Tyondo\\Aggregator\\": "packages/tyondo/aggregator/src/"
````
and then require the extra packages used by aggregator:

````
"laravelcollective/html": "5.3.1|5.4.1",
"unisharp/laravel-filemanager": "^1.8",
"intervention/image": "^2.4",
````

After either of the above steps. Run

````
php artisan aggregator:install
````
This will install the package fully
#Pending features
**1. Adding blog tag
**2. Separating media manager to its own link
**3. Parametrizing the image resizing funtionality
**4. Building blog API end points.