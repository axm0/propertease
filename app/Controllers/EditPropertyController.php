<?php
require_once __DIR__ . '/../Core/Controller.php';

class EditPropertyController extends Controller {
    public function detail($propertyID) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->update($propertyID);
        } else {
            $propertyData = $this->getPropertyDetails($propertyID);
            $propertyImages = $this->getPropertyImages($propertyID);
            if ($propertyData) {
                $this->view('editDetails', ['property' => $propertyData, 'images' => $propertyImages]);
            } else {
                die("Property not found");
            }
        }
    }

    public function update($propertyID) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $updatedProperty = [
                'address' => $_POST['address'],
                'state' => $_POST['state'],
                'zipcode' => $_POST['zipcode'],
                'propertytype' => $_POST['propertytype'],
                'size' => $_POST['size'],
                'bedrooms' => $_POST['bedrooms'],
                'bathrooms' => $_POST['bathrooms'],
                'price' => $_POST['price'],
                'listingstatus' => $_POST['listingstatus'],
                'description' => $_POST['description']
            ];
            $this->updateProperty($propertyID, $updatedProperty);
        }
    }

    private function updateProperty($propertyID, $newPropertyData) {
        $sql = "UPDATE Property 
            SET Address = ?, State = ?, ZipCode = ?, PropertyType = ?, 
                Size = ?, NumberBedrooms = ?, NumberBathrooms = ?, 
                Price = ?, ListingStatus = ?, Description = ?
            WHERE PropertyID = ?";

        $address = $newPropertyData['address'];
        $state = $newPropertyData['state'];
        $zipCode = $newPropertyData['zipcode'];
        $propertyType = $newPropertyData['propertytype'];
        $size = $newPropertyData['size'];
        $numberBedrooms = $newPropertyData['bedrooms'];
        $numberBathrooms = $newPropertyData['bathrooms'];
        $price = $newPropertyData['price'];
        $listingStatus = $newPropertyData['listingstatus'];
        $description = $newPropertyData['description'];

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ssisiiiissi", $address, $state, $zipCode, $propertyType,
            $size, $numberBedrooms, $numberBathrooms, $price, $listingStatus, $description, $propertyID);
        $stmt->execute();

        header("Location: /propertease/public/myProperties");
        exit();
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