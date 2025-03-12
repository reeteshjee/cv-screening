<?php
@session_start();

error_reporting(E_ALL);
ini_set('display_errors',1);

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'test');
define('DB_NAME', 'debuggers');

define('BASE_URL','http://localhost/debuggers/');

define('GEMINI_API_KEY', 'YOUR_GEMINI_API_KEY'); // Replace with your Gemini API key
define('UPLOAD_DIR', 'uploads/resumes/');

// Ensure upload directory exists
/*if (!file_exists(UPLOAD_DIR)) {
    mkdir(UPLOAD_DIR, 0777, true);
}*/

// Database connection
function getDBConnection() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    return $conn;
}
$conn = getDBConnection();