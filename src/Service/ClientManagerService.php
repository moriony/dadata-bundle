<?php

namespace Moriony\DadataBundle\Service;

use GuzzleHttp\Command\Guzzle\GuzzleClient;
use Moriony\Dadata\Client;
use Moriony\Dadata\Factory;

class ClientManagerService
{
    protected $factory;
    protected $config;
    protected $clients = [];
    protected $guzzleClients = [];

    public function __construct(Factory $factory, array $config)
    {
        $this->config = $config;
        $this->factory = $factory;
    }

    protected function getClientConfig($name)
    {
        $config = null;
        if (isset($this->config['clients'][$name])) {
            $config = $this->config['clients'][$name];
        }
        if (is_null($config)) {
            throw new \RuntimeException('Configuration for dadata client %s was not specified.');
        }
        if (!isset($config['token'])) {
            throw new \RuntimeException('Authorization token for dadata client %s was not specified.');
        }
        if (!isset($config['secret'])) {
            throw new \RuntimeException('Secret key for dadata client %s was not specified.');
        }
        return $config;
    }

    /**
     * @param string $name
     * @return Client
     */
    public function getClient($name)
    {
        if (!array_key_exists($name, $this->clients)) {
            $this->clients[$name] = $this->factory->createClient($this->getClientConfig($name));
        }
        return $this->clients[$name];
    }

    /**
     * @param string $name
     * @return GuzzleClient
     */
    public function getGuzzleClient($name)
    {
        if (!array_key_exists($name, $this->guzzleClients)) {
            $this->guzzleClients[$name] = $this->factory->createGuzzleClient($this->getClientConfig($name));
        }
        return $this->guzzleClients[$name];
    }
}