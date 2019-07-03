[![Build Status](https://travis-ci.org/Krisell/redirect-www-middleware.svg?branch=master)](https://travis-ci.org/Krisell/redirect-www-middleware)
# Redirect WWW Middleware for Laravel
Provides a middleware which redirects all requests made to the www subdomain to the main domain. If possible, perform the redirect before the request hits your appliction instead of using this middleware (e.g. in Nginx, Apache or IIS config).

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
