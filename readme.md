# Laravel Nova Chat
<p align="center">
 <a href="https://packagist.org/packages/BianrCode/nova-chat"><img src="https://poser.pugx.org/BinarCode/nova-chat/v/stable.svg" alt="Latest Stable Version"></a>
 
  <a href="https://packagist.org/packages/BinarCode/nova-chat"><img src="https://poser.pugx.org/BinarCode/nova-chat/license.svg" alt="License"></a>
</p>

This is a laravel nova implementation for a real time chat. You can manage who can see whom via Laravel Policies.

# How it looks

![Message List](/docs/list.png)


![New Message](/docs/new.png)

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

