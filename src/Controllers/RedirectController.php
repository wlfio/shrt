<?php


namespace WlfIO\Shrt\Controllers;

use Slim\Psr7\Request;
use Slim\Psr7\Response;

class RedirectController
{

    public function redirect(Request $request, Response $response, $args)
    {
        return $response->withHeader('Location', 'https://wlf.io')->withStatus(301);
    }
}