<?php
// app/Controllers/PropertyController.php
require_once __DIR__ . '/../Core/Controller.php';

class PropertyController extends Controller {
    public function detail($propertyID) {
        $propertyData = $this->getPropertyDetails($propertyID);
        $propertyImages = $this->getPropertyImages($propertyID);
        if ($propertyData) {
            $this->view('propertyDetail', ['property' => $propertyData, 'images' => $propertyImages]);
        } else {
            // Handle the case when property data is not found
            // For example, show an error message or redirect to a different page
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
}
?>