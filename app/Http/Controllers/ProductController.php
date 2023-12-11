<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductModel;
use App\Models\ProductType;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;

class ProductController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search', '');
        
        $meta = Page::all()->keyBy('slug');
        $seo = (object)[
            'title' => $meta->get('product')->meta_title ?? $meta->get('default')->meta_title,
            'desc' => $meta->get('product')->meta_desc ?? $meta->get('default')->meta_desc,
            'image' => Voyager::image($meta->get('product')->image) ?? Voyager::image($meta->get('default')->image),
            'keyword' => $meta->get('product')->meta_keyword ?? $meta->get('default')->meta_keyword,
        ];

        $products = Product::query();
    
        // Lakukan filter berdasarkan kata kunci pencarian
        if (!empty($search)) {
            $products->where('title', 'like', "%$search%");
        }

        $products = $products->paginate(15);
        return view('product', compact('seo','products','search'));
    }

    public function show($slug) {
        $meta = Page::all()->keyBy('slug');
        $product = Product::where('slug',$slug)->firstOrFail();
        $seo = (object)[
            'title' => $product->title ?? $meta->get('default')->meta_title,
            'desc' => $product->meta_description ?? $meta->get('default')->meta_desc,
            'image' => Voyager::image($product->image) ?? Voyager::image($meta->get('default')->image),
            'keyword' => $product->meta_keyword ?? $meta->get('default')->meta_keyword,
        ];

        return view('product_item', compact('seo','product'));
    }

    public function brand($slug) {
        $meta = Page::all()->keyBy('slug');
        $brand = Brand::where('slug', $slug)->firstOrFail();
        $seo = (object)[
            'title' => $brand->title ?? $meta->get('default')->meta_title,
            'desc' => $brand->meta_desc ?? $meta->get('default')->meta_desc,
            'image' => Voyager::image($brand->image) ?? Voyager::image($meta->get('default')->image),
            'keyword' => $brand->meta_keyword ?? $meta->get('default')->meta_keyword,
        ];


        return view('product_brand', compact('seo','brand'));
    }

    public function category($slug) {
        $meta = Page::all()->keyBy('slug');
        $category = ProductCategory::where('slug', $slug)->firstOrFail();
        $seo = (object)[
            'title' => $category->title ?? $meta->get('default')->meta_title,
            'desc' => $category->meta_desc  ?? $meta->get('default')->meta_desc,
            'image' => Voyager::image($category->image) ?? Voyager::image($meta->get('default')->image),
            'keyword' => $category->meta_keyword ?? $meta->get('default')->meta_keyword,
        ];


        return view('product_category', compact('seo','category'));
    }

    public function model($slug) {
        $meta = Page::all()->keyBy('slug');
        $model = ProductModel::where('slug', $slug)->firstOrFail();
        $seo = (object)[
            'title' => $model->title ?? $meta->get('default')->meta_title,
            'desc' => $model->meta_desc  ?? $meta->get('default')->meta_desc,
            'image' => Voyager::image($model->image) ?? Voyager::image($meta->get('default')->image),
            'keyword' => $model->meta_keyword ?? $meta->get('default')->meta_keyword,
        ];


        return view('product_model', compact('seo','model'));
    }

    public function type($slug) {
        $type = ProductType::where('slug', $slug)->firstOrFail();
        $meta = Page::all()->keyBy('slug');
        $seo = (object)[
            'title' => $type->title ?? $meta->get('default')->meta_title,
            'desc' => $type->meta_desc  ?? $meta->get('default')->meta_desc,
            'image' => Voyager::image($type->image) ?? Voyager::image($meta->get('default')->image),
            'keyword' => $type->meta_keyword ?? $meta->get('default')->meta_keyword,
        ];


        return view('product_type', compact('seo','type'));
    }
}
