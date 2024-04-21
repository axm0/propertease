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

    private function getFavoriteProperties() {
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
    public function updateFavorites($propertyID)
    {
        parse_str(file_get_contents("php://input"), $formData);
        $action = $formData['action'];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($action == "delete") {
                $this->deleteFavorite($propertyID);
            } else {
                $this->insertFavorite($propertyID);
            }
        }
    }

    private function deleteFavorite($propertyID){
        $sql = "DELETE FROM Favorites
                WHERE PropertyID = ? AND UserID = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ii",$propertyID, $_SESSION['userID']);
        $stmt->execute();
    }

    private function insertFavorite($propertyID){
        $sql = "INSERT INTO Favorites (UserID, PropertyID)
                VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ii",$_SESSION['userID'], $propertyID);
        $stmt->execute();
    }
}