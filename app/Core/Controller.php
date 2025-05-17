<?php
// app/Core/Controller.php
if (file_exists(__DIR__ . '/../../config/config.php')) {
    require_once __DIR__ . '/../../config/config.php';
} else {
    die('Failed to load configuration file');
}

ini_set('session.use_strict_mode', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_httponly', 1);
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    ini_set('session.cookie_secure', 1);
}

session_save_path(__DIR__ . '/../../session_data');
session_start();

class Controller {
    protected $db;

    public function __construct() {
        $credentialsPath = __DIR__ . '/../../config/credentials.txt';
        $creds = getDatabaseCredentials($credentialsPath);
        $this->db = getDBConnection($creds);
    }

    protected function view($viewName, $data = []) {
        foreach ($data as $key => $value) {
            ${$key} = $value;
        }
        require_once __DIR__ . '/../Views/' . $viewName . '.php';
    }

    protected function regenerateSession() {
        session_regenerate_id(true);
    }

    protected function destroySession() {
        session_start();
        $sessionId = session_id();
        $_SESSION = array();
        session_destroy();

        $sessionSavePath = session_save_path();
        $sessionFile = $sessionSavePath . '/sess_' . $sessionId;
        if (file_exists($sessionFile)) {
            unlink($sessionFile);
        }
    }
}
?>