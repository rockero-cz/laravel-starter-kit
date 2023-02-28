# Rockero starter-kit

[![Latest Version on Packagist](https://img.shields.io/packagist/v/rockero-cz/starter-kit.svg?style=flat-square)](https://packagist.org/packages/rockero-cz/starter-kit)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/rockero-cz/starter-kit/run-tests?label=tests)](https://github.com/rockero-cz/starter-kit/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/rockero-cz/starter-kit/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/rockero-cz/starter-kit/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/rockero-cz/starter-kit.svg?style=flat-square)](https://packagist.org/packages/rockero-cz/starter-kit)

## Installation

Innstall the package via composer:

```bash
composer require rockero-cz/starter-kit
```

Then make the initial setup with:

```bash
php artisan rockero:install
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="starter-kit-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="starter-kit-views"
```

## Features

### Static analysis

Initializes PHPStan with level 5.

### Formatting and linting

-   Publishes Pint with custom configuration.
-   Installs Tlint with custom preset.

### Custom stubs

Publishes Laravel's default stubs so we have unified source code across projects.

### Helpful commands

#### Generate a custom class

```bash
# Generate a plain class:
php artisan make:class Flight

# Generate a plain class with a matching test:
php artisan make:class Flight --pest

# Generate a class with constructor method:
php artisan make:class Flight --construct
php artisan make:class Flight -c

# Generate a class with invoke method:
php artisan make:class Flight --invokable
php artisan make:class Flight -i
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [Rockero](https://github.com/rockero-cz)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
