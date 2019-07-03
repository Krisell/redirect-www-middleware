# Redirect WWW Middleware for Laravel
Provides a middleware which redirects all requests made to the www subdomain to the main domain.

## Installation

```bash
composer require krisell/redirect-www-middleware
```

## Usage

Register the middleware in `App\Http\Kernel`

```php
protected $middleware = [
    ...,
    \Krisell\RedirectWWWMiddleware\Http\Middleware\RedirectWWW::class,
    ...,
];
```

## License
MIT
