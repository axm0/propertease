<?php
// public/index.php
require_once __DIR__ . '/../app/Controllers/HomeController.php';
require_once __DIR__ . '/../app/Controllers/AboutController.php';
require_once __DIR__ . '/../app/Controllers/ProfileController.php';
require_once __DIR__ . '/../app/Controllers/ViewPropertiesController.php';
require_once __DIR__ . '/../app/Controllers/MyPropertiesController.php';
require_once __DIR__ . '/../app/Controllers/FavoritesController.php';
require_once __DIR__ . '/../app/Controllers/PropertyController.php'; // Add this line
require_once __DIR__ . '/../app/Controllers/EditPropertyController.php';


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
    case $url . 'viewProperties':
        $controller = new ViewPropertiesController();
        $controller->index();
        break;
    case $url . 'myProperties':
        $controller = new MyPropertiesController();
        $controller->index();
        break;
    case $url . 'favorites':
        $controller = new FavoritesController();
        $controller->index();
        break;
    case $url . 'login':
        require_once __DIR__ . '/../app/Views/login.php';
        break;
    // Add this case for property detail route
    case preg_match('/^\/propertease\/public\/property\/(\d+)$/', $path, $matches) ? $path : false:
        $controller = new PropertyController();
        $controller->detail($matches[1]);
        break;
    case preg_match('/^\/propertease\/public\/property\/edit\/(\d+)$/', $path, $matches) ? $path : false:
        $controller = new EditPropertyController();
        $controller->detail($matches[1]);
    default:
        $controller = new HomeController();
        $controller->index();
        break;
}