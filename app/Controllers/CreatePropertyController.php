<?php
require_once __DIR__ . '/../Core/Controller.php';

class CreatePropertyController extends Controller
{
    public function create()
    {
        $this->view('createProperty');
    }

    public function createProperty()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $newProperty = [
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

            $newPropertyID = $this->insertProperty($newProperty);

            header("Location: /propertease/public/property/{$newPropertyID}");
            exit();
        }
    }

    private function insertProperty($newProperty)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $userID = $_SESSION['userID'];
        $sqlProperty = "INSERT INTO Property (OwnerID, Address, State, ZipCode, PropertyType, Size, NumberBedrooms, NumberBathrooms, Price, ListingStatus, Description)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $address = $newProperty['address'];
        $state = $newProperty['state'];
        $zipCode = $newProperty['zipcode'];
        $propertyType = $newProperty['propertytype'];
        $size = $newProperty['size'];
        $numberBedrooms = $newProperty['bedrooms'];
        $numberBathrooms = $newProperty['bathrooms'];
        $price = $newProperty['price'];
        $listingStatus = $newProperty['listingstatus'];
        $description = $newProperty['description'];

        $stmtProperty = $this->db->prepare($sqlProperty);
        $stmtProperty->bind_param("issisiiiiss", $userID, $address, $state, $zipCode, $propertyType,
            $size, $numberBedrooms, $numberBathrooms, $price, $listingStatus, $description);
        $stmtProperty->execute();
        $propertyID = $stmtProperty->insert_id;

        $sqlOwns = "INSERT INTO Owns (PropertyID, UserID) VALUES (?, ?)";
        $stmtOwns = $this->db->prepare($sqlOwns);
        $stmtOwns->bind_param("ii", $propertyID, $userID);
        $stmtOwns->execute();

        return $propertyID;
    }
}
?>
