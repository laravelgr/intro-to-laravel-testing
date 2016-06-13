<?php

use Laravelgr\Testing\Helpers\Url;

class UrlParserTest extends TestCase
{
    public function testGetProtocol()
    {
        $url = new Url('http://www.google.com');
        $this->assertSame('http', $url->getProtocol());

        $url = new Url('https://www.google.com');
        $this->assertSame('https', $url->getProtocol());
    }

    public function testGetDomain()
    {
        $url = new Url('ftp://www.google.se/results?q=laravel');
        $this->assertSame('www.google.se', $url->getDomain());

        $url = new Url('https://google.com/results?q=laravel');
        $this->assertSame('google.com', $url->getDomain());
    }

    public function testGetPath()
    {
        $url = new Url('ftp://www.google.se/results/laravel');
        $this->assertSame('results/laravel', $url->getPath());

        $url = new Url('ftp://www.google.se/results/laravel?q=1');
        $this->assertSame('results/laravel', $url->getPath());
    }
}
