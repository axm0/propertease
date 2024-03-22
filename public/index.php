<?php
// public/index.php
require_once __DIR__ . '/../app/Controllers/HomeController.php';
require_once __DIR__ . '/../app/Controllers/AboutController.php';
require_once __DIR__ . '/../app/Controllers/ProfileController.php';

$path = $_SERVER['REQUEST_URI'];

$url = '/propertease/public/';

switch ($path) {
    case $url . 'about':
        $controller = new AboutController();
        $controller->index();
        break;
    case $url . 'home':
        $controller = new HomeController();
        $controller->index();
        break;
    case $url . 'profile':
        $controller = new ProfileController();
        $controller->index();
        break;
}
