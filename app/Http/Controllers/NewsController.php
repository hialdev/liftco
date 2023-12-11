<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Page;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;

class NewsController extends Controller
{
    public function index(Request $request) {
        $limit = 15;
        $search = $request->input('search', '');
        $category = (string) $request->input('category', '');
        
        $meta = Page::all()->keyBy('slug');
        $seo = (object)[
            'title' => $meta->get('home')->meta_title ?? $meta->get('default')->meta_title,
            'desc' => $meta->get('home')->meta_desc ?? $meta->get('default')->meta_desc,
            'image' => Voyager::image($meta->get('home')->image) ?? Voyager::image($meta->get('default')->image),
            'keyword' => $meta->get('home')->meta_keyword ?? $meta->get('default')->meta_keyword,
        ];

        $news = News::query();
    
        // Lakukan filter berdasarkan kata kunci pencarian
        if (!empty($search)) {
            $news->where('title', 'like', "%$search%");
        }
        
        $news->latest();
        
        if (!empty($category)){
            $ctg = NewsCategory::where('slug',$category)->firstOrFail();
            $news = $ctg->news();
        }
        $news = $news->paginate($limit);

        return view('news', compact('seo','news', 'search', 'category'));
    }

    public function show($slug) {
        $meta = Page::all()->keyBy('slug');
        $news = News::where('slug',$slug)->firstOrFail();
        $seo = (object)[
            'title' => $news->title ?? $meta->get('default')->meta_title,
            'desc' => $news->meta_description ?? $meta->get('default')->meta_desc,
            'image' => Voyager::image($news->image) ?? Voyager::image($meta->get('default')->image),
            'keyword' => $news->meta_keyword ?? $meta->get('default')->meta_keyword,
        ];
        $suggests = [];
        
        $news_list1 = News::latest()->limit(4)->get();
        $news_list = NewsCategory::where('slug',$news->categories[0]->slug)->firstOrFail();
        
        foreach ($news_list->news as $new) {
            if ($new->slug != $slug) {
                array_push($suggests, $new);
            }
        }
        
        foreach ($news_list1 as $news1) {
            if(count($suggests) < 4){
                array_push($suggests,$news1);
            }else{
                break;
            }
        }

        return view('news_item', compact('seo','news','suggests'));
    }

    
}
