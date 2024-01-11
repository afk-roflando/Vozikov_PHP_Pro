<?php
define('BASE_DIR', dirname(__DIR__));

require_once BASE_DIR . '/config/const.php';
require_once BASE_DIR . '/vendor/autoload.php';

try {

    if (!preg_match('/assets/i', $_SERVER['REQUEST_URI'])){

        \core\router::dispatch($_SERVER['REQUEST_URI']);

    }

} catch (PDOException $exception) {
    dd("PDOException", $exception);

} catch (Exception $exception){
    dd("Exception", $exception);

}
