Dadata Bundle for Symfony 2
=====================
Symfony 2 bundle for Dadata.ru [API client](https://github.com/moriony/dadata-client).








Dadata.ru API Client
==========
[Dadata.ru](http://dadata.ru) API client based on Guzzle 5.

Configuration
==========

First of all, add yours datada.ru credentials to `/app/config/parameters.yml`

```yml
parameters:
    dadata.token: *** token ***
    dadata.secret: *** secret ***
```

Add bundle configuration to `/app/config.config.yml`

```yml
dadata:
    clients:
        default:
            token: %dadata.token%
            secret: %dadata.secret%
        second_client: # you can add multiply clients if you need
            token: %dadata.token%
            secret: %dadata.secret%
```

Register bundle in `/app/AppKernel.php`

```php
  $bundles = array(
    # ...
    new Moriony\DadataBundle\DadataBundle(),
    # ...
  );
```

Now dadata bundle is ready to use.

Installing
==========

This project can be installed using Composer. Add the following to your
composer.json:

```javascript

{
    "require": {
        "moriony/dadata-bundle": "dev-master"
    }
}
```

Todo
==========
- automated testing
