<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemap = app()->make('sitemaps');

        $sitemap->addUrl(route('index'), Carbon::now('Asia/Ho_Chi_Minh'), 1, 'daily');

        $products = DB::table('products')->orderBy('created_at', 'desc')->get();
        foreach ($products as $product) {
            //$sitemap->add(url, thời gian, độ ưu tiên, thời gian quay lại)
            $sitemap->addUrl(route('products.show', $product->slug), Carbon::parse($product->updated_at), 1, 'daily');
        }

        $products_paginate = DB::table('products')->paginate(2);
        for ($i = 1; $i <= $products_paginate->lastPage(); $i++) {
            $sitemap->addUrl(route('users.index', 'page='.$i), Carbon::parse($product->updated_at), 1, 'daily');
        }

        $dom = new DOMDocument();
        $dom->loadXML($sitemap->generateXml());
        if (! File::exists(public_path() . '/sitemap.xml')) {
            fopen(public_path() . '/sitemap.xml', 'w+');

            $dom->save('../public/sitemap.xml');
        }
        $dom->save('../public/sitemap.xml');
    }
}
