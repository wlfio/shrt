<?php
/** @var $this \WlfIO\SlimFast\Router */

use WlfIO\Shrt\Controllers\ShrtController;
use WlfIO\Shrt\Controllers\RedirectController;

$this
    ->addRoute(["GET"],"/{id}",RedirectController::class . ":redirect")
    ->addRoute(["GET"],"/", ShrtController::class. ":form")
    ->addRoute(["POST"], "/", [ShrtController::class, "create"]);