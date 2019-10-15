<?php

namespace WlfIO\Shrt;

use WlfIO\SlimFast\SlimFast;

class Shrt extends SlimFast
{

    protected function setupMiddleware($middleware = [])
    {
        parent::setupMiddleware([
            new \Slim\Middleware\Session([
                'name' => APP_NAME . "-Session",
                'autorefresh' => true,
                'lifetime' => '1 hour'
            ])
        ]);
    }
}