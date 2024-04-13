<?php
// app/Controllers/HomeController.php
require_once __DIR__ . '/../Core/Controller.php';
if (file_exists(__DIR__ . '/../../config/config.php')) {
    require_once __DIR__ . '/../../config/config.php';
} else {
    die('Failed to load configuration file');
}

class HomeController extends Controller {
    public function index() {
        $images = $this->getFeaturedImages();
        $this->view('home', ['images' => $images]);
    }

    private function getFeaturedImages() {
        $sql = "SELECT p.PropertyURL, p.PropertyID, pr.Address, pr.Description
            FROM Photos p
            JOIN Property pr ON p.PropertyID = pr.PropertyID
            WHERE p.PropertyID IN (1, 2, 3, 4, 5, 6)
            ORDER BY p.PropertyID";
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
