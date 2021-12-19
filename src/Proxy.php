<?php

namespace Maffinca69\ImageProxy;

use Maffinca69\ImageProxy\Contracts\Provider;

class Proxy
{
    /**
     * @var Provider
     */
    private Provider $bridge;

    /**
     * @var array
     */
    private array $defaultOptions;

    /**
     * Proxy constructor
     *
     * @param Provider $bridge
     * @param array $defaultOptions
     */
    public function __construct(Provider $bridge, array $defaultOptions = [])
    {
        $this->bridge = $bridge;
        $this->defaultOptions = $defaultOptions;
    }

    /**
     * @param string $url
     * @param array $options
     *
     * @throws Exceptions\ImageProxyValidationException
     *
     * @return string
     */
    public function getUrl(string $url, array $options = []): string
    {
        $this->bridge->validate($url, $options);

        return $this->bridge->build(
            $url,
            array_merge($this->defaultOptions, $options)
        );
    }
}
