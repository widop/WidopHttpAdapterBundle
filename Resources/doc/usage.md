# Usage

In order to use an adapter. You need to request the associated service.

## Buzz

``` php
// Request the buzz http adapter
$buzzHttpAdapter = $this->get('widop_http_adapter.buzz');

// Issue an http request
$content = $buzzHttpAdapter->getContent($url);
```

## cURL

``` php
// Request the curl http adapter
$curlHttpAdapter = $this->get('widop_http_adapter.curl');

// Issue an http request
$content = $curlHttpAdapter->getContent($url);
```

That's all !
