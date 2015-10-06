Cotta & Cush RBAC
=================
Custom Permission Based Access Control Yii2 Extension


Contributors
------------
Adegoke Obasa <goke@cottacush.com>

Requirements
------------
* [Yii2 2.0.*](http://www.yiiframework.com/download/)
* [Composer](https://getcomposer.org/doc/00-intro.md#using-composer)


Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Run

```json
    "require": {
        ...
        
    "yii2-permissions-ext": "dev-master"
        ...
    },
    "repositories": [
            {
                "type": "vcs",
                "url": "git@bitbucket.org:cottacush/yii2-permissions-ext.git"
            }
    ]
```

to the require section of your `composer.json` file.


Usage
-----
```bash
 APPLICATION_ENV=development ./yii migrate/create install --migrationPath=@vendor/yii2-permissions-ext/migrations
```