<?php

use Laravelgr\Testing\Helpers\Ad;
use Laravelgr\Testing\Helpers\Url;

class AdTest extends TestCase
{

    public function testItParsesText()
    {
        $url = new Url('http://laravel.gr');
        $ad = new Ad;
        $ad->setUrl($url);
        $ad->setText('Welcome to {url:domain}');
        $this->assertSame('Welcome to laravel.gr', $ad->parse());
    }
    
}
