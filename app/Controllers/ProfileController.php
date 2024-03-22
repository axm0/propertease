<?php

require_once __DIR__ . '/../Core/Controller.php';


class ProfileController extends Controller {
    public function index() {
        $this->view('profile');
    }
}
