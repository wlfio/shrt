<?php

namespace WlfIO\Shrt\Controllers;

use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Slim\Views\Twig;

class ShrtController
{
    private $twig;

    public function __construct(Twig $twig)
    {
        $this->twig = $twig;
    }

    public function form(Request $request, Response $response)
    {
        return $this->twig->render(
            $response,
            "form.twig"
        );
    }

    public function create(Request $request, Response $response, $args)
    {

    }
}