<?php

require_once __DIR__ . '/../Core/Controller.php';

class ProfileController extends Controller
{

    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $userID = $_SESSION['userID'];
        $userData = $this->getUserDetails($userID);
        $favorites = $this->getFavoriteProperties($userID);
        $topProperties = $this->getTopProperties($userID);

        if ($userData) {
            $this->view('profile', ['user' => $userData, 'favorites' => $favorites, 'topProperties' => $topProperties]);
        }
    }

    public function save()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $userID = $_SESSION['userID'];

        parse_str(file_get_contents("php://input"), $formData);
        $name = $formData['name'];
        $email = $formData['email'];
        $phone = $formData['phone'];
        $user_type = $formData['user_type'];
        $input_password = $formData['password'];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $sql = "UPDATE User
                    SET Name = ?, Email = ?, Phone_no = ?
                    WHERE userID = ? AND password = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("sssis", $name, $email, $phone, $userID, $input_password);
            $stmt->execute();

                    $_SESSION['email'] = $email;
                    $_SESSION['user_name'] = $name;
                    session_write_close();
                    exit();


        } else {
            http_response_code(405); // Method Not Allowed
            echo "Invalid request method";
        }
        echo "Failed to update user details";
        exit();
    }

    private
    function getUserDetails($userID)
    {
        $sql = "SELECT *
                FROM User
                WHERE userID = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    private
    function getFavoriteProperties($userID)
    {
        $sql = "SELECT DISTINCT p.*, (
                    SELECT PropertyURL
                    FROM Photos ph
                    WHERE ph.PropertyID = p.PropertyID
                    LIMIT 1
                ) AS PropertyURL
                FROM Property p
                JOIN Favorites f ON p.PropertyID = f.PropertyID
                WHERE f.UserID = ?
                ORDER BY p.price DESC
                LIMIT 3;";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        $properties = [];
        while ($row = $result->fetch_assoc()) {
            $properties[] = $row;
        }
        return $properties;
    }

    private
    function getTopProperties($userID)
    {
        $sql = "SELECT DISTINCT p.*, (
                    SELECT PropertyURL
                    FROM Photos ph
                    WHERE ph.PropertyID = p.PropertyID
                    LIMIT 1
                ) AS PropertyURL
                FROM Property p
                JOIN Owns o ON p.PropertyID = o.PropertyID
                WHERE o.UserID = ?
                ORDER BY p.price DESC
                LIMIT 3;";

        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        $properties = [];
        while ($row = $result->fetch_assoc()) {
            $properties[] = $row;
        }
        return $properties;
    }
}
