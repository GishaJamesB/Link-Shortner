<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shorten;
use App\ShortUrl;
use App\Stat;
use Jenssegers\Agent\Agent;
use DB;

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
            $agent = new Agent();
            $stats = new Stat();
            $stats->link_id = $existing->id;
            $stats->device = $agent->device();
            $stats->platform = $agent->platform();
            $stats->browser = $agent->browser();
            $stats->save();
            return redirect()->away($existing->long_url);
        }
        else{
            return view('404');
        }
    }

    public function viewStatistics()
    {

        return view('stats');
    }

    public function getStatistics()
    {
        $urls = ShortUrl::all();
        $info = array();
        // To do: Refactor: Need to query the database only once and get the counts
        foreach($urls as $url)
        {
            $id = $url->id;
            $data['visitor_count'] = Stat::where('link_id', $id)->get()->count();
            $data['chrome_count'] = Stat::where(['link_id' => $id, 'browser' => 'Chrome'])->get()->count();
            $data['safari_count'] = Stat::where(['link_id' => $id, 'browser' => 'Safari'])->get()->count();
            $data['url'] = $url->long_url;
            $data['short_code'] = url($url->short_code);
            array_push($info, $data);
        }
        return response()->json($info);
    }


}
