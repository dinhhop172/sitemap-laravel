<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;

class CreateSiteMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:create';

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
        $sitemap = \App::make('sitemap');

        $sitemap->add(route('index'), Carbon::now('Asia/Ho_Chi_Minh'), 1, 'daily');

        $products = \DB::table('products')->orderBy('created_at', 'desc')->get();

        foreach ($products as $product) {
            //$sitemap->add(url, thời gian, độ ưu tiên, thời gian quay lại)
            $sitemap->add(route('products.show', $product->slug), $product->updated_at, 1, 'daily');
        }

        $sitemap->store('xml', 'sitemap');

        if(\File::exists(public_path() . '/sitemap.xml')) {
            \File::copy(public_path('sitemap.xml'), base_path('sitemap.xml'));
        }
    }
}
