# Laravel Nova Chat

[![Latest Version on Packagist](https://img.shields.io/packagist/v/binarcode/nova-chat.svg?style=flat-square)](https://packagist.org/packages/binarcode/nova-chat)
[![Build Status](https://img.shields.io/travis/binarcode/nova-chat/master.svg?style=flat-square)](https://travis-ci.org/binarcode/nova-chat)
[![Quality Score](https://img.shields.io/scrutinizer/g/binarcode/nova-chat.svg?style=flat-square)](https://scrutinizer-ci.com/g/binarcode/nova-chat)
[![Total Downloads](https://img.shields.io/packagist/dt/binarcode/nova-chat.svg?style=flat-square)](https://packagist.org/packages/binarcode/nova-chat)

This is a laravel nova implementation for a real time chat. You can manage who can see whom via Laravel Policies.

## Installation

You can install the package via composer:

```bash
composer require binarcode/nova-chat
```

## Usage

Publish the messages table and configuration file.

```php
php artisan vendor:publish --tag=nova-chat
```


Migrate table:

```php
php artisan migrate
```

Init chat in your `NovaServiceProvider.php` tools just import it as:

```php
public function tools()
{
    return [
        \Binarcode\NovaChat\Tools\ChatTool::make(),
    ];
}
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email eduard.lupacescu@binarcode.com instead of using the issue tracker.

## Credits

- [Eduard Lupacescu](https://github.com/binarcode)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

