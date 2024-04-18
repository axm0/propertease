<?php

require_once __DIR__ . '/../Core/Controller.php';


class ProfileController extends Controller {

    public function index() {
        session_start();
        $userID = $_SESSION['userID'];
        $userData = $this->getUserDetails($userID);
        if ($userData) {
            $this->view('profile', ['user' => $userData]);
        }
    }

    private function getUserDetails($userID) {
        $sql = "SELECT *
                FROM User
                WHERE userID = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
