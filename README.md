# README

[![Build Status](https://secure.travis-ci.org/widop/WidopHttpAdapterBundle.png)](http://travis-ci.org/widop/WidopHttpAdapterBundle)

The bundle integrates the [Wid'op Http Adapter library](https://github.com/widop/http-adapter) into your Symfony2
project. Basically, it allows to issue HTTP requests. Currently, the supported adapters are:

 - [cURL](http://curl.haxx.se/)
 - [Stream](http://php.net/manual/en/book.stream.php)
 - [Buzz](https://github.com/kriswallsmith/Buzz)
 - [Guzzle](http://guzzlephp.org/)
 - [Zend](http://framework.zend.com/manual/2.0/en/modules/zend.http.client.html)

Documentation
-------------

 1. [Installation](http://github.com/widop/WidopHttpAdapterBundle/blob/master/Resources/doc/installation.md)
 2. [Usage](http://github.com/widop/WidopHttpAdapterBundle/blob/master/Resources/doc/usage.md)

## Testing

The bundle is fully unit tested by [PHPUnit](http://www.phpunit.de/) with a code coverage close to **100%**. To execute
the test suite, check the travis [configuration](https://github.com/widop/WidopHttpAdapterBundle/blob/master/.travis.yml).

## Contribute

We love contributors! The bundle is open source, if you'd like to contribute, feel free to propose a PR!

## License

The Wid'op Http Adapter Bundle is under the MIT license. For the full copyright and license information, please
read the [LICENSE](https://github.com/widop/WidopHttpAdapterBundle/blob/master/LICENSE) file that was distributed
with this source code.
