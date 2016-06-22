# CottaCush RBAC

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]


## Install

Via Composer

``` bash
$ composer require cottacush/yii2-permissions-ext
$ ./yii migrate/up --migrationPath=@vendor/yii2-permissions-ext/migrations
```


## Usage

Add implementation of ManagerInterface to components
``` php
    //App Config
    'components'    =>
    [
    //...
        'permissionManager' => [
            'class' => '\cottacush\rbac\DbPermissionManager'
        ],
    //...
    ]
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email <developers@cottacush.com> instead of using the issue tracker.

## Credits

- Adegoke Obasa goke@cottacush.com
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/cottacush/yii2-permissions-ext.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/cottacush/yii2-permissions-ext/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/cottacush/yii2-permissions-ext.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/cottacush/yii2-permissions-ext.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/cottacush/yii2-permissions-ext.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/cottacush/yii2-permissions-ext
[link-travis]: https://travis-ci.org/cottacush/yii2-permissions-ext
[link-scrutinizer]: https://scrutinizer-ci.com/g/cottacush/yii2-permissions-ext/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/cottacush/yii2-permissions-ext
[link-downloads]: https://packagist.org/packages/cottacush/yii2-permissions-ext
[link-author]: https://github.com/goke-epapa
[link-contributors]: ../../contributors
