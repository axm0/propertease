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
                'description' => $_POST['description'],
                'county' => $_POST['county'],
                'features' => $_POST['features'],
                'yearbuilt' => $_POST['yearbuilt'],
                'condition' => $_POST['condition'],
                'listingdate' => $_POST['listingdate']
            ];

            $newPropertyID = $this->insertProperty($newProperty);

            $propertyImagesDir = __DIR__ . '/../../public/images/' . $newPropertyID;
            if (!is_dir($propertyImagesDir)) {
                mkdir($propertyImagesDir, 0777, true);
            }

            if (isset($_FILES['images'])) {
                $images = $_FILES['images'];
                foreach ($images['tmp_name'] as $index => $tmpName) {
                    $imageFileName = $images['name'][$index];
                    $imageDestination = $propertyImagesDir . '/' . $imageFileName;
                    move_uploaded_file($tmpName, $imageDestination);
                }
            }

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
        $sqlProperty = "INSERT INTO Property (OwnerID, Address, State, ZipCode, PropertyType, Size, NumberBedrooms, NumberBathrooms, Price, ListingStatus, Description, County, Features, YearBuilt, `Condition`, ListingDate)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

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
        $county = $newProperty['county'];
        $features = $newProperty['features'];
        $yearbuilt = $newProperty['yearbuilt'];
        $condition = $newProperty['condition'];
        $listingdate = $newProperty['listingdate'];

        $stmtProperty = $this->db->prepare($sqlProperty);
        $stmtProperty->bind_param("issisiiiisssssss", $userID, $address, $state, $zipCode, $propertyType,
            $size, $numberBedrooms, $numberBathrooms, $price, $listingStatus, $description, $county, $features, $yearbuilt, $condition, $listingdate);
        $stmtProperty->execute();
        $propertyID = $stmtProperty->insert_id;

        $sqlOwns = "INSERT INTO Owns (PropertyID, UserID) VALUES (?, ?)";
        $stmtOwns = $this->db->prepare($sqlOwns);
        $stmtOwns->bind_param("ii", $propertyID, $userID);
        $stmtOwns->execute();

        if (isset($_FILES['images'])) {
            $images = $_FILES['images'];
            foreach ($images['name'] as $imageFileName) {
                $imageURL = "/images/{$propertyID}/{$imageFileName}";
                $sqlPhoto = "INSERT INTO Photos (PropertyID, PropertyURL) VALUES (?, ?)";
                $stmtPhoto = $this->db->prepare($sqlPhoto);
                $stmtPhoto->bind_param("is", $propertyID, $imageURL);
                $stmtPhoto->execute();
            }
        }

        return $propertyID;
    }
}
?>