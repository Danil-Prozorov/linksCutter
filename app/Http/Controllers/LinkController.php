<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Link;

class LinkController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'url' => ['required','url']
        ]);

        $random_link = Str::random(7);

        $data = array(
            'original_link' => $request->url,
            'short_link'    => $random_link,
        );

        Link::create($data);

        return $random_link;

    }

    public function show($link)
    {
        $link = Link::all()->where('short_link','=',$link)->first();

        return redirect($link->original_link);
    }
}
