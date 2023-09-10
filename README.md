[![Latest Version on Packagist](https://img.shields.io/packagist/v/imaginativeimpact/laravel-mot-history.svg?style=flat-square)](https://packagist.org/packages/imaginativeimpact/laravel-mot-history)
[![Total Downloads](https://img.shields.io/packagist/dt/imaginativeimpact/laravel-mot-history.svg?style=flat-square)](https://packagist.org/packages/imaginativeimpact/laravel-mot-history)

# Laravel MOT History

A Laravel package for retrieving data from the DVSA MOT History API.

# Documentation and install instructions

The MOT History API documentation can be found at:
https://dvsa.github.io/mot-history-api-documentation

## Application Register

To use the MOT History API you must first request access at https://www.smartsurvey.co.uk/s/MOT_History_TradeAPI_Access_and_Support

## Install

Take a note of the API key and add it to your .env file, along with the URL (currently this is https://beta.check-mot.service.gov.uk/trade/vehicles/mot-tests however will change once the service moves to Production)

```
MOT_HISTORY_BASE_URL=
MOT_HISTORY_API_KEY=
```

Via Composer

```
composer require imaginativeimpact/laravel-mot-history
```

You can publish the config file with:

```php
php artisan vendor:publish --provider="ImaginativeImpact\LaravelMotHistory\MotHistoryServiceProvider" --tag="config"
```

When published, the config/mot-history.php config file contains:

```php
<?php

return [
    'baseURL' => env('MOT_HISTORY_BASE_URL'),
    'apiKey'  => env('MOT_HISTORY_API_KEY')
];
```

## Usage

In a controller import the class:

```
use ImaginativeImpact\LaravelMotHistory\Facades\MotHistory;
```

In a view or closure call the facade:

```php
MotHistory::getAllTestsForVehicle('ZZ99ABC')
```


## Methods
### Get All MOT Tests
To retrieve a full extract of the database. The last page normally increments by 10 each day.

```php
MotHistory::getAllTests(pageNumber: 1);
```

### Get All MOT Tests For A Vehicle
To retrieve all tests performed for a specific Vehicle Registration

```php
MotHistory::getAllTestsForVehicle(registration: 'ZZ99ABC');
```

### Get All MOT Tests Performed On A Specific Date
To retrieve all tests performed on a specific date. $time of 1 would return tests completed at 00:01am, $time 300 would return tests completed at 05:00am, $time 600 would return tests completed at 10:00am. 

```php
MotHistory::getAllTestsByDate(date: "20230907", time: 750);
```

### Get All MOT Tests For A Vehicle By VehicleId
To retrieve all tests performed for a specific Vehicle ID (retrieved from one of the other methods)

```php
MotHistory::getAllTestsForVehicleByVehicleID(vehicleID: "txFOZuX0-wqlI48QFWDiGA==");
```

## Contributing

Contributions are welcome and will be fully credited.

Contributions are accepted via Pull Requests on [Github](https://github.com/imaginativeimpact/laravel-mot-history).

## Pull Requests

- **Document any change in behaviour** - Make sure the `README.md` and any other relevant documentation are kept up-to-date.

- **Consider our release cycle** - We try to follow [SemVer v2.0.0](http://semver.org/). Randomly breaking public APIs is not an option.

- **One pull request per feature** - If you want to do more than one thing, send multiple pull requests.

## Security

If you discover any security related issues, please email security@imaginativeimpact.com email instead of using the issue tracker.

## License

MIT