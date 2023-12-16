<?php

namespace App\Http\Controllers;

use App\Mail\WebMail;
use App\Mail\SewaMail;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Client;
use App\Models\HeroBanner;
use App\Models\Message;
use App\Models\News;
use App\Models\Office;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Service;
use App\Models\Sosmed;
use App\Models\Value;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use TCG\Voyager\Facades\Voyager;

class PageController extends Controller
{
    public function index() {
        $meta = Page::all()->keyBy('slug');
        $seo = (object)[
            'title' => $meta->get('home')->meta_title ?? $meta->get('default')->meta_title,
            'desc' => $meta->get('home')->meta_desc ?? $meta->get('default')->meta_desc,
            'image' => Voyager::image($meta->get('home')->image) ?? Voyager::image($meta->get('default')->image),
            'keyword' => $meta->get('home')->meta_keyword ?? $meta->get('default')->meta_keyword,
        ];

        $values = Value::all();
        $clients = Client::all();

        return view('index', compact('values','clients','seo'));
    }

    public function sewa(){
        $meta = Page::all()->keyBy('slug');
        $seo = (object)[
            'title' => $meta->get('sewa-rental')->meta_title ?? $meta->get('default')->meta_title,
            'desc' => $meta->get('sewa-rental')->meta_desc ?? $meta->get('default')->meta_desc,
            'image' => Voyager::image($meta->get('sewa-rental')->image) ?? (Voyager::image($meta->get('default')->image) ?? '/src/image/banner.jpg'),
            'keyword' => $meta->get('sewa-rental')->meta_keyword ?? $meta->get('default')->meta_keyword,
        ];
        
        return view('sewa',compact('seo'));
    }

    public function contact(){
        $meta = Page::all()->keyBy('slug');
        $seo = (object)[
            'title' => $meta->get('contact')->meta_title ?? $meta->get('default')->meta_title,
            'desc' => $meta->get('contact')->meta_desc ?? $meta->get('default')->meta_desc,
            'image' => Voyager::image($meta->get('contact')->image) ?? Voyager::image($meta->get('default')->image),
            'keyword' => $meta->get('contact')->meta_keyword ?? $meta->get('default')->meta_keyword,
        ];

        $offices = Office::latest()->get();
        $mainoffice = Office::where('is_main',1)->firstOrFail();
        $banner = Banner::where('is_show',1)->firstOrFail();
        return view('contact', compact('seo','offices','mainoffice','banner'));
    }

    public function privacy(){
        $meta = Page::all()->keyBy('slug');

        $seo = (object)[
            'title' => $meta->get('privacy-policy')->meta_title ?? $meta->get('default')->meta_title,
            'desc' => $meta->get('privacy-policy')->meta_desc ?? $meta->get('default')->meta_desc,
            'image' => Voyager::image($meta->get('privacy-policy')->image) ?? Voyager::image($meta->get('default')->image),
            'keyword' => $meta->get('privacy-policy')->meta_keyword ?? $meta->get('default')->meta_keyword,
        ];

        return view('privacy', compact('seo'));
    }

    public function tos(){
        $meta = Page::all()->keyBy('slug');

        $seo = (object)[
            'title' => $meta->get('terms-of-services')->meta_title ?? $meta->get('default')->meta_title,
            'desc' => $meta->get('terms-of-services')->meta_desc ?? $meta->get('default')->meta_desc,
            'image' => Voyager::image($meta->get('terms-of-services')->image) ?? Voyager::image($meta->get('default')->image),
            'keyword' => $meta->get('terms-of-services')->meta_keyword ?? $meta->get('default')->meta_keyword,
        ];

        return view('tos', compact('seo'));
    }


    // FORM Handling

    public function send(Request $req) {
        try {
            $validate = $req->validate([
                'name' => 'required|min:4|max:23',
                'email' => 'required|email',
                'no' => 'required|numeric',
                'messages' => 'required'
            ]);

            // Save to database
            Message::create([
                'name' => $validate['name'],
                'email' => $validate['email'],
                'no' => $validate['no'],
                'message' => $validate['messages'],
            ]);

            $mail = setting('site.mail');
            Mail::to($mail)->send(new WebMail($validate));
            
            $wa = setting('site.wa');
            $txt = "Hi%20DML%20%21%21%20saya%20".$req->get('name')."%20-%20dengan%20email%20".$req->get('email')."%20dan%20no%20telp%20".$req->get('no')."%0A%0A".$req->get('messages');
            return redirect()->away("https://wa.me/$wa?text=$txt");
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        }
    }

    public function sewaReq(Request $req) {
        try {
            $validate = $req->validate([
                'name' => 'required|min:4|max:23',
                'company' => 'required|min:3',
                'email' => 'required|email',
                'no' => 'required|numeric',
                'needs' => 'required',
                'spesification' => 'required',
                'duration-start' => 'required',
                'duration-end' => 'required'
            ]);

            // Save to database
            Message::create([
                'name' => $validate['name'],
                'email' => $validate['email'],
                'no' => $validate['no'],
                'message' => "Sewa & Rental Requested | " . $validate['spesification'],
            ]);

            $mail = setting('site.mail');
            Mail::to($mail)->send(new SewaMail($validate));
            
            $wa = setting('site.wa');
            $txt = "Hi%20DML%20%21%21%20saya%20".$req->get('name')."%20-%20dengan%20email%20".$req->get('email')."%20dan%20no%20telp%20".$req->get('no')."%0A%0A".$req->get('spesification');
            return redirect()->away("https://wa.me/$wa?text=$txt");
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        }
    }
}
