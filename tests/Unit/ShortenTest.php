<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\ShortUrl;

class ShortenTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShorten()
    {
        // echo base_convert(uniqid(),10,36);
        // echo "----";
        // echo base_convert(uniqid(),20,36);
        $short_code = '2knqtt5';
        while(count(ShortUrl::where('short_code', $short_code)->get(['short_code'])) >0 )
            {
                $short_code = base_convert(uniqid(),10,36);
            }
        echo $short_code;
        $this->assertTrue(true);
    }
}
