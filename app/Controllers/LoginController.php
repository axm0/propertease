<?php
require_once __DIR__ . '/../Core/Controller.php';

class LoginController extends Controller {

    public function Login() {
        session_start();

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
                $userID = $row['UserID'];
                $user_name = $row['Name'];

                $_SESSION['userID'] = $userID;
                $_SESSION['email'] = $email;
                $_SESSION['user_name'] = $user_name;
                session_write_close();

                echo "Success";
                exit();
            }
        }
        http_response_code(405); // Method Not Allowed
        echo "Invalid request method";
        exit();
    }
}
?>