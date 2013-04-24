# Installation

## Symfony >= 2.1.*

Require the bundle in your composer.json file (**You should choose the tag/branch that fits to your needs**):

```
{
    "require": {
        "widop/http-adapter-bundle": "*",
    }
}
```

Register the bundle:

``` php
// app/AppKernel.php

public function registerBundles()
{
    return array(
        new Widop\HttpAdapterBundle\WidopHttpAdapterBundle(),
        // ...
    );
}
```

Install the bundle:

```
$ composer update
```

## Symfony <= 2.0.*

Add Wid'op Http Adapter bundle (**You should choose the tag/branch that fits to your needs**):

```
[WidopHttpAdapterBundle]
    git=http://github.com/widop/WidopHttpAdapterBundle.git
    target=bundles/Widop/HttpAdapterBundle
    version=1.0.0
```

Autoload the Wid'op Http Adapter bundle namespace:

``` php
// app/autoload.php

$loader->registerNamespaces(array(
    'Widop\\HttpAdapterBundle' => __DIR__.'/../vendor/bundles',
    // ...
);
```

Register the bundle:

``` php
// app/AppKernel.php

public function registerBundles()
{
    return array(
        new Widop\HttpAdapterBundle\WidopHttpAdapterBundle(),
        // ...
    );
}
```

Run the vendors script:

``` bash
$ php bin/vendors install
```
