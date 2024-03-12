<?php

use P\Blog\Controllers\HomeController;
use function Tamtamchik\SimpleFlash\flash;

if (!session_id()) @session_start();

require_once '../vendor/autoload.php';

$home = new HomeController();
echo  $home->index();

//Kint::dump($home);
try {
    echo flash()->error('hello');
} catch (\Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException $e) {
}
