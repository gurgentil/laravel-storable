# Laravel Storable

[![Latest Version](https://img.shields.io/github/release/gurgentil/laravel-storable.svg?style=flat-square)](https://github.com/gurgentil/laravel-storable/releases)
![GitHub Workflow Status](https://img.shields.io/github/workflow/status/gurgentil/laravel-storable/run-tests?label=tests)
[![Quality Score](https://img.shields.io/scrutinizer/g/gurgentil/laravel-storable.svg?style=flat-square)](https://scrutinizer-ci.com/g/gurgentil/laravel-storable)
[![MIT Licensed](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

Create storage transformers for your Eloquent models.

## Installation

Install the package via composer:

```bash
composer require gurgentil/laravel-storable
```

## Usage

Create a storable class:

```bash
php artisan make:storable StorableUser
```

Define the file path and the object representation you want to store:

```php
<?php

namespace App\Storables;

use App\Models\User;
use Gurgentil\LaravelStorable\Storable;

class StorableUser extends Storable
{
    /**
     * @var User
     */
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get file path in storage.
     *
     * @return string
     */
    public function getFilePath(): string
    {
        return "users/{$this->user->uuid}.json";
    }

    /**
     * Get string representation of object to store.
     *
     * @return string
     */
    public function getContents(): string
    {
        return json_encode([
            'id' => $this->user->id,
            'email' => $this->user->email,
            'permissions' => $this->user->permissions->pluck('name')->toArray(),
        ]);
    }
}
```

To write the object to storage, simply call `save()` on the object:

```php
$storable = new StorableUser($user);
$storable->save();
```

Call `delete()` to remove the file from storage:

```php
$storable = new StorableUser($user);
$storable->delete();
```

You can define the disk via environment variable or by passing it to the `save` and `delete` methods:

```dotenv
STORABLE_DISK=gcs
```

```php
$storable = new StorableUser($user);
$storable->save('gcs');
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Gustavo Rorato Gentil](https://github.com/gurgentil)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
