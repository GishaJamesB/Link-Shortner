<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shorten;

class UrlController extends Controller
{

    public function shortenUrl(Request $request){
        $short_url = new Shorten();
        $validate = $short_url->validate($request->input('url'));
        return response()->json(['url' => $request->input('url'), 'msg' => $validate]);
    }


}
