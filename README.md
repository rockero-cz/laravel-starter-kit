<picture>
    <source
        media="(prefers-color-scheme: dark)"
        srcset="https://banners.beyondco.de/Laravel%20Starter%20Kit.png?theme=dark&packageManager=composer+require&packageName=rockero-cz%2Flaravel-starter-kit&pattern=architect&style=style_1&description=Speed+up+the+kickoff.&md=1&showWatermark=0&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg"
    />
      <img alt="Banner" src="https://banners.beyondco.de/Laravel%20Starter%20Kit.png?theme=light&packageManager=composer+require&packageName=rockero-cz%2Flaravel-starter-kit&pattern=architect&style=style_1&description=Speed+up+the+kickoff.&md=1&showWatermark=0&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg">
</picture>

# Laravel Starter Kit

[![Latest Version on Packagist](https://img.shields.io/packagist/v/rockero-cz/laravel-starter-kit.svg?style=flat-square)](https://packagist.org/packages/rockero-cz/laravel-starter-kit)
[![Total Downloads](https://img.shields.io/packagist/dt/rockero-cz/laravel-starter-kit.svg?style=flat-square)](https://packagist.org/packages/rockero-cz/laravel-starter-kit)

## Installation

Install the package via composer:

```bash
composer require rockero-cz/laravel-starter-kit --dev
```

You can customize the installation command by publishing the config file with:

```bash
php artisan vendor:publish --tag="starter-kit-config"
```

Then run the installation command:

```bash
php artisan starter-kit:install
```

## Features

All functionally of `rockero-cz/laravel-starter-kit` are described bellow in a simple list with examples. They are designed to speed up the kickoff of your projects. It can be installed on any kind of `Laravel` application.

---

### Pest setup

The starter kit includes the initial setup of `Pest` by publishing a pre-configured `TestCase`, example tests and also `.env.testing` file.

Additionally, it generates an `ArchitectureTest.php` to maintain the codebase clean and sustainable.

```php
test('globals')
    ->expect(['dd', 'dump', 'ray', 'env'])
    ->not->toBeUsed();

test('controllers')
    ->expect('App\Http\Controllers')
    ->not->toUse('Illuminate\Http\Request');

test('value objects')
    ->expect('App\ValueObjects')
    ->toUseNothing();
```

---

### PHPStan setup

Besides tests, it also prepares static analysis using the `PHPStan` tool with custom configuration on level 7.

```neon
includes:
    - ./vendor/nunomaduro/larastan/extension.neon

parameters:
    level: 7

    checkMissingIterableValueType: false
    checkGenericClassInNonGenericObjectType: false

    paths:
        - app/
```

---

### Duster setup

For linting and formatting we use `Duster` by [Tighten](https://github.com/tighten). `Duster` unifies multiple tools together (`Pint`, `TLint`, `PHP_CodeSniffer` and `PHP CS Fixer`) inside one powerful command. It also helps us to follow some coding standards.

We also have added `PHPStan` inside config to have everything unified in one single command.

```php
{
    "scripts": {
        "lint": {
            "phpstan": ["./vendor/bin/phpstan", "analyse"]
        },
        "fix": {
            "phpstan": ["./vendor/bin/phpstan", "analyse"]
        }
    }
}
```

---

### GitHub Workflows CI

During the installation of the starter-kit, you will be prompted to add CI for GitHub Workflows.

If you choose to proceed, a `ci.yml` file containing tests and `Duster` will be automatically generated.

---

### Stubs

Publish Laravel's default stubs so we have unified source code across projects.

They are also slightly modified to make the programming process more productive.

---

### Commands

Since we follow the `Action` programming concept, the starter kit provides two commands which will make you more productive.

**Make action command:** `php artisan make:action VerifyUserAction`

```php
class VerifyUserAction
{
    /**
     * Run the action.
     */
    public function run(): void
    {
        //
    }
}
```

**Make class command:** `php artisan make:class ShoppingCart`

```php
class ShoppingCart
{
    //
}
```

> Both commands have an option `--test` to also create matching tests.

---

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
