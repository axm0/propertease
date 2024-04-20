<?php
require_once __DIR__ . '/../Core/Controller.php';
class DeletePropertyController extends Controller {
    public function delete($propertyID) {
        $sql = "DELETE FROM Property 
            WHERE PropertyID = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $propertyID);
        $stmt->execute();
        @header("Location: /propertease/public/myProperties");
        exit();
    }
}
?>