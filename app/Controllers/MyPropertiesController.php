<?php

require_once __DIR__ . '/../Core/Controller.php';


class MyPropertiesController extends Controller {
    public function index() {
        $this->view('myproperties');
    }
}
