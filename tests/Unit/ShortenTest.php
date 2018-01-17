<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Shorten;

class ShortenTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShorten()
    {
        echo base_convert(uniqid(),10,36);
        echo "----";
        echo base_convert(uniqid(),20,36);
        $this->assertTrue(true);
    }
}
