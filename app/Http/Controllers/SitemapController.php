<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\News;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductModel;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

class SitemapController extends Controller
{
    public function index()
    {
        $xml = $this->generateSitemapXML();

        return Response::make($xml, 200, [
            'Content-Type' => 'application/xml',
        ]);
    }

    protected function generateSitemapXML()
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>
                <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // Add your static routes
        $xml .= $this->addStaticRouteToXML(route('home'));
        $xml .= $this->addStaticRouteToXML(route('sewa'));
        $xml .= $this->addStaticRouteToXML(route('contact'));
        $xml .= $this->addStaticRouteToXML(route('privacy'));
        $xml .= $this->addStaticRouteToXML(route('tos'));

        // Add dynamic routes based on your web routes
        $xml .= $this->addDynamicRoutesFromModelToXML();

        // Add Voyager routes
        // $xml .= $this->addVoyagerRoutesToXML();

        $xml .= '</urlset>';

        return $xml;
    }

    protected function addStaticRouteToXML($url)
    {
        return "<url><loc>{$url}</loc></url>";
    }

    protected function addDynamicRoutesFromModelToXML()
    {
        $xml = '';

        $modelRoutes = [
            Page::class => '/{slug}',
            News::class => '/news/{slug}',
            Product::class => '/product/{slug}',
            Brand::class => '/product/brand/{slug}',
            ProductCategory::class => '/product/category/{slug}',
            ProductModel::class => '/product/model/{slug}',
            ProductType::class => '/product/type/{slug}',
            // Add more models and routes as needed
        ];

        foreach ($modelRoutes as $modelClass => $routeFormat) {
            $models = $modelClass::all();

            foreach ($models as $model) {
                $url = url(str_replace('{slug}', $model->slug, $routeFormat));
                $xml .= $this->addStaticRouteToXML($url);
            }
        }

        return $xml;
    }

    // protected function addVoyagerRoutesToXML()
    // {
    //     $voyagerRoutes = collect(Route::getRoutes())->filter(function ($route) {
    //         return Str::startsWith($route->getPrefix(), 'bengkel');
    //     });

    //     $xml = '';

    //     $voyagerRoutes->each(function ($route) use (&$xml) {
    //         $url = url($route->uri());
    //         $xml .= $this->addStaticRouteToXML($url);
    //     });

    //     return $xml;
    // }
}
