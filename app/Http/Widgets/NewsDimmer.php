<?php

namespace App\Http\Widgets;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;
use App\Models\News;
use App\Models\Page;

class NewsDimmer extends BaseDimmer
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
        $count = News::count();
        $string = trans_choice('News', $count);

        $page = Page::all()->keyBy('slug');
        $image = $page->get('news')->image ? Voyager::image($page->get('News')->image) : Voyager::image($page->get('default')->image);

        return view('admin.dimmer', array_merge($this->config, [
            'icon'   => 'voyager-documentation',
            'title'  => "{$count} {$string}",
            'text'   => '',
            'button' => [
                'text' => 'Kelola Newss',
                'link' => route('voyager.news.index'),
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
        return Auth::user()->can('browse', app(News::class));
    }
}