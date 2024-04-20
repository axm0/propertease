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
        $sql = "SELECT p.PropertyURL, pr.PropertyID, pr.Address, pr.Description
                FROM Property pr
                LEFT JOIN Photos p ON pr.PropertyID = p.PropertyID
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

    public function search() {
        $query = $_GET['query'];
        $likeQuery = '%' . $query . '%';

        $sql = "SELECT Property.*, Photos.PropertyURL FROM Property
            LEFT JOIN Photos ON Property.PropertyID = Photos.PropertyID
            WHERE Property.Address LIKE ? OR Property.ZipCode LIKE ?";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ss", $likeQuery, $likeQuery);
        $stmt->execute();
        $result = $stmt->get_result();

        $properties = [];
        while ($row = $result->fetch_assoc()) {
            $properties[$row['PropertyID']]['details'] = $row;
            $properties[$row['PropertyID']]['images'][] = $row['PropertyURL'];
        }

        $stmt->close();

        $this->view('searchResults', ['properties' => $properties, 'query' => $query]);
    }
}