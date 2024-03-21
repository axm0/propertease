<?php
// app/Controllers/HomeController.php
require_once '../app/Core/Controller.php';

class HomeController extends Controller {
    // Method to handle the index route
    public function index() {
        // Call the view method from the parent Controller class
        $this->view('home');
    }

    // If you need other methods for handling specific actions, they go here
}
