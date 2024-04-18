<?php
// app/Models/User.php
require_once __DIR__ . '/../Core/Database.php';

class User {
    public static function authenticate($email, $password) {
        $db = new Database();
        $sql = "SELECT * FROM User WHERE Email = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_object();
            if ($password === $user->Password) {
                return $user;
            }
        }
        return false;
    }

    public static function create($name, $password, $email, $phone, $user_type) {
        $db = new Database();
        $sql = "INSERT INTO User (Name, Password, Email, Phone_no, User_type) VALUES (?, ?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("sssss", $name, $password, $email, $phone, $user_type);

        if ($stmt->execute()) {
            $userId = $stmt->insert_id;
            $user = self::getUserById($userId);
            return $user;
        }
        return false;
    }

    public static function getUserById($userId) {
        $db = new Database();
        $sql = "SELECT * FROM User WHERE UserID = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            return $result->fetch_object();
        }
        return false;
    }
}