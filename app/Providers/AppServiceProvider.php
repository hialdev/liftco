<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\BannerSection;
use App\Models\Brand;
use App\Models\HeroBanner;
use App\Models\ImageContent;
use App\Models\News;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Sosmed;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $image = ImageContent::all()->keyBy('code');
        $heros= HeroBanner::latest()->get();
        $news = News::latest()->limit(4)->get();
        $brands = Brand::latest()->get();
        $products = Product::latest()->limit(5)->get();
        $product_category = ProductCategory::all();
        $page = Page::all()->keyBy('slug');
        View::share('page',$page);
        View::share('products',$products);
        View::share('newsglobal',$news);
        View::share('brandsglobal',$brands);
        View::share('heros',$heros);
        View::share('product_categories',$product_category);
        View::share('getimage',$image);
    }

    
}
