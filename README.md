# Dadata Bundle for Symfony 2
Symfony 2 bundle for Dadata.ru [API client](https://github.com/moriony/dadata-client).

## Configuration

First of all, add yours datada.ru credentials to `/app/config/parameters.yml`

```yml
parameters:
    dadata.token: *** token ***
    dadata.secret: *** secret ***
```

Add bundle configuration to `/app/config/config.yml`

```yml
dadata:
    clients:
        default:
            token: %dadata.token%
            secret: %dadata.secret%
        second_client: # You can add multiply clients if you need
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

## How to use

```php
class DefaultController extends Controller
{
    public function indexAction()
    {
        # ...
        $manager = $this->container->get('dadata.client_manager');
        $client = $manager->getClient('default');
        $response = $client->cleanAddress("мск сухонска 11/-89");
        # ...
    }
}
```

## Installing

This project can be installed using Composer. Add the following to your
composer.json:

```javascript

{
    "require": {
        "moriony/dadata-bundle": "dev-master"
    }
}
```

## Todo
- automated testing
