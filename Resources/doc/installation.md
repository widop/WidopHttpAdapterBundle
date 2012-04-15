# Installation

## Symfony 2.1.*

### Add the WidopHttpAdapterBundle to your composer configuration

Add the bundle to the require section of your `composer.json`

``` json
{
    "require": {
        "widop/http-adapter-bundle": "dev-master"
    }
}
```

Run the composer update command

``` bash
$ php composer.phar update
```

### Add the WidopHttpAdapterBundle to your application kernel

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    return array(
        //..
        new Widop\HttpAdapterBundle\WidopHttpAdapterBundle(),
    );
}
```

## Symfony 2.0.*

### Add the WidopHttpAdapterBundle to your vendor/bundles/ directory

#### Using the vendors script

Add the following lines in your ``deps`` file

```
[WidopHttpAdapterBundle]
    git=http://github.com/widop/WidopHttpAdapterBundle.git
    target=bundles/Widop/HttpAdapterBundle
```

Run the vendors script

``` bash
$ php bin/vendors update
```

#### Using submodules

``` bash
$ git submodule add http://github.com/widop/WidopHttpAdapterBundle.git vendor/bundles/Widop/HttpAdapter
```

### Add the Widop namespace to your autoloader

``` php
<?php
// app/autoload.php

$loader->registerNamespaces(array(
    //..
    'Widop' => __DIR__.'/../vendor/bundles',
);
```

### Add the WidopHttpAdapterBundle to your application kernel

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    return array(
        //..
        new Widop\HttpAdapterBundle\WidopHttpAdapterBundle(),
    );
}
```
