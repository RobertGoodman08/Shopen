<?php


define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/vendor/fcs');
define("HELPERS", ROOT . '/vendor/fcs/helpers');
define("CACHE", ROOT . '/tmp/cache');
define("LOGS", ROOT . '/tmp/logs');
define("CONFIG", ROOT . '/config');
define("LAYOUT", 'ishop');
define("PATH", 'http://fcs.loc');
define("ADMIN", 'http://fcs.loc/admin');
define("NO_IMAGE", '/public/uploads/no_image.png');


require_once ROOT . '/vendor/autoload.php';