<?php

namespace Packages\Sitemap\Src\Facade;

use Illuminate\Support\Facades\Facade;

class SitemapFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'sitemaps';
    }
}
