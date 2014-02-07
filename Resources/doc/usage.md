# Usage

## Configure your Adapter

### Max redirects

By default the bundle configures every adapter to follow 5 redirections.
But you can refine this value in order to match your project needs.

For example, if you want your application to follow 10 redirections, then you can use the following configuration:

``` yaml
widop_http_adapter:
    max_redirects: 10
```

If you want to disable the redirect feature, simply set it to zero.

## Request your Adapter

In order to use an adapter, you need to request the associated service:

### cURL

``` php
$curlHttpAdapter = $this->container->get('widop_http_adapter.curl');
```

### Stream

``` php
$streamHttpAdapter = $this->container->get('widop_http_adapter.stream');
```

### Buzz

``` php
$buzzHttpAdapter = $this->container->get('widop_http_adapter.buzz');
```

### Guzzle

``` php
$guzzleHttpAdapter = $this->container->get('widop_http_adapter.guzzle');
```

### Zend

``` php
$zendHttpAdapter = $this->container->get('widop_http_adapter.zend');
```

## Make a GET/POST request

Each adapter allows you to make a GET or POST request. Everything is explained
[here](https://github.com/widop/http-adapter/blob/master/doc/usage.md).
