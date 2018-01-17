<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Stat extends Model
{
    protected $table = 'stats';

    public function ShortUrl()
    {
        return $this->belongsTo('App\ShortUrl');
    }

}