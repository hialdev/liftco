<?php

namespace App\Http\Widgets;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;
use App\Models\Message;
use App\Models\Page;

class MessageDimmer extends BaseDimmer
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
        $count = Message::count();
        $string = trans_choice('Messages', $count);

        $page = Page::all()->keyBy('slug');
        $image = $page->get('default')->image ? Voyager::image($page->get('default')->image) : Voyager::image($page->get('default')->image);

        return view('admin.dimmer', array_merge($this->config, [
            'icon'   => 'voyager-images',
            'title'  => "{$count} {$string}",
            'text'   => 'Lihat pesan dari halaman contact dan sewa rental',
            'button' => [
                'text' => 'Kelola Messages',
                'link' => route('voyager.messages.index'),
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
        return Auth::user()->can('browse', app(Message::class));
    }
}