<?php
// app/Controllers/AboutController.php
require_once __DIR__ . '/../Core/Controller.php';
require_once __DIR__ . '/../Views/viewProperties.php';

class ViewPropertiesController extends Controller {
    public function index() {
        return viewPropertiesPage();
    }
}
