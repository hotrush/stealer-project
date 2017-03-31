<?php

namespace App\Spiders;

use Hotrush\Stealer\Spider\Request;
use Hotrush\Stealer\Spider\SpiderAbstract;
use Psr\Http\Message\ResponseInterface;

class ExampleSpider extends SpiderAbstract
{
    /**
     * Method must return initial request for your spider.
     * It is an entry point.
     *
     * @return Request
     */
    public function getStartRequest()
    {
        $callback = function (ResponseInterface $response) {
            // you can find and data or other links to forward here...
        };
        $errorCallback = function ($reason) {
            $this->errorCallback($reason);
        };

        return new Request('GET', 'https://httpbin.org/', [], $callback, $errorCallback);
    }
}
