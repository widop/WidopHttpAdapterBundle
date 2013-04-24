# Usage

## Request your Adapter

In order to use an adapter, you need to request the associated service:

### Buzz

``` php
$buzzHttpAdapter = $this->container->get('widop_http_adapter.buzz');
```

### cURL

``` php
$curlHttpAdapter = $this->container->get('widop_http_adapter.curl');
```

## Make a GET request

Each adapter allows you to make a GET request:

``` php
$content = $httpAdapter->getContent($url);
```

If you would like to pass custom headers, you can use the second argument:

``` php
$content = $httpAdapter->getContent($url, $headers);
```

## Make a POST request

Each adapter allows you to make a POST request:

``` php
$content = $httpAdapter->postContent($url);
```

If you would like to pass custom headers, you can use the second argument:

``` php
$content = $httpAdapter->postContent($url, $headers);
```

If you would like to pass POST datas, you use the third argument:

``` php
$content = $httpAdapter->getContent($url, $headers, $data);
```
