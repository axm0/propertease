<?php
require_once __DIR__ . '/../Core/Controller.php';
class FavoritesController extends Controller
{
    public function index(){
        $this->view('favorites');
    }
}