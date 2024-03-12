<?php

use P\Blog\Controllers\HomeController;
require_once '../vendor/autoload.php';

$home = new HomeController();
echo  $home->index();
