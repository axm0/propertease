<?php
// config/config.php
function getDatabaseCredentials($filePath) {
    $creds = array();
    $file = fopen($filePath, 'r');

    if ($file) {
        while (($line = fgets($file)) !== false) {
            $parts = explode('=', trim($line));
            if (count($parts) === 2) {
                $creds[$parts[0]] = $parts[1];
            }
        }
        fclose($file);
    } else {
        die("Unable to open the credentials file.");
    }

    return $creds;
}

function getDBConnection($creds) {
    $conn = new mysqli($creds['host'], $creds['username'], $creds['password'], $creds['database']);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

$credentialsPath = __DIR__ . '/credentials.txt';
$creds = getDatabaseCredentials($credentialsPath);
$conn = getDBConnection($creds);

?>
