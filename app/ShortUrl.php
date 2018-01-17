<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ShortUrl extends Model
{
    protected $table = 'short_urls';

    public function stat()
    {
        return $this->hasMany('App\Stat');
    }

}