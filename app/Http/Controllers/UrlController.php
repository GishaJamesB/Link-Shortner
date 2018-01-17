<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shorten;
use App\ShortUrl;

class UrlController extends Controller
{

    public function shortenUrl(Request $request)
    {
        $short_url = new Shorten();
        $validate = $short_url->validate($request->input('url'));
        return
            response()->json(
                                ['url' => $request->input('url'),
                                'msg' => $validate['msg'],
                                'status' => $validate['status']
                                ]
                            );
    }

    public function redirectUrl($alias)
    {
        $existing = ShortUrl::where('short_code', $alias)->first();
        if($existing){
            return redirect()->away($existing->long_url);
        }
        else{
            return view('404');
        }
    }

    public function getStatistics()
    {
        return view('welcome');
    }


}
