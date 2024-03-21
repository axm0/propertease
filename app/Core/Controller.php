<?php
// app/Core/Controller.php

class Controller {
    // This method can be used to load views
    protected function view($viewName, $data = []) {
        // Ensure the view file exists
        if (file_exists('../app/Views/' . $viewName . '.php')) {
            include '../app/Views/' . $viewName . '.php';
        } else {
            // Handle errors, possibly render an error page or throw an exception
            die("View does not exist.");
        }
    }
}
