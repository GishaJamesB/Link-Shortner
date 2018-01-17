<?php

namespace App;

use GuzzleHttp\Client;
use App\ShortUrl;


class Shorten
{
    public function validate($url){
        if(!$this->validateUrlFormat($url))
        {
            return "Invalid url format";
        }
        elseif(!$this->verifyUrlExists($url)){
            return "Url does not exist";
        }
        else{
            $existing = ShortUrl::where('long_url', $url)->first();
            if($existing){
                return $existing->short_code;
            }
            else{
                $data = new ShortUrl();
                $data->long_url = $url;
                $data->short_code = base_convert(uniqid(),10,36);
                $data->save();
                return $data->short_code;
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

    public static function convertIdToShortCode($id) {
        $id = intval($id);
        $chars = "123456789bcdfghjkmnpqrstvwxyzBCDFGHJKLMNPQRSTVWXYZ";
        $length = strlen($chars);
        $code = "";
        while ($id > $length - 1) {
            $code = $chars[fmod($id, $length)] .$code;
            $id = floor($id / $length);
        }

        $code = $chars[$id] . $code;

        return $code;
    }

}