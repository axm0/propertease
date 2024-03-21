<?php
// public/index.php
require_once __DIR__ . '/../app/Controllers/HomeController.php';
require_once __DIR__ . '/../app/Controllers/AboutController.php';
require_once __DIR__ . '/../app/Controllers/ViewPropertiesController.php';

$path = $_SERVER['REQUEST_URI'];

if ($path == '/propertease/public/about') {
    $controller = new AboutController();
    $controller->index();
}
elseif ($path == '/propertease/public/viewProperties') {
    $controller = new ViewPropertiesController();
    $controller->index();
}
else {
    $controller = new HomeController();
    $controller->index();
}
