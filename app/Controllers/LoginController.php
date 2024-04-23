<?php
require_once __DIR__ . '/../Core/Controller.php';

class LoginController extends Controller {

    public function Login() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        parse_str(file_get_contents("php://input"), $formData);
        $email = $formData['email'];
        $password = $formData['password'];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // a) SQL Injection: Retrieve data without complete input
            $sql = "SELECT * FROM User WHERE Email LIKE '%$email%' AND Password LIKE '%$password%'";
            $result = $this->db->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                $_SESSION['userID'] = $row['UserID'];
                $_SESSION['email'] = $row['Email'];
                $_SESSION['user_name'] = $row['Name'];
                $_SESSION['user_type'] = $row['User_type'];
                session_write_close();

                echo "Success";
                exit();
            }
        }
        http_response_code(405); // Method Not Allowed
        echo "Invalid request method";
        exit();
    }

    public function Logout() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION = array();

        session_destroy();

        header("Location: /propertease/public/");
        exit();
    }

    public function Signup() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        parse_str(file_get_contents("php://input"), $formData);
        $email = $formData['signupEmail'];
        $name = $formData['signupName'];
        $password = $formData['signupPassword'];
        $user_type = "buyer";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Check if the email already exists in the database
            $sql = "SELECT * FROM User WHERE Email = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Email already exists, handle the error or display a message
                echo "Email already exists";
                exit();
            } else {
                // b) SQL Injection: Insert data without complete input
                $sql = "INSERT INTO User (Name, Email, Password, User_type) VALUES ('$name', '$email', '$password', '$user_type')";
                $this->db->query($sql);

                // c) Prepared Statement: Prevent SQL Injection
                $sql = "SELECT UserID, Name, Email, User_type FROM User WHERE Email = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();

                    $_SESSION['userID'] = $row['UserID'];
                    $_SESSION['email'] = $row['Email'];
                    $_SESSION['user_name'] = $row['Name'];
                    $_SESSION['user_type'] = $row['User_type'];
                    session_write_close();

                    echo "Success";
                    exit();
                }
            }
        }
        http_response_code(405);
        exit();
    }
}
?>