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

            $sql = "SELECT * FROM User WHERE Email = ? and Password = ?";
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
            }
        }
        http_response_code(405); // Method Not Allowed
        echo "Invalid request method";
        exit();
    }

    public function Signup() {
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Parse the incoming data
            parse_str(file_get_contents("php://input"), $formData);
            $name = $formData['name'];
            $email = $formData['email'];
            $password = $formData['password'];
            $phone_no = $formData['phone_no']; // Assuming it's optional
            $user_type = $formData['user_type'];

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO User (Name, Email, Password, Phone_no, User_type) VALUES (?, ?, ?, ?, ?)";

            if ($stmt = $this->db->prepare($sql)) {
                $stmt->bind_param("sssss", $name, $email, $passwordHash, $phone_no, $user_type);

                // Execute the query
                if ($stmt->execute()) {
                    echo "Signup successful";
                    exit();
                } else {
                    if ($this->db->errno == 1062) {
                        echo "Email or username already exists.";
                    } else {
                        echo "Error: " . $this->db->error;
                    }
                    exit();
                }
            } else {
                echo "Database preparation error: " . $this->db->error;
                exit();
            }
        } else {
            http_response_code(405);
            echo "Invalid request method";
            exit();
        }
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
        $email = $formData['email'];
        $name = $formData['name'];
        $password = $formData['password'];
        $user_type = "buyer";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $sql = "INSERT INTO User (Name, Email, Password, User_type) VALUES (?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->bind_param("ssss",$name, $email, $password, $user_type);
            $stmt->execute();
            $result = $stmt->get_result();

            $sql = "SELECT UserID, Name, Email, User_type FROM User WHERE UserID = LAST_INSERT_ID()";

            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                $_SESSION['userID'] = $row['UserID'];
                $_SESSION['email'] = $row['Email'];
                $_SESSION['user_name'] = $row['Name'];
                $_SESSION['user_type'] = $row['User_type'];
                session_write_close();

                exit();
            }
        }
        http_response_code(405);
        exit();
    }
}
?>