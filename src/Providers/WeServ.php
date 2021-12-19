<?php

namespace Maffinca69\ImageProxy\Providers;

use Maffinca69\ImageProxy\Contracts\Provider;
use Maffinca69\ImageProxy\Exceptions\ImageProxyValidationException;

class WeServ implements Provider
{

    /**
     * @param string $url
     * @param array $options
     *
     * @return string
     */
    public function build(string $url, array $options = []): string
    {
        $options['url'] = $this->prepareUrl($url);
        $params = $options;
        unset($params['host']);

        return $options['host'] . '?' . http_build_query($params);
    }

    /**
     * @param string $url
     *
     * @return string
     */
    private function prepareUrl(string $url): string
    {
        $parsedUrl = parse_url($url);

        return $parsedUrl['host'] . $parsedUrl['path'];
    }

    /**
     * @param string $url
     * @param array $options
     *
     * @return void
     *
     * @throws ImageProxyValidationException
     */
    public function validate(string $url, array $options = [])
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === false) {
            throw new ImageProxyValidationException('Url is not valid', 400);
        }
    }
}
