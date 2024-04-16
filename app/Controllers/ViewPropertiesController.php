<?php

require_once __DIR__ . '/../Core/Controller.php';
if (file_exists(__DIR__ . '/../../config/config.php')) {
    require_once __DIR__ . '/../../config/config.php';
} else {
    die('Failed to load configuration file');
}


class ViewPropertiesController extends Controller {
    public function index() {
        $images = $this->getAllProperties();
        $this->view('viewProperties', ['images' => $images]);
    }

    private function getAllProperties() {
        $sql = "SELECT p.PropertyURL, p.PropertyID, pr.Address, pr.Description
            FROM Photos p
            JOIN Property pr ON p.PropertyID = pr.PropertyID
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