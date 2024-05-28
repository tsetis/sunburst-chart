# This is my package sunburst-chart

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tsetis/sunburst-chart.svg?style=flat-square)](https://packagist.org/packages/tsetis/sunburst-chart)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/tsetis/sunburst-chart/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/tsetis/sunburst-chart/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/tsetis/sunburst-chart/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/tsetis/sunburst-chart/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/tsetis/sunburst-chart.svg?style=flat-square)](https://packagist.org/packages/tsetis/sunburst-chart)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require tsetis/sunburst-chart
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="sunburst-chart-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="sunburst-chart-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="sunburst-chart-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$sunburstChart = new Tsetis\SunburstChart();
echo $sunburstChart->echoPhrase('Hello, Tsetis!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Stelios Tsetis](https://github.com/tsetis)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
