<?php

namespace Symfony\Config\KnpuOauth2Client;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class HttpClientOptionsConfig 
{
    private $timeout;
    private $proxy;
    private $verify;
    
    /**
     * @default null
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function timeout($value): self
    {
        $this->timeout = $value;
    
        return $this;
    }
    
    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function proxy($value): self
    {
        $this->proxy = $value;
    
        return $this;
    }
    
    /**
     * Use only with proxy option set
     * @default null
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function verify($value): self
    {
        $this->verify = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['timeout'])) {
            $this->timeout = $value['timeout'];
            unset($value['timeout']);
        }
    
        if (isset($value['proxy'])) {
            $this->proxy = $value['proxy'];
            unset($value['proxy']);
        }
    
        if (isset($value['verify'])) {
            $this->verify = $value['verify'];
            unset($value['verify']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->timeout) {
            $output['timeout'] = $this->timeout;
        }
        if (null !== $this->proxy) {
            $output['proxy'] = $this->proxy;
        }
        if (null !== $this->verify) {
            $output['verify'] = $this->verify;
        }
    
        return $output;
    }
    

}
