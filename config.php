<?php

return [
    /**
     * Name of class-provider
     *
     * Available providers:
     * * \Maffinca69\ImageProxy\Providers\WeServ (alias: weserv)
     *
     * @see Maffinca69\ImageProxy\Providers
     */
    'provider' => env('LARAVEL_IMAGE_PROXY_PROVIDER', 'weserv'),

    /**
     * Specified settings for providers
     */
    'providers' => [
        'weserv' => [
            'default_options' => [
                'host' => 'https://images.weserv.nl'
            ]
        ]
    ]
];
