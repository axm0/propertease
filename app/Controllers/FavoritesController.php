<?php
require_once __DIR__ . '/../Views/navbar.php';
require_once __DIR__ . '/../Core/Controller.php';
if (file_exists(__DIR__ . '/../../config/config.php')) {
    require_once __DIR__ . '/../../config/config.php';
} else {
    die('Failed to load configuration file');
}


class FavoritesController extends Controller {
    public function index() {
        $images = $this->getFavoriteProperties();
        $this->view('favorites', ['images' => $images]);
    }

    protected function getFavoriteProperties() {
        $userID = $_SESSION['userID'];
        $sql = "SELECT p.PropertyURL, pr.PropertyID, pr.Address, pr.Description
                FROM Property pr
                LEFT JOIN Photos p ON pr.PropertyID = p.PropertyID
                WHERE pr.propertyID IN (SELECT f.PropertyID
						                FROM Favorites f 
						                WHERE f.UserID = '".$userID."')
                ORDER BY pr.PropertyID";
        $result = $this->db->query($sql);
        $images = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $images[$row['PropertyID']]['images'][] = $row['PropertyURL'];
                $images[$row['PropertyID']]['address'] = $row['Address'];
                $images[$row['PropertyID']]['description'] = $row['Description'];
            }
        }
        return $images;
    }
}