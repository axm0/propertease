<?php
// public/index.php
require_once __DIR__ . '/../app/Controllers/HomeController.php';
require_once __DIR__ . '/../app/Controllers/AboutController.php';

$path = $_SERVER['REQUEST_URI'];

if ($path == '/propertease/public/about') {
    $controller = new AboutController();
    $controller->index();
} else {
    $controller = new HomeController();
    $controller->index();
}
