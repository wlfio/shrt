<?php

define("APP_ROOT", __DIR__);
define("APP_START", microtime(true));
define("APP_NAME", "Shrt");

if(!file_exists(__DIR__ . "/vendor/autoload.php")){
    die("Composer Missing!!");
}

require_once(__DIR__ . "/vendor/autoload.php");