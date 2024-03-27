<?php

require_once __DIR__ . '/../Core/Controller.php';


class ViewPropertiesController extends Controller {
    public function index() {
        $this->view('viewproperties');
    }
}