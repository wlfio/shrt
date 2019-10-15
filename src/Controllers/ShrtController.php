<?php

namespace WlfIO\Shrt\Controllers;

use Slim\Psr7\Request;
use Slim\Psr7\Response;
use Slim\Views\Twig;
use SlimSession\Helper as SessionHelper;

class ShrtController
{
    private $twig;
    private $session;

    public function __construct(Twig $twig, SessionHelper $session)
    {
        $this->twig = $twig;
        $this->session = $session;
    }

    public function form(Request $request, Response $response)
    {
        if(!$this->session->exists("token")) {
            $this->session->set("token", base64_encode(sha1(mt_rand())));
        }

        return $this->twig->render(
            $response,
            "form.twig",
            [
                "token" => $this->session->get("token"),
                "url" => "",
            ]
        );
    }

    public function create(Request $request, Response $response, $args)
    {
        $url = $request->getParsedBody()["url"] ?? "";
        $error = "";
        $short = "";

        $urlChecked = filter_var($url, FILTER_VALIDATE_URL);
        if(!is_string($urlChecked)){
            $error = "invalid url";
        } else {
            $urls = $this->session->get("urls", []);

            $sha1 = base64_encode(sha1(mt_rand()));
            $rand = mt_rand(0, strlen($sha1) - 7);
            $short = substr($sha1, $rand, 6);

            $urls[$short] = $urlChecked;

            $this->session->set("urls",$urls);

            $short = "https://s.wlf.io/" . $short;
        }

        return $this->twig->render(
            $response,
            "form.twig",
            [
                "token" => $args["token"],
                "url" => $url,
                "error" => $error,
                "short" => $short,
                "urls" => $this->session->get("urls", []),
            ]
        );
    }
}