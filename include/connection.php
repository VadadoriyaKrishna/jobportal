<?php
// Database connection parameters
$db_host = 'localhost'; // Your database host (e.g., localhost)
$db_user = 'root'; // Your database username
$db_pass = ''; // Your database password
$db_name = 'jobdata'; // Your database name

// Establish database connection
$mydb = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($mydb->connect_error) {
    die("Connection failed: " . $mydb->connect_error);
}
?>
