Cotta & Cush RBAC
=================
Custom Permission Based Access Control Yii2 Extension

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run
```
php composer.phar require --prefer-dist yii2-permissions-ext "*"
```

or add

```
"yii2-permissions-ext": "*"
...
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
 APPLICATION_ENV=development ./yii migrate/create install --migrationPath=@runtime/tmp-extensions/cottacush-rbac/migrations
```