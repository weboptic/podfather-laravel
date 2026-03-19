# Podfather API Wrapper for Laravel

A clean, fluent, and strictly-typed Laravel wrapper for the Podfather API (v1.3.0). 

Built for modern PHP 8.3+ and Laravel 10/11+, this package takes the heavy lifting out of connecting your application to the Podfather system.

## Requirements
- PHP 8.3 or higher
- Laravel 10.0 or 11.0+

## Installation

You can install the package via composer:

```bash
composer require your-vendor/podfather-laravel
```

Publish the configuration file using:

```bash
php artisan vendor:publish --provider="Podfather\PodfatherServiceProvider" --tag="config"
```

## Configuration

Add your Podfather API credentials to your application's `.env` file. You can request an API key from your Podfather account manager.

```env
PODFATHER_API_KEY="your_api_key_here"
PODFATHER_BASE_URL="https://external-api.aws.thepodfather.com/v1"
```

## Usage

This package provides a highly readable Facade (`Podfather`) that dynamically routes to the various API resources.

All HTTP methods return a strictly-typed `array` containing the JSON response from Podfather. If the API returns an HTTP error (404, 500, etc.), an `Illuminate\Http\Client\RequestException` will be thrown.

### Basic Examples

```php
use Podfather\Facades\Podfather;

// Get Account Info
$account = Podfather::account()->get();

// Fetch paginated jobs
$jobs = Podfather::jobs()->get(['page' => 1]);

// Find a specific job by ID
$singleJob = Podfather::jobs()->find(12345);

// Create a new Vehicle
$newVehicle = Podfather::vehicles()->create([
    "vehicleRegistration" => "BD51 SMR",
    "active" => true,
    "depot" => 123
]);

// Delete a driver
Podfather::drivers()->delete(456);
```

### Available Resources

The following resources are mapped and available as chainable methods on the Facade:

- `Podfather::account()`
- `Podfather::customers()`
- `Podfather::depots()`
- `Podfather::drivers()`
- `Podfather::jobs()`
- `Podfather::pods()`
    - Additional methods: `->pdf($podId)`, `->images($podId)`, `->signatures($podId)`
- `Podfather::runs()`
    - Additional methods: `->release($runId)`
- `Podfather::sites()`
- `Podfather::templates()`
- `Podfather::vehicles()`

## Testing

This package is fully tested using [Pest PHP](https://pestphp.com/) and [Orchestra Testbench](https://packages.tools/testbench.html).

To run the test suite:

```bash
composer test
# or
./vendor/bin/pest
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.