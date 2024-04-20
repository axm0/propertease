<?php
// app/Controllers/PropertyController.php
require_once __DIR__ . '/../Core/Controller.php';

class PropertyController extends Controller {
    public function detail($propertyID) {
        $propertyData = $this->getPropertyDetails($propertyID);
        $propertyImages = $this->getPropertyImages($propertyID);
        $favoriteData = $this->getFavoriteData($propertyID);
        if ($propertyData) {
            $this->view('propertyDetail', ['property' => $propertyData, 'images' => $propertyImages, 'favorite' => $favoriteData]);
        } else {
            die("Property not found");
        }
    }

    private function getPropertyDetails($propertyID) {
        $sql = "SELECT p.*
                FROM Property p
                WHERE p.PropertyID = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $propertyID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    private function getPropertyImages($propertyID) {
        $sql = "SELECT ph.PropertyURL
                FROM Photos ph
                WHERE ph.PropertyID = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $propertyID);
        $stmt->execute();
        $result = $stmt->get_result();
        $images = [];
        while ($row = $result->fetch_assoc()) {
            $images[] = $row['PropertyURL'];
        }
        return $images;
    }
    private function getFavoriteData($propertyID){
        if(session_status() != 1)
            @$userID = $_SESSION['userID'];
        else
            $userID = 0;
        $sql = "SELECT f.LikeID
                FROM Favorites f
                WHERE f.PropertyID = '".$propertyID."' AND UserID = '".$userID."'";
        $result = $this->db->query($sql);
        return $result->fetch_assoc();
    }
}
?>