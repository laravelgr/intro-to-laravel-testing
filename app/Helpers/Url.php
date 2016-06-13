<?php

namespace Laravelgr\Testing\Helpers;

class Url
{
    private $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function getProtocol()
    {
        $protocolSeparatorPosition = strpos($this->url, '://');
        return substr($this->url, 0, $protocolSeparatorPosition);
    }

    public function getDomain()
    {
        $domainWithPath          = substr($this->url, strlen($this->getProtocol().'://'));
        if ($domainSeparatorPosition = strpos($domainWithPath, '/')) {
            return substr($domainWithPath, 0, $domainSeparatorPosition);
        }
        return $domainWithPath;
    }

    public function getPath()
    {
        $startPathPosition = strlen($this->getProtocol().'://'.$this->getDomain()) + 1;
        $endPathPosition   = strpos($this->url, '?') ?: 0;

        if ($endPathPosition - $startPathPosition > 0) {
            $length = $endPathPosition - $startPathPosition;
            return substr($this->url, $startPathPosition, $length);
        }

        return substr($this->url, $startPathPosition);
    }
}
