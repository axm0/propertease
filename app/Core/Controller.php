<?php
// app/Core/Controller.php
if (file_exists(__DIR__ . '/../../config/config.php')) {
    require_once __DIR__ . '/../../config/config.php';
} else {
    die('Failed to load configuration file');
}

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
}
?>
