<?php
// app/Controllers/AboutController.php
require_once __DIR__ . '/../Core/Controller.php';
require_once __DIR__ . '/../Views/about.php';

class AboutController extends Controller {
    public function index() {
        return aboutPage();
    }
}
