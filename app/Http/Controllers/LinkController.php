<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Link;

class LinkController extends Controller
{
    public function store(Request $request) //Simple CRUD controller store
    {
        $request->validate([ // Validate our url
            'url' => ['required','url']
        ]);

        $original_link = $request->url; // For more clean code i insert these data in variables
        $random_link = Str::random(7);

        $data = array( // compact it into array (and i know what i can insert it in eloquent create but i did it so for show process in more details)
            'original_link' => $original_link,
            'short_link'    => $random_link,
        );

        Link::create($data); // Create new table in DB

        return response()->json([200,$random_link]);

    }

    public function show($link) // Here i use method show for redirect 'users' to original link
    {
        $link = Link::all()->where('short_link','=',$link)->first();

        return redirect($link->original_link);
    }
}
