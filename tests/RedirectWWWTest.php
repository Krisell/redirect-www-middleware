<?php

namespace Krisell\RedirectWWWMiddleware\Tests;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\Route;
use Krisell\RedirectWWWMiddleware\Http\Middleware\RedirectWWW;

class RedirectWWWTest extends TestCase
{
    /** @test */
    public function it_redirects_the_www_subdomain_to_main_domain()
    {
        Route::get('route', function () {
        })->middleware(RedirectWWW::class);

        $this->get('http://www.localhost/route')->assertRedirect('http://localhost/route');
    }

    /** @test */
    public function it_does_not_redirect_other_subdomains_or_no_subdomain()
    {
        Route::get('route', function () {
        })->middleware(RedirectWWW::class);

        $this->get('http://subdomainwww.localhost/route')->assertStatus(200);
        $this->get('http://subdomain.localhost/route')->assertStatus(200);
        $this->get('http://www2.localhost/route')->assertStatus(200);
        $this->get('http://localhost/route')->assertStatus(200);
    }

    /** @test */
    public function it_does_not_affect_other_routes_than_those_that_uses_the_middleware()
    {
        Route::get('route', function () {
        })->middleware();

        $this->get('http://subdomainwww.localhost/route')->assertStatus(200);
        $this->get('http://subdomain.localhost/route')->assertStatus(200);
        $this->get('http://www2.localhost/route')->assertStatus(200);
        $this->get('http://www.localhost/route')->assertStatus(200);
        $this->get('http://localhost/route')->assertStatus(200);
    }
}
