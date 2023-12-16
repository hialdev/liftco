<?php

namespace App\Http\Widgets;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;
use App\Models\Banner;
use App\Models\Page;

class BannerDimmer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Banner::count();
        $string = trans_choice('Banners', $count);

        $page = Page::all()->keyBy('slug');
        $image = $page->get('default')->image ? Voyager::image($page->get('default')->image) : Voyager::image($page->get('default')->image);

        return view('admin.dimmer', array_merge($this->config, [
            'icon'   => 'voyager-photos',
            'title'  => "{$count} {$string}",
            'text'   => 'Banner ditampilkan pada halaman Contact',
            'button' => [
                'text' => 'Kelola Banners',
                'link' => route('voyager.banners.index'),
            ],
            'image' => $image ?? voyager_asset('images/widget-backgrounds/01.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', app(Banner::class));
    }
}