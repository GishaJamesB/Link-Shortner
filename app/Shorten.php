<?php

namespace App;

use GuzzleHttp\Client;
use App\ShortUrl;


class Shorten
{
    public function validate($url){
        if(!$this->verifyUrlExists($url)){
            return ['msg' => "Url does not exist", 'status' => "failed"];
        }
        else{
            $existing = ShortUrl::where('long_url', $url)->first();
            if($existing){
                return ['msg' => url($existing->short_code), 'status' => "success"];
            }
            else{
                $short_code = $this->getShortCode();
                $data = new ShortUrl();
                $data->long_url = $url;
                $data->short_code = $short_code;
                $data->save();
                return ['msg' => url($data->short_code), 'status' => "success"];
            }
        }
    }

    protected function validateUrlFormat($url) {
        return filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED);
    }

    protected function verifyUrlExists($url) {
        $client = new Client();
        try{
            $request = $client->request('get', $url);
            return true;
        }catch(\GuzzleHttp\Exception\ConnectException $e){
            return false;
        }
    }

    protected function getShortCode()
    {
        $short_code = base_convert(uniqid(),10,36);
        while(count(ShortUrl::where('short_code', $short_code)->get(['short_code'])) >0 )
        {
            $short_code = base_convert(uniqid(),10,36);
        }
        return $short_code;
    }

}