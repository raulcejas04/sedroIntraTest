<?php

namespace Symfony\Config;

require_once __DIR__.\DIRECTORY_SEPARATOR.'KnpuOauth2Client'.\DIRECTORY_SEPARATOR.'HttpClientOptionsConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'KnpuOauth2Client'.\DIRECTORY_SEPARATOR.'ClientsConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class KnpuOauth2ClientConfig implements \Symfony\Component\Config\Builder\ConfigBuilderInterface
{
    private $httpClient;
    private $httpClientOptions;
    private $clients;
    
    /**
     * Service id of HTTP client to use (must implement GuzzleHttp\ClientInterface)
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function httpClient($value): self
    {
        $this->httpClient = $value;
    
        return $this;
    }
    
    public function httpClientOptions(array $value = []): \Symfony\Config\KnpuOauth2Client\HttpClientOptionsConfig
    {
        if (null === $this->httpClientOptions) {
            $this->httpClientOptions = new \Symfony\Config\KnpuOauth2Client\HttpClientOptionsConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "httpClientOptions()" has already been initialized. You cannot pass values the second time you call httpClientOptions().');
        }
    
        return $this->httpClientOptions;
    }
    
    public function clients(string $variable, array $value = []): \Symfony\Config\KnpuOauth2Client\ClientsConfig
    {
        if (!isset($this->clients[$variable])) {
            return $this->clients[$variable] = new \Symfony\Config\KnpuOauth2Client\ClientsConfig($value);
        }
        if ([] === $value) {
            return $this->clients[$variable];
        }
    
        throw new InvalidConfigurationException('The node created by "clients()" has already been initialized. You cannot pass values the second time you call clients().');
    }
    
    public function getExtensionAlias(): string
    {
        return 'knpu_oauth2_client';
    }
            
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['http_client'])) {
            $this->httpClient = $value['http_client'];
            unset($value['http_client']);
        }
    
        if (isset($value['http_client_options'])) {
            $this->httpClientOptions = new \Symfony\Config\KnpuOauth2Client\HttpClientOptionsConfig($value['http_client_options']);
            unset($value['http_client_options']);
        }
    
        if (isset($value['clients'])) {
            $this->clients = array_map(function ($v) { return new \Symfony\Config\KnpuOauth2Client\ClientsConfig($v); }, $value['clients']);
            unset($value['clients']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->httpClient) {
            $output['http_client'] = $this->httpClient;
        }
        if (null !== $this->httpClientOptions) {
            $output['http_client_options'] = $this->httpClientOptions->toArray();
        }
        if (null !== $this->clients) {
            $output['clients'] = array_map(function ($v) { return $v->toArray(); }, $this->clients);
        }
    
        return $output;
    }
    

}
