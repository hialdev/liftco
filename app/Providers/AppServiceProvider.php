<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\BannerSection;
use App\Models\Brand;
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
        $news = News::latest()->limit(4)->get();
        $brands = Brand::latest()->get();
        $products = Product::where('featured',1)->latest()->limit(3)->get();
        $product_category = ProductCategory::all();
        $page = Page::all()->keyBy('slug');
        $sosmeds = Sosmed::latest()->limit(4)->get();
        View::share('page',$page);
        View::share('products',$products);
        View::share('newsglobal',$news);
        View::share('brandsglobal',$brands);
        View::share('sosmeds',$sosmeds);
        View::share('product_category',$product_category);
    }

    
}
