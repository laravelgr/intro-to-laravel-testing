<?php

namespace Laravelgr\Testing\Helpers;

class Ad
{
    /**
     * @var Url
     */
    private $url;

    /**
     * @var string
     */
    private $text;

    public function setUrl(Url $url)
    {
        $this->url = $url;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function parse()
    {
        return str_replace('{url:domain}', $this->url->getDomain(), $this->text);
    }
}
