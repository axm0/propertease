<?php
// public/index.php
require_once __DIR__ . '/../app/Controllers/HomeController.php';
require_once __DIR__ . '/../app/Controllers/ProfileController.php';
require_once __DIR__ . '/../app/Controllers/ViewPropertiesController.php';
require_once __DIR__ . '/../app/Controllers/MyPropertiesController.php';
require_once __DIR__ . '/../app/Controllers/FavoritesController.php';
require_once __DIR__ . '/../app/Controllers/PropertyController.php';
require_once __DIR__ . '/../app/Controllers/EditPropertyController.php';
require_once __DIR__ . '/../app/Controllers/LoginController.php';
require_once __DIR__ . '/../app/Controllers/CreatePropertyController.php';
require_once __DIR__ . '/../app/Controllers/DeletePropertyController.php';


$path = $_SERVER['REQUEST_URI'];

// Remove the query string from the path for routing
$path = strtok($path, '?');

$url = '/propertease/public/';

switch ($path) {
    case $url . 'home':
        $controller = new HomeController();
        $controller->index();
        break;
    case $url . 'search':
        $controller = new ViewPropertiesController();
        $controller->search();
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
    case $url . 'login/login':
        $controller = new LoginController();
        $controller->Login();
        break;
    case $url . 'logout':
        $controller = new LoginController();
        $controller->Logout();
        break;
    case $url . 'signup':
        $controller = new LoginController();
        $controller->Signup();
        break;
    case $url . 'profile/save':
        $controller = new ProfileController();
        $controller->save();
        break;
    case $url . 'create':
        if (strtolower($_SESSION['user_type']) == "seller") {
            $controller = new CreatePropertyController();
            $controller->create();
        } else {
            $controller = new HomeController();
            $controller->index();
        }
        break;
    case $url . 'createProperty':
        if (strtolower($_SESSION['user_type']) == "seller") {
            $controller = new CreatePropertyController();
            $controller->createProperty();
        } else {
            $controller = new HomeController();
            $controller->index();
        }
        break;
    // Add this case for property detail route
    case preg_match('/^\/propertease\/public\/property\/(\d+)$/', $path, $matches) ? $path : false:
        $controller = new PropertyController();
        $controller->detail($matches[1]);
        break;
    case preg_match('/^\/propertease\/public\/property\/edit\/(\d+)$/', $path, $matches) ? $path : false:
        $controller = new EditPropertyController();
        $controller->detail($matches[1]);
        break;
    case preg_match('/^\/propertease\/public\/property\/delete\/(\d+)$/', $path, $matches) ? $path : false:
        $controller = new DeletePropertyController();
        $controller->delete($matches[1]);
        break;
    case preg_match('/^\/propertease\/public\/favorites\/favorite\/(\d+)$/', $path, $matches) ? $path : false:
        $controller = new FavoritesController();
        $controller->updateFavorites($matches[1]);
        break;
    case preg_match('/^\/propertease\/public\/property\/favorite\/(\d+)$/', $path, $matches) ? $path : false:
        $controller = new PropertyController;
        $controller->updateFavorite($matches[1]);
        break;
    default:
        $controller = new HomeController();
        $controller->index();
        break;
}

?>
