<?php

namespace Packages\Sitemap\Src;

use Illuminate\Support\ServiceProvider;

class SitemapServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('sitemaps', function() {
            return new SitemapGenerator();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
