<?php
// app/Controllers/HomeController.php
require_once __DIR__ . '/../Core/Controller.php';
require_once __DIR__ . '/../Views/home.php';

class HomeController extends Controller {
    public function index() {
        return homePage();
    }
}
