<?php

namespace Maffinca69\ImageProxy\Contracts;

use Maffinca69\ImageProxy\Exceptions\ImageProxyValidationException;

interface Provider
{
    /**
     * @param string $url
     * @param array $options
     * @return string
     */
    public function build(string $url, array $options = []): string;

    /**
     * @param string $url
     * @param array $options
     *
     * @throws ImageProxyValidationException
     *
     * @return mixed
     */
    public function validate(string $url, array $options = []);
}
