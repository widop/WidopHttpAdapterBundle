# UPGRADE

### 1.0.0 to 1.1.0

The business classes have been moved to a dedicated library for reuasibility purpose. If you're using Symfony 2.0.*,
you need to update your `deps` file:

```
[widop-http-adapter]
    git=http://github.com/widop/http-adapter.git
```

Autoload the library:

``` php
// app/autoload.php

$loader->registerNamespaces(array(
    'Widop\\HttpAdapter' => __DIR__.'/../vendor/widop-http-adapter/src',
    // ...
);
```

Run the vendors script:

``` bash
$ php bin/vendors update
```
