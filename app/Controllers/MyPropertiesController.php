<?php

require_once __DIR__ . '/../Core/Controller.php';
if (file_exists(__DIR__ . '/../../config/config.php')) {
    require_once __DIR__ . '/../../config/config.php';
} else {
    die('Failed to load configuration file');
}

class MyPropertiesController extends Controller {
    public function index() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $userID = $_SESSION['userID'];
        $images = $this->getMyProperties($userID);
        $this->view('myProperties', ['images' => $images]);
    }

    private function getMyProperties($userID) {
        $sql = "SELECT p.PropertyURL, pr.PropertyID, pr.Address, pr.Description
            FROM Property pr
            LEFT JOIN Photos p ON pr.PropertyID = p.PropertyID
            INNER JOIN Owns o ON pr.PropertyID = o.PropertyID
            WHERE o.UserID = ?
            ORDER BY pr.PropertyID";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
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
