Cotta & Cush RBAC
=================
Custom Role Basec Access Control Implementation

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist cottacush/cottacush-rbac "*"
```

or add

```
"cottacush/cottacush-rbac": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \cottacush\rbac\AutoloadExample::widget(); ?>```

```bash
 APPLICATION_ENV=development ./yii migrate/create install --migrationPath=@runtime/tmp-extensions/cottacush-rbac/migrations
```