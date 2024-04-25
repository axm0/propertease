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
            $sql = "SELECT * FROM User WHERE Email = ? AND Password = ?";
            $stmt = $this->db->prepare($sql);

            $stmt->bind_param("ss", $email, $password);

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
            } else {
                http_response_code(401);
                echo "Wrong email or password";
                exit();
            }
        }
        http_response_code(405);
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

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['signupName'];
            $email = $_POST['signupEmail'];
            $password = $_POST['signupPassword'];
            $userType = $_POST['userType'];
            $phone = $_POST['signupPhone'];

            $sql = "SELECT * FROM User WHERE Email = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if (!preg_match('/^\d{3}-\d{3}-\d{4}$/', $phone)) {
                echo "Invalid phone number format. Please use the format 123-456-7890.";
                exit();
            }
            if ($userType !== "seller" && $userType !== "buyer") {
                echo "Invalid user type. Please select either 'Seller' or 'Buyer'.";
                exit();
            }
            if ($result->num_rows > 0) {
                echo "Email already exists";
                exit();
            } else {
                $sql = "INSERT INTO User (Name, Email, Password, Phone_no, User_type) VALUES (?, ?, ?, ?, ?)";
                $stmt = $this->db->prepare($sql);
                $stmt->bind_param("sssss", $name, $email, $password, $phone, $userType);
                $stmt->execute();

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
