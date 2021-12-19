# Package laravel-image-proxy

This is a class for generate image-proxy url. Implementations of providers:
* image.weserv.nl

## Install
Require package:
```bash
composer require maffinca69/laravel-image-proxy
```
```bash
// config/app.php
'providers' => [
    ...
    Maffinca69\ImageProxy\ServiceProvider::class,
];
```

```bash
php artisan vendor:publish --provider="Maffinca69\ImageProxy\ServiceProvider" --tag="config"
```

## Usage
```php
class IndexController extends Controller
{
    public function getProxyUrl(Maffinca79\ImageProxy\Proxy $proxyProvider)
    {
        return $proxyProvider->getUrl('your_url_img', [
            'fit' => 'cover',
            'mask' => 'circle',
            'h' => 150,
            'w' => 150
        ])
        
        // ...
    }
}
```
