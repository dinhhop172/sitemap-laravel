<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use DOMDocument;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class NewSiteMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:new';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sitemap = app()->make('sitemaps');

        $sitemap->addUrl(route('index'), Carbon::now('Asia/Ho_Chi_Minh'), 1, 'daily');

        $products = DB::table('products')->orderBy('created_at', 'desc')->get();
        foreach ($products as $product) {
            $sitemap->addUrl(route('products.show', $product->slug), Carbon::parse($product->updated_at), 1, 'daily');
        }

        $products_paginate = DB::table('products')->paginate(2);
        for ($i = 1; $i <= $products_paginate->lastPage(); $i++) {
            $sitemap->addUrl(route('users.index', 'page='.$i), Carbon::parse($product->updated_at), 1, 'daily');
        }

        return $sitemap->generateXml();
    }
}
